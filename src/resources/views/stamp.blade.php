@extends('layouts.app')
    
@section('css')
    <link 
        rel="stylesheet" 
        href="{{ asset('css/stamp.css') }}"
    >
@endsection

@section('content')
    <p>勤怠ボタンのところ</p>
    <p>{{ Auth::user()->name }} さん、お疲れ様です！</p>
@endsection