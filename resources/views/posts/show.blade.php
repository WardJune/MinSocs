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
                    <a class="link-warning text-decoration-none"><i class="far fa-comment-alt mx-1"></i>
                        {{ $post->commentsCount() }}</a>
                    <a href="" class="link-warning text-decoration-none"><i class="far fa-share-square"></i></a>
                </div>
            </div>
            <div class="border-bottom border-secondary px-4 py-2">
                <form action="{{ route('comment.create', $post->id) }}" method="POST">
                    @csrf
                    <textarea name="comment" rows="1"
                        class="form-control text-white rounded-0 bg-transparent  border-0 my-2"
                        placeholder="Type your comment"></textarea>
                    <div class="text-end">

                        <button type="submit" class="btn btn-warning btn-sm rounded-pill">Submit</button>
                    </div>
                </form>
            </div>

            {{-- comments --}}
            <h5 class="px-4 pt-2"> Comments</h5>
            <hr class="mt-2 mb-0">
            @forelse ($post->comments as $comment)
                <div class="comments-box px-4 py-2 border-bottom border-secondary">
                    <div class="top">
                        <a href="{{ route('users.show', $comment->user->id) }}" class="link-light text-decoration-none">
                            <strong>{{ $comment->user->name }}</strong>
                            <span class="text-muted"> {{ $comment->user->email }}</span>
                        </a>
                        &#x2022
                        <span class="text-muted">{{ $comment->created_at->format('d M y') }}</span>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @empty
                <div class="text-center fw-bold mt-2">There's no comment</div>
            @endforelse
        </div>

    </section>
@endsection
