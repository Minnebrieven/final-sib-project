@extends('public.index')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">🏆 Scoreboard Poin Total</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-white">
            <tr>
                <th>Peringkat</th>
                <th>Nama</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @php
                $userRank = null;
            @endphp
            @foreach ($ranked as $index => $user)
                @php
                    $rank = $index + 1;
                    $isCurrentUser = (!empty(Auth::user()->id) ? $user->id === Auth::user()->id : false );
                    if ($isCurrentUser) {
                        $userRank = $rank;
                        $userScore = $user->score;
                    }
                @endphp
                <tr @if($isCurrentUser) class="table-success fw-bold" @endif>
                    <td>
                        @if($rank === 1) 🥇
                        @elseif($rank === 2) 🥈
                        @elseif($rank === 3) 🥉
                        @else {{ $rank }}
                        @endif
                    </td>
                    <td>{{ $user->user->name }}</td>
                    <td>{{ $user->score }} pts</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Info user sendiri --}}
    @if ($userRank)
        <div class="alert alert-info text-center mt-4">
            👤 Kamu berada di <strong>peringkat {{ $userRank }}</strong>
            dengan <strong>{{ $userScore }} poin</strong>.
        </div>
    @endif
</div>
@endsection
