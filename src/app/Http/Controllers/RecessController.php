<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recess;


class RecessController extends Controller
{
    public function recessStart(Request $request)
    {
        $user=$request->user();

        $recess = Recess::create([
            'user_id'=>$user->id,
            'start_time'=>now()
        ]);

        return redirect('/');

    }
    
    public function recessEnd(Request $request)
    {
        $user = $request->user();
        
        //最新の勤務レコードを取得して更新
        $recess = Recess::where('user_id', $user->id)->latest()->first();
        $recess->end_time= now();
        $recess->save();

        return redirect('/');

    }

}
