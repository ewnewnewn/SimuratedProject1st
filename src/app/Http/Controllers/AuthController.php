<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Recess;


class AuthController extends Controller
{
    public function index()
    {

        $user=auth()->user();
        $latestAttendance = Work::where('user_id',$user->id)->orderByDesc('start_time')->first();
        $latestRecess = Recess::where('user_id',$user->id)->orderByDesc('start_time')->first();

        //直近の勤務レコードが存在しない　または
        //開始時刻が現在の日付と一致しない　または
        //end_timeがnullでない　
        //の場合は勤務開始ボタンをアクティブにする
        $workStartActive = 
            !$latestAttendance || 
            !$latestAttendance->start_time->isToday() ||
            $latestAttendance->end_time !== null;

        //直近の勤務レコードが存在する　かつ
        //end_time が null 
        //の場合は勤務終了ボタンをアクティブにする
        $workEndActive = 
            $latestAttendance && 
            $latestAttendance->end_time === null;

        //直近の休憩レコードが存在しない　または
        //end_timeがnullでない
        //の場合は休憩開始ボタンをアクティブにする
        $recessStartActive =
            !$latestRecess ||
            $latestRecess->end_time !== null;
        
        //直近の休憩レコードが存在する　かつ
        //end_timeがnullでない
        //の場合は休憩終了ボタンをアクティブにする
        $recessEndActive =
            $latestRecess &&
            $latestRecess->end_time === null;

        return view('stamp', 
            compact('workStartActive', 'workEndActive','recessStartActive','recessEndActive')
        );

    }

    public function attendance()

    {
        view('date');
    }

}
