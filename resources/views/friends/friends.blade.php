@extends('layouts.template')

@section('content')
    <div class="top px-4">
        <h4 class="fw-bold">Friends</h4>
    </div>
    <div class="badgee px-3 mx-3">
        <a href="{{ route('friends.request-s') }}" class="d-inline-block">
            <h5><span class="badge rounded-pill bg-light text-dark">Request Sent</span></h5>
        </a>
        <a href="{{ route('friends.suggest') }}" class="d-inline-block">
            <h5><span class="badge rounded-pill bg-light text-dark">Suggestions</span></h5>
        </a>
        <a href="{{ route('friends.mine') }}" class="d-inline-block">
            <h5><span class="badge rounded-pill bg-light text-dark">Your Friends</span></h5>
        </a>
    </div>

    {{-- Friend Request --}}
    <div class="mx-3 px-3 py-2">
        <div class="top d-flex justify-content-between ">
            <h5>Friend request</h5>
            <a href="{{ route('friends.request-f') }}" class="link-warning text-decoration-none">See all</a>
        </div>
        <hr class="mt-0">
        @foreach ($pending as $friend)
            <div class="profile-1 d-flex justify-content-between mb-2">
                <div class="profile-name">
                    <a href="{{ route('users.show', $friend->id) }}" class="text-light text-decoration-none">
                        <span>{{ $friend->name }}</span>
                    </a>
                </div>
                <div class="buttons">
                    <form class="d-inline-block" action="{{ route('friends.accept', $friend->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn rounded-pill btn-sm btn-warning">Accept</button>
                    </form>

                    <form class="d-inline-block" action="{{ route('friends.remove', [$friend->id, 0]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn rounded-pill btn-sm btn-light">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mx-3 px-3 py-2">
        <div class="top d-flex justify-content-between">
            <h5>People you may know</h5>
            <a href="{{ route('friends.suggest') }}" class="link-warning text-decoration-none">See all</a>
        </div>
        <hr class="mt-0">
        @foreach ($suggests as $people)
            <div class="profile-1 d-flex justify-content-between mb-2">
                <div class="profile-name">
                    <a href="{{ route('users.show', $people->id) }}" class="text-light text-decoration-none">
                        <span>{{ $people->name }}</span>
                    </a>
                </div>
                <form action="{{ route('friends.request', $people->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn rounded-pill btn-sm btn-warning">Add Friend</button>
                </form>
            </div>
        @endforeach

    </div>

@endsection
