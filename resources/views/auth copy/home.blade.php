@extends('layouts.template')

@section('content')
    <div class="top px-4">
        <h4>Home</h4>
    </div>

    <div class="whats-happening px-4">
        <form action="{{ route('posts.create') }}" method="POST">
            @csrf
            <div class="post-blocks">
                <textarea name="content" class="bg-transparent form-control rounded-0 text-light" id="post" rows="3"
                    placeholder="What's on your mind ??" required></textarea>
            </div>
            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-warning rounded-pill px-4">Post</button>
            </div>
        </form>
    </div>

    <!--posts-->
    <section class="posts mt-3">
        <!--1 post-->
        <div class="border border-secondary border-start-0 border-bottom-0 border-end-0 py-2">
            @foreach ($posts as $post)
                <div class="post-box px-4 py-2 border-bottom border-secondary">
                    <div class="top">
                        <a href="{{ route('users.show', $post->user->id) }}" class="link-light text-decoration-none">
                            <strong>{{ $post->user->name }}</strong>
                            <span class="text-muted"> {{ $post->user->email }}</span>
                        </a>
                        &#x2022
                        <span class="text-muted">{{ $post->created_at->format('d M y') }}</span>
                    </div>
                    <div class="post-content">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-light text-decoration-none">
                            {{ $post->content }}
                        </a>
                    </div>
                    <div class="post-icons mt-1 d-flex justify-content-around">
                        <a href="{{ route('posts.like', $post->id) }}" class="link-warning text-decoration-none"><i
                                class="{{ auth()->user()->liked($post)
                                    ? 'fas'
                                    : 'far' }} fa-heart"></i>
                            {{ $post->likesCount() }}</a>
                        <a href="" class="link-warning text-decoration-none"><i class="far fa-comment-alt mx-1"></i>
                            {{ $post->commentsCount() }}</a>
                        <a href="" class="link-warning text-decoration-none"><i class="far fa-share-square"></i></a>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
