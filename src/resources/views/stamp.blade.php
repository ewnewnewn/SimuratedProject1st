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
            <form action="" class="works-start" method="POST">
                @csrf
                <button class="work-start__button">勤務開始</button>
            </form>
            
            <form action="" class="work-finish" method="POST">
                @csrf
                <button class="works-start__button">勤務終了</button>
            </form>
        </div>

        <div class="breakings">
            <form action="" class="break-start" method="POST">
                @csrf
                <button class="works-start__button">休憩開始</button>
            </form>
            
            <form action="" class="break-finish" method="POST">
                @csrf
                <button class="works-start__button">休憩終了</button>
            </form>

        </div>

    </div>
@endsection