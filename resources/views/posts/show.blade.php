@extends('layouts.template')

@section('content')
    <div class="top px-4">
        <h4>Post</h4>
    </div>

    <!--posts-->
    <section class="posts mt-3">
        <!--1 post-->
        <div class="border border-secondary border-start-0 border-end-0 border-bottom-0 py-2">
            <div class="post-box px-4 py-2 border-bottom border-secondary">
                <div class="top">
                    <a class="text-light text-decoration-none" href="{{ route('users.show', $post->user->id) }}"><strong
                            class="fs-5">{{ $post->user->name }}</strong></a>
                    <span class="text-muted d-block"> {{ $post->user->email }}
                </div>
                <div class="post-content fs-5 mt-1">
                    {{ $post->content }}
                    <div class="span d-block fs-6 text-muted mt-1">
                        {{ $post->created_at->format('h:i - d M, Y') }}
                    </div>
                </div>
                <hr>
                <div class="post-icons mt-1 d-flex justify-content-around">
                    <a href="{{ route('posts.like', $post->id) }}" class="link-warning text-decoration-none"><i
                            class="{{ auth()->user()->liked($post)
                                ? 'fas'
                                : 'far' }} fa-heart"></i>
                        {{ $post->likesCount() }}</a>
                    <a href="" class="link-warning text-decoration-none"><i class="far fa-comment-alt mx-1"></i> 32</a>
                    <a href="" class="link-warning text-decoration-none"><i class="far fa-share-square"></i></a>
                </div>
            </div>
        </div>

    </section>
@endsection
