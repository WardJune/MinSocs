@extends('layouts.template')

@section('content')
    <div class="top px-4">
        <h4 class="fw-bold">Profile of Mine</h4>
    </div>

    <div class="profile px-4">
        <span class="fs-5">{{ auth()->user()->name }}</span>
        <span class="text-muted d-block">{{ auth()->user()->email }}</span>
        <span class="text-muted">Account created since {{ auth()->user()->created_at->format('d M y') }}</span>
        <a href="" class=" d-block link-light text-decoration-none">132 <span class="text-muted">Friends</span></a>
    </div>
    <h6 class="text-center mt-3 fw-bolder">Posts</h6>
    {{-- posts --}}
    <section class="posts mt-2">
        <!--1 post-->
        <div class="border border-secondary border-start-0 border-end-0 py-2">
            @forelse ($posts as $post)
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
