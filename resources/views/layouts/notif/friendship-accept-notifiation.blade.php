<a class="text-decoration-none fw-bold text-white"
    href="{{ route('users.show', $notif->data['notifier_user_id']) }}">{{ $notif->data['name'] }}</a>
{{ $notif->data['message'] }}
<span class="pull-right">{{ $notif->created_at->diffForHumans() }}</span>
