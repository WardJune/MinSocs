<a class="text-decoration-none fw-bold text-white"
    href="{{ route('users.show', $notif->data['notifier_user_id']) }}">{{ $notif->data['name'] }}</a>
{{ $notif->data['message'] }}
<a class="text-decoration-none fw-bold text-white" href="{{ route('posts.show', $notif->data['post_id']) }}">post</a>.
<span class="text-muted">{{ $notif->created_at->diffForHumans() }}</span>
