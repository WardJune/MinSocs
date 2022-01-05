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
        <div class="border border-secondary border-start-0 border-end-0 py-2">
            @foreach ($posts as $post)
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
            @endforeach
        </div>

    </section>
@endsection
