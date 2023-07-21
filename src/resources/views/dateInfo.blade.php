@extends('layouts.app')

@section('css')
    <link 
        rel="stylesheet" 
        href="{{ asset('css/date.css') }}"
    >
@endsection

@section('content')
    <div class="search-date">
        <form action="{{ route('dateback') }}" class="search-date__back" method="POST">
            @csrf
            <button class="search-date__back--button" type="submit">
                <
            </button>
        </form>
        <span class="current-date">
            {{ $date }}
        </span>
        <form action="{{ route('dateforward') }}" class="search-date__forward" method="POST">
            @csrf
            <button class="search-date__forward--button" type="submit">
                >
            </button>
        </form>

    </div>

    <div class="search-result">
        <table class="search-result__table">
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach($works as $work)
            <tr>
                <td>
                    {{ $work->user->name }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($work->start_time)->format('H:i:s') }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($work->end_time)->format('H:i:s') }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($work->breaking_time)->format('H:i:s') }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($work->working_time)->format('H:i:s') }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    {{ $works->links() }}

@endsection