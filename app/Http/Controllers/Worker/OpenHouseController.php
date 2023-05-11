<?php

namespace App\Http\Controllers\Worker;

use App\Department;
use App\Http\Controllers\Controller;
use App\Worker;
use Illuminate\Http\Request;

class OpenHouseController extends Controller
{
    public function create()
    {
        return view('worker.open_house.create');
    }
    public function store(Request $request)
    {
        $house = new Department();
        $worker = Worker::Where('id', auth()->guard('worker')->user()->id)->first();
        $house->worker_id = $worker->id;
        $date = explode('/', $request->created_at);
        if($date == [""]){
            $house->created_at = now();
        }else{
            $house->created_at = $date[2].'-'.$date[0].'-'.$date[1];
        }
        $house->type = $request->text;
        $house->save();
        return redirect()->route('index')->with('success', 'تم اضافة البيانات بنجاح');
    }
}
