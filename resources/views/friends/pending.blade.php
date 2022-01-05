@extends('layouts.template')

@section('content')
    <div class="top px-4">
        <h4 class="fw-bold">Friends</h4>
    </div>
    {{-- Friend Request --}}
    <div class="mx-3 px-3 py-2">
        <div class="top">
            <h5>Friend Request</h5>
        </div>
        <hr class="mt-0">
        @forelse ($pending as $friend)
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
        @empty

        @endforelse

    </div>

@endsection
