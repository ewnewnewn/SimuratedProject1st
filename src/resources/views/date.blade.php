@extends('layouts.app')

@section('css')
    <link 
        rel="stylesheet" 
        href="{{ asset('css/date.css') }}"
    >
@endsection

@section('content')
    <div class="search-date">
        <a href="" class="search-date__back">
            <
        </a>
        <span class="current-date">
            今日の日付
        </span>
        <a href="" class="search-date__forward">
            >
        </a>
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
            @foreach($contacts as $contact)
            <tr>
                <td>
                    名前
                </td>
                <td>
                    勤務開始時間
                </td>
                <td>
                    勤務終了時間
                </td>
                <td>
                    休憩時間合算
                </td>
                <td>
                    勤務時間合算
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection