@extends('layouts.template')

@section('content')
    <div class="top px-4">
        <h4 class="fw-bold">Friends</h4>
    </div>
    {{-- Friend Request --}}
    <div class="mx-3 px-3 py-2">
        <div class="top">
            <h5>Your Friends</h5>
        </div>
        <hr class="mt-0">
        @forelse ($friends as $friend)
            <div class="profile-1 d-flex justify-content-between mb-2">
                <div class="profile-name">
                    <a href="{{ route('users.show', $friend->id) }}" class="text-light text-decoration-none">
                        <span>{{ $friend->name }}</span>
                    </a>
                </div>
                <form action="{{ route('friends.remove', [$friend->id, 1]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn rounded-pill btn-sm btn-light">Remove</button>
                </form>
            </div>
        @empty

        @endforelse

    </div>

@endsection
