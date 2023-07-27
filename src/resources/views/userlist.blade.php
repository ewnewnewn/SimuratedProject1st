@extends('layouts.app')
    
@section('css')
    <link 
        rel="stylesheet" 
        href="{{ asset('css/userlist.css') }}"
    >
@endsection

@section('content')

<div class="userlist">
    <h1 class="userlist__title">
        UserList
    </h1>

    <ul class="userlist__list">
        @foreach ($users as $user)
            <li><a href="{{ route('userworks', $user->id) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
</div>

@endsection