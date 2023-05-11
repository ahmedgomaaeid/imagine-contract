<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Worker;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function edit($id)
    {
        $department = Department::find($id);
        $date1 = explode(' ',$department->created_at);
        $date = explode('-', $date1[0]);
        $o_date = $date[1].'/'.$date[2].'/'.$date[0];
        return view('admin.department.edit', compact('department', 'o_date'));
    }
    public function update(Request $request, $id)
    {
        if(!$request->has('use_spliter')){
            $sp = 0;
        }else{
            $sp = 1;
        }
        $house = Department::find($id);
        $worker = Worker::Where('id', $house->worker_id)->first();
        $plus = 0;
        if(($request->tranch + $request->pvc) >= 5)
        {
            $plus += 100;
        }
        if(($request->tranch + $request->pvc) >= 20)
        {
            $plus += (($request->tranch + $request->pvc)-20)*$worker->pipe_price;
        }
        if($house->type == "0"){
            $total = $worker->start1+$request->tranch * $worker->tranch_price +$request->pvc * $worker->pipe_price+$request->sharshor * $worker->sharshor_price+$sp * $worker->spliter_price;
        }elseif($house->type == "1"){
            $total = $worker->start2+abs(($request->hook - $request->cable_start)) * $worker->outer_price + abs(($request->end_read - $request->hook)) * $worker->inner_price + $sp * $worker->spliter_price+$plus;
        }elseif($house->type == "2")
        {
            $total = $worker->start3+abs(($request->hook - $request->cable_start)) * $worker->outer_price + abs(($request->end_read - $request->hook))* $worker->inner_price + $sp * $worker->spliter_price+$plus;
        }
        $house->sub_num = $request->sub_num;
        $house->post_code = $request->post_code;
        $house->cable_start = $request->cable_start;
        $house->hook = $request->hook;
        $house->end_read = $request->end_read;
        $house->root_num = $request->root_num;
        $house->port_num = $request->port_num;
        $house->port_signal = $request->port_signal;
        $house->box_signal = $request->box_signal;
        $house->pre_spliter_signal = $request->pre_spliter_signal;
        $house->port_signal_m = $request->port_signal_m;
        $house->tranch = $request->tranch;
        $house->pvc = $request->pvc;
        $house->sharshor = $request->sharshor;
        $house->use_spliter = $sp;
        $worker -> dues -= $house->total;
        $worker -> dues += $total;
        
        $house->total = $total;
        if(!$request->has('band')){
            $house->band = 0;
            $house->reson = null;
        }else{
            $house->band = 1;
            $house->reson = $request->reson;
            $worker -> dues -= $total;
        }
        $date = explode('/', $request->created_at);
        if($date == [""]){
            $house->created_at = now();
        }else{
            $house->created_at = $date[2].'-'.$date[0].'-'.$date[1];
        }
        $worker -> save();
        $house->save();
        return redirect()->route('get.admin.dashboard')->with('success', 'تم تعديل البيانات بنجاح');
    }
    public function destroy($id)
    {
        $house = Department::find($id);
        $worker = Worker::Where('id', $house->worker_id)->first();
        $worker -> dues -= $house->total;
        $worker -> save();
        $house->soft_delete = 1;
        $house->save();
        return redirect()->route('get.admin.dashboard')->with('success', 'تم حذف البيانات بنجاح');
    }
}
