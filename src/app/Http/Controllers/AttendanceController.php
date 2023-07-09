<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\work;
use App\Models\recess;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function attendance()
    {
        return view('date');
    }

    public function start(Request $request)
    {
        $user=$request->user();

        //直近の勤務レコードを取得
        $latestAttendance=work::where('user_id',$user->id)
            ->orderByDesc('start_time')->first();

        //現在の日時と日付を取得
        $currentDateTime=Carbon::now();
        $currentDate=$currentDateTime->toDateString();

        //直近の勤務レコードが存在し、同じ日の場合は更新しない
        if(!$latestAttendance || Carbon::parse($latestAttendance->start_time)->toDateString() !== $currentDate)
        {
            //勤務開始のレコード作成
            $attendance=work::updateOrCreate(
                ['user_id'=>$user->id],
                ['start_time'=>now()]
            );
            return view('stamp');
        }
        else{
            return('失敗');
        }

    }

    public function end(Request $request)
    {
        $user = $request->user();
        
        //最新の勤務レコードを取得して更新
        $attendance = work::where('user_id', $user->id)->latest()->first();
        $attendance->end_time= now();
        $attendance->save();

        return view('stamp');

    }

}
