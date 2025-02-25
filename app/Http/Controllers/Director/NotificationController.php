<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Jobs\SendNotificationJob;
use App\Models\Notification;
use App\Models\NotificationLog;
use App\Models\NotificationTemplate;
use App\Models\NotificationType;
use App\Models\NotificationUser;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NotificationTemplate as GlobalNotificationTemplate;

class NotificationController extends Controller
{

    public function getDashboard(Request $request)
{
    $user = Auth::user();

    $org = UserOrganizationModel::where('user_id', $user->id)->first();

    $query = Notification::query();

    // Filtro por tipo de notificação
    if ($request->has('type')) {
        $query->where('notification_type_id', $request->type);
    }

    // Total de notificações
    $totalNotifications = $query->count();

    // Notificações enviadas com sucesso
    $successfulNotifications = NotificationLog::where('status', 'sent')->count();

    // Notificações com falha
    $failedNotifications = NotificationLog::where('status', 'failed')->count();

    // Lista de notificações
    $notifications = $query->with('logs')->latest()->paginate(10);

    $notificationTypes = NotificationType::all();

    return view('director.notifications.dashboard', compact(
        'totalNotifications',
        'successfulNotifications',
        'failedNotifications',
        'notifications',
        'org',
        'notificationTypes'
    ));
}
    /**
     * Exibe a lista de notificações.
     */
    public function index()
    {
        $notifications = Notification::with('type', 'users.user')->latest()->get();
        return view('director.notifications.index', compact('notifications'));
    }

    /**
     * Exibe o formulário de criação de notificação.
     */
    public function create()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();
        $types = NotificationType::all();
        $users = User::all();
        return view('director.notifications.create', compact('types', 'users', 'org'));
    }

    /**
     * Salva uma nova notificação no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type_id' => 'required|exists:notification_types,id',
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
            'scheduled_at' => 'nullable|date',
        ]);

        // Cria a notificação
        $notification = Notification::create([
            'title' => $request->title,
            'message' => $request->message,
            'notification_type_id' => $request->type_id,
            'scheduled_at' => $request->scheduled_at,
        ]);

        // Associa os usuários à notificação
        foreach ($request->users as $userId) {
            NotificationUser::create([
                'notification_id' => $notification->id,
                'user_id' => $userId,
            ]);
        }

        // Dispara o job para enviar a notificação
        SendNotificationJob::dispatch($notification);

        return redirect()->route('director.notifications.index')->with('success', 'Notificação criada com sucesso!');
    }

    /**
     * Exibe os detalhes de uma notificação específica.
     */
    public function show($id)
    {
        $notification = Notification::with('type', 'users.user', 'logs')->findOrFail($id);
        return view('director.notifications.show', compact('notification'));
    }

    /**
     * Exibe o formulário de edição de uma notificação.
     */
    public function edit($id)
    {
        $notification = Notification::with('users')->findOrFail($id);
        $types = NotificationType::all();
        $users = User::all();
        return view('director.notifications.edit', compact('notification', 'types', 'users'));
    }

    /**
     * Atualiza uma notificação no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type_id' => 'required|exists:notification_types,id',
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
            'scheduled_at' => 'nullable|date',
        ]);

        $notification = Notification::findOrFail($id);

        // Atualiza a notificação
        $notification->update([
            'title' => $request->title,
            'message' => $request->message,
            'notification_type_id' => $request->type_id,
            'scheduled_at' => $request->scheduled_at,
        ]);

        // Remove associações antigas de usuários
        NotificationUser::where('notification_id', $notification->id)->delete();

        // Associa os novos usuários à notificação
        foreach ($request->users as $userId) {
            NotificationUser::create([
                'notification_id' => $notification->id,
                'user_id' => $userId,
            ]);
        }

        return redirect()->route('director.notifications.index')->with('success', 'Notificação atualizada com sucesso!');
    }

    /**
     * Remove uma notificação do banco de dados.
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);

        // Remove os logs e associações de usuários
        NotificationLog::where('notification_id', $notification->id)->delete();
        NotificationUser::where('notification_id', $notification->id)->delete();

        // Remove a notificação
        $notification->delete();

        return redirect()->route('director.notifications.index')->with('success', 'Notificação excluída com sucesso!');
    }

    /**
     * Envia uma notificação manualmente.
     */
    public function send($id)
    {
        $notification = Notification::findOrFail($id);

        // Dispara o job para enviar a notificação
        SendNotificationJob::dispatch($notification);

        return redirect()->route('director.notifications.show', $notification->id)->with('success', 'Notificação enviada com sucesso!');
    }
}