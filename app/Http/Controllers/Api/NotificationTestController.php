<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendNotificationJob;
use App\Models\Notification;
use App\Models\NotificationUser;
use Illuminate\Http\Request;

class NotificationTestController extends Controller
{
    public function sendTestNotification(Request $request)
    {

        // Valida os dados da requisição
        $request->validate([
            'title' => 'required|string',
            'message' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'type_id' => 'required|exists:notification_types,id',
        ]);


        // Cria a notificação
        $notification = Notification::create([
            'title' => $request->title,
            'message' => $request->message,
            'notification_type_id' => $request->type_id,
            'scheduled_at' => now(),
        ]);

        // Associa a notificação ao usuário
        $notificationUser = NotificationUser::create([
            'notification_id' => $notification->id,
            'user_id' => $request->user_id,
        ]);

        // Dispara o job para enviar a notificação
        dispatch(new SendNotificationJob($notification));

        return response()->json([
            'message' => 'Notificação enviada com sucesso!',
            'notification' => $notification,
        ]);
    }
}
