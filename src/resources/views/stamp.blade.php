@extends('layouts.app')
    
@section('css')
    <link 
        rel="stylesheet" 
        href="{{ asset('css/stamp.css') }}"
    >
@endsection

@section('content')
    <div class="stamp">
        <div class="stamp__user-message">
            <p>{{ Auth::user()->name }} さん、お疲れ様です！</p>
        </div>
        <div class="works">
            <form action="/attendance/workstart" class="work-start" method="POST">
                @csrf
                <button class="work-start__button">勤務開始</button>
            </form>
            
            <form action="/attendance/workend" class="work-end" method="POST">
                @csrf
                <button class="works-finish__button">勤務終了</button>
            </form>
        </div>

        <div class="recesses">
            <form action="/attendance/recessstart" class="recess-start" method="POST">
                @csrf
                <button class="recesses-start__button">休憩開始</button>
            </form>
            
            <form action="/attendance/recessend" class="recess-end" method="POST">
                @csrf
                <button class="recesses-end__button">休憩終了</button>
            </form>

        </div>

    </div>
@endsection