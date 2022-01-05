@extends('layouts.template')

@section('content')
    <div class="top px-4">
        <h4 class="fw-bold">User Profile</h4>
    </div>

    <div class="profile px-4 d-flex justify-content-between align-items-center">
        <div class="">
            <span class="fs-5">{{ $user->name }}</span>
            <span class="text-muted d-block">{{ $user->email }}</span>
            <span class="text-muted">Account created since {{ $user->created_at->format('d M y') }}</span>
            <a href="" class=" d-block link-light text-decoration-none">132<span class="text-muted"> Friends</span></a>
        </div>
        <div class="buttons">
            @if (auth()->user()->isFriendWith($user))
                <form method="POST" action="{{ route('friends.remove', [$user->id, 1]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-light rounded-pill">Remove</button>
                </form>
            @elseif ($user->hasRequestAsFriend(auth()->user()))
                <form class="d-inline-block" method="POST" action="{{ route('friends.accept', $user->id) }}">
                    @csrf
                    @method('patch')
                    <button class="btn btn-sm btn-warning rounded-pill">Accept</button>
                </form>
                <form class="d-inline-block" method="POST" action="{{ route('friends.remove', [$user->id, 0]) }}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-light rounded-pill">Delete</button>
                </form>
            @elseif (auth()->user()->hasRequestAsFriend($user))
                <button class="btn btn-sm btn-secondary rounded-pill" disabled>Request Sent</button>
            @else
                <form method="POST" action="{{ route('friends.request', $user->id) }}">
                    @csrf
                    <button class="btn btn-sm btn-warning rounded-pill">Add Friend</button>
                </form>
            @endif
        </div>
    </div>
    <h6 class="text-center mt-3 fw-bolder">Posts</h6>
    {{-- posts --}}
    <section class="posts mt-2">
        <!--1 post-->
        <div class=" border-top border-secondary py-2">
            @forelse ($user->posts as $post)
                <div class="post-box px-4 py-2 border-bottom border-secondary">
                    <div class="top">
                        <strong>{{ $post->user->name }}</strong>
                        <span class="text-muted"> {{ $post->user->email }}</span> &#x2022
                        <span class="text-muted">{{ $post->created_at->format('d M y') }}</span>
                    </div>
                    <div class="post-content">
                        {{ $post->content }}
                    </div>
                    <div class="post-icons mt-1 d-flex justify-content-around">
                        <a href="" class="link-warning text-decoration-none"><i class="far fa-heart"></i> 12</a>
                        <a href="" class="link-warning text-decoration-none"><i class="far fa-comment-alt mx-1"></i> 32</a>
                        <a href="" class="link-warning text-decoration-none"><i class="far fa-share-square"></i></a>
                    </div>
                </div>
            @empty
                <div class="text-center">There's no posts</div>
            @endforelse

        </div>

    </section>
@endsection
