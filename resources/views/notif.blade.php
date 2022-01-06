@extends('layouts.template')

@section('content')
    <div class="top px-4">
        <h4 class="fw-bold">Notifiations</h4>
    </div>

    {{-- posts --}}
    <section class="posts mt-2">
        <!--1 post-->
        <div class="border border-secondary border-bottom-0 border-start-0 border-end-0 py-2">
            @foreach ($notifications as $notif)
                <div class="notif-box px-4 py-2 border-bottom border-secondary">
                    @include('layouts.notif.' . getNotificationViewPart($notif->type))
                </div>
            @endforeach

        </div>

    </section>
@endsection
