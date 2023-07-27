@extends('layouts.app')
    
@section('css')
    <link 
        rel="stylesheet" 
        href="{{ asset('css/userworkslist.css') }}"
    >
@endsection

@section('content')
<div class="userworks__title">
    <h1 class="userworks__title">{{ $user->name }}'s Works</h1>
    <table>
        <thead>
            <tr>
                <th>Work Date</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($works as $work)
                <tr>
                    <td>{{ $work->work_date }}</td>
                    <td>{{ substr($work->start_time, 11) }}</td>
                    <td>{{ substr($work->start_time, 11) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection