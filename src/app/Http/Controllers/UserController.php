<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function showUserList()
    {
         $users = User::paginate(5);
        return view('userlist', compact('users'));
    }

    public function showUserWorksList($id)
    {
        $user = User::findOrFail($id);
        $works = $user->works;

        // 日付と時間をフォーマット
        foreach ($works as $work) {
            $work->work_date = Carbon::parse($work->work_date)->toDateString();
            $work->start_time = Carbon::parse($work->start_time)->toTimeString();
            $work->end_time = Carbon::parse($work->end_time)->toTimeString();
        }

        return view('userworks', compact('user', 'works'));
    }
}
