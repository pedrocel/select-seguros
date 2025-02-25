<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Models\NotificationLog;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SendNotificationJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $notification;

    /**
     * Cria uma nova instância do job.
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Executa o job.
     */
    public function handle()
    {
        // Obtém os usuários associados à notificação
        $users = $this->notification->users;

        foreach ($users as $notificationUser) {
            $user = $notificationUser->user;

            // Envia a notificação por e-mail
            // $this->sendEmail($user);

            // Envia a notificação por WhatsApp (exemplo com Twilio)
            $this->sendWhatsApp($user);

            // Envia a notificação por push (exemplo com Firebase)
            // $this->sendPush($user);
        }
    }

    /**
     * Envia a notificação por e-mail.
     */
    // protected function sendEmail(User $user)
    // {
    //     try {
    //         Mail::to($user->email)->send(new NotificationEmail($this->notification));

    //         // Registra o log de envio
    //         NotificationLog::create([
    //             'notification_id' => $this->notification->id,
    //             'channel' => 'email',
    //             'status' => 'sent',
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error("Erro ao enviar e-mail para {$user->email}: " . $e->getMessage());

    //         // Registra o log de falha
    //         NotificationLog::create([
    //             'notification_id' => $this->notification->id,
    //             'channel' => 'email',
    //             'status' => 'failed',
    //         ]);
    //     }
    // }

    /**
     * Envia a notificação por WhatsApp.
     */
    protected function sendWhatsApp(User $user)
    {
        try {
            $client = new Client();

            // Configurações da API do ChatPro
            $instanceId = env('CHATPRO_INSTANCE_ID'); // Substitua pelo seu instance_id
            $token = env('CHATPRO_API_KEY'); // Substitua pelo seu token
            $url = "https://v5.chatpro.com.br/{$instanceId}/api/v1/send_message";

            // Faz a requisição para a API do ChatPro
            $response = $client->request('POST', $url, [
                'json' => [
                    'number' => $user->whatsapp, // Número do usuário no formato internacional
                    'message' => $this->notification->message, // Mensagem da notificação
                ],
                'headers' => [
                    'Authorization' => $token, // Adiciona o prefixo Bearer
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]);
            dd($response);

            // Registra o log de envio
            NotificationLog::create([
                'notification_id' => $this->notification->id,
                'channel' => 'whatsapp',
                'status' => 'sent',
            ]);

            Log::info("WhatsApp enviado com sucesso para {$user->phone}.");
        } catch (RequestException $e) {
            // Captura erros de requisição
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $errorMessage = "Erro ao enviar WhatsApp para {$user->phone}: " . $response->getStatusCode() . " - " . $response->getBody();
            } else {
                $errorMessage = "Erro ao enviar WhatsApp para {$user->phone}: " . $e->getMessage();
            }

            dd($e->getMessage());
            Log::error($errorMessage);

            // Registra o log de falha
            NotificationLog::create([
                'notification_id' => $this->notification->id,
                'channel' => 'whatsapp',
                'status' => 'failed',
            ]);
        }
    }

    /**
     * Envia a notificação por push.
     */
    protected function sendPush(User $user)
    {
        try {
            // Exemplo usando Firebase Cloud Messaging (FCM)
            $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
            $serverKey = env('FCM_SERVER_KEY');

            $data = [
                'to' => $user->fcm_token, // Token FCM do usuário
                'notification' => [
                    'title' => $this->notification->title,
                    'body' => $this->notification->message,
                ],
            ];

            $headers = [
                'Authorization: key=' . $serverKey,
                'Content-Type: application/json',
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $fcmUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            $result = curl_exec($ch);
            curl_close($ch);

            // Registra o log de envio
            NotificationLog::create([
                'notification_id' => $this->notification->id,
                'channel' => 'push',
                'status' => 'sent',
            ]);
        } catch (\Exception $e) {
            Log::error("Erro ao enviar push para {$user->fcm_token}: " . $e->getMessage());

            // Registra o log de falha
            NotificationLog::create([
                'notification_id' => $this->notification->id,
                'channel' => 'push',
                'status' => 'failed',
            ]);
        }
    }
}
