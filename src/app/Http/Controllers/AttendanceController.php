<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function workStart(Request $request)
    {
        $user=$request->user();

        //直近の勤務レコードを取得
        $latestAttendance=Work::where('user_id',$user->id)->orderByDesc('start_time')->first();

        //現在の日時と日付を取得
        $currentDate = Carbon::today()->toDateString(); 

        if (!$latestAttendance ||
            $latestAttendance->end_time ||
            $latestAttendance->start_time->toDateString() !== $currentDate){
            //直近の勤務レコードが存在していない　または
            //最新レコードにend_timeが格納されている場合 または
            //開始時刻が現在の日付と一致しない時
            //レコード作成
            
            $attendance = work::create([
                'user_id'=>$user->id,
                'start_time'=>now()
            ]);

            return redirect('/');

        }else{
            return '失敗';
        }
    }

    public function workEnd(Request $request)
    {
        $user = $request->user();
        
        //最新の勤務レコードを取得して更新
        $attendance = work::where('user_id', $user->id)->latest()->first();
        $attendance->end_time= now();
        $attendance->save();

        return redirect('/');

    }

}
