<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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

        //勤務開始状態である　かつ
        //直近の休憩レコードが存在しない　または
        //end_timeがnullでない
        //の場合は休憩開始ボタンをアクティブにする
        $recessStartActive =
            $workEndActive &&
            (!$latestRecess ||
            $latestRecess->end_time !== null);
        
        //勤務開始状態である　かつ
        //直近の休憩レコードが存在する　かつ
        //end_timeがnullでない
        //の場合は休憩終了ボタンをアクティブにする
        $recessEndActive =
            $workEndActive &&
            ($latestRecess &&
            $latestRecess->end_time === null );

        return view('stamp', 
            compact('workStartActive', 'workEndActive','recessStartActive','recessEndActive')
        );

    }

    public function attendance()

    {
        $date = Carbon::today()->toDateString();

        $works= Work::with('user')
            ->whereDate('start_time',$date)
            ->paginate(5,['user_id','start_time','end_time']);


        // working_timeを計算して追加する
        $works->getCollection()->transform(function ($work) {
            $start = Carbon::parse($work->start_time);
            $end = Carbon::parse($work->end_time);
            $work->working_time = $start->diff($end)->format('%H:%I:%S');


            $breaking_time = Recess::where('user_id', $work->user_id)
                ->whereBetween('start_time', [$work->start_time, $work->end_time])
                ->whereBetween('end_time', [$work->start_time, $work->end_time])
                ->sum(DB::raw('TIME_TO_SEC(TIMEDIFF(end_time, start_time))'));

            $work->breaking_time = gmdate('H:i:s', $breaking_time);

            return $work;

        });
        
        return view('dateInfo',compact('date','works'));
    }

}
