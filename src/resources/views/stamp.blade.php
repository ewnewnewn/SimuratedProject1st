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
            
            <form action="/workstart" class="work-start" method="POST">
                @csrf
                <button class="work-start__button" {{ $workStartActive ? '' : 'disabled'}}>
                    勤務開始
                </button>
            </form>

            <form action="/workend" class="work-end" method="POST">
                @csrf
                <button class="works-finish__button" {{ $workEndActive ? '' : 'disabled'}}>
                    勤務終了
                </button>
            </form>

        </div>

        <div class="recesses">

            <form action="/recessstart" class="recess-start" method="POST">
                @csrf
                <button class="recesses-start__button" {{ $recessStartActive ? '' : 'disabled'}}>
                    休憩開始
                </button>
            </form>
            
            <form action="/recessend" class="recess-end" method="POST" >
                @csrf
                <button class="recesses-end__button" {{ $recessEndActive ? '' : 'disabled'}}>
                    休憩終了
                </button>
            </form>

        </div>

    </div>
@endsection