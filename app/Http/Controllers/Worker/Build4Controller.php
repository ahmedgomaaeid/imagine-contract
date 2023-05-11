<?php

namespace App\Http\Controllers\Worker;

use App\Department;
use App\Http\Controllers\Controller;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Build4Controller extends Controller
{
    public function create()
    {
        return view('worker.build4.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_code' => 'required',
            'cable_start' => 'required',
            'hook' => 'required',
            'end_read' => 'required',
            'root_num' => 'required',
            'port_num' => 'required',
            'port_signal' => 'required',
            'pre_spliter_signal' => 'required',
            'port_signal_m' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(!$request->has('use_spliter')){
            $sp = 0;
        }else{
            $sp = 1;
        }

         //upload images
         if($request->hasFile('photos')){
            $countfiles = count($_FILES['photos']['name']);
            for($i=0;$i<$countfiles;$i++){
                $filename = $_FILES['photos']['name'][$i];
                
                // Upload file
                move_uploaded_file($_FILES['photos']['tmp_name'][$i],'assets/images/'.$filename);
            
           }
        }
        //convert array to string
        $photos = implode(',', $_FILES['photos']['name']);
        $plus = 0;
        if(($request->tranch + $request->pvc) >= 5)
        {
            $plus += 100;
        }
        if(($request->tranch + $request->pvc) >= 20)
        {
            $plus += (($request->tranch + $request->pvc)-20)*Auth::guard('worker')->user()->pipe_price;
        }
        $total = Auth::guard('worker')->user()->start3+$request->sharshor * Auth::guard('worker')->user()->sharshor_price +abs(($request->hook - $request->cable_start)) * Auth::guard('worker')->user()->outer_price + abs(($request->end_read - $request->hook)) * Auth::guard('worker')->user()->inner_price + $sp * Auth::guard('worker')->user()->spliter_price+$plus;
        $build = new Department();
        $build->post_code = $request->post_code;
        $build->cable_start = $request->cable_start;
        $build->hook = $request->hook;
        $build->end_read = $request->end_read;
        $build->root_num = $request->root_num;
        $build->port_num = $request->port_num;
        $build->port_signal = $request->port_signal;
        $build->pre_spliter_signal = $request->pre_spliter_signal;
        $build->port_signal_m = $request->port_signal_m;
        $build->tranch = $request->tranch;
        $build->pvc = $request->pvc;
        $build->sharshor = $request->sharshor;
        $build->use_spliter = $sp;
        $build->type = 2;
        $build->total = $total;
        $worker = Worker::Where('id', auth()->guard('worker')->user()->id)->first();
        $worker->dues = $worker->dues + $total;
        $build->worker_id = $worker->id;
        $build->photos = $photos;
        $date = explode('/', $request->created_at);
        if($date == [""]){
            $build->created_at = now();
        }else{
            $build->created_at = $date[2].'-'.$date[0].'-'.$date[1];
        }
        $worker->save();
        $build->save();
        return redirect()->route('index')->with('success', 'تم اضافة البيانات بنجاح و اجمالى المبلغ هو '.$total);
    }
    public function edit($id)
    {
        $house = Department::find($id);
        $date1 = explode(' ',$house->created_at);
        $date = explode('-', $date1[0]);
        $o_date = $date[1].'/'.$date[2].'/'.$date[0];
        return view('worker.build4.edit', compact('house', 'o_date'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post_code' => 'required',
            'cable_start' => 'required',
            'hook' => 'required',
            'end_read' => 'required',
            'root_num' => 'required',
            'port_num' => 'required',
            'port_signal' => 'required',
            'pre_spliter_signal' => 'required',
            'port_signal_m' => 'required',
        ]);
        if(!$request->has('use_spliter')){
            $sp = 0;
        }else{
            $sp = 1;
        }
        $plus = 0;
        if(($request->tranch + $request->pvc) >= 5)
        {
            $plus += 100;
        }
        if(($request->tranch + $request->pvc) >= 20)
        {
            $plus += (($request->tranch + $request->pvc)-20)*Auth::guard('worker')->user()->pipe_price;
        }
        $total = Auth::guard('worker')->user()->start3+$request->sharshor * Auth::guard('worker')->user()->sharshor_price +abs(($request->hook - $request->cable_start)) * Auth::guard('worker')->user()->outer_price + abs(($request->end_read - $request->hook)) * Auth::guard('worker')->user()->inner_price + $sp * Auth::guard('worker')->user()->spliter_price+$plus;
        $build = Department::find($id);
        if($request->hasFile('photos')){
            $countfiles = count($_FILES['photos']['name']);
            for($i=0;$i<$countfiles;$i++){
                $filename = $_FILES['photos']['name'][$i];
                
                // Upload file
                move_uploaded_file($_FILES['photos']['tmp_name'][$i],'assets/images/'.$filename);
            
           }
           $photos = implode(',', $_FILES['photos']['name']);
           $build->photos = $photos;
        }
        $build->post_code = $request->post_code;
        $build->cable_start = $request->cable_start;
        $build->hook = $request->hook;
        $build->end_read = $request->end_read;
        $build->root_num = $request->root_num;
        $build->port_num = $request->port_num;
        $build->port_signal = $request->port_signal;
        $build->pre_spliter_signal = $request->pre_spliter_signal;
        $build->port_signal_m = $request->port_signal_m;
        $build->tranch = $request->tranch;
        $build->pvc = $request->pvc;
        $build->sharshor = $request->sharshor;
        $build->use_spliter = $sp;
        $worker = Worker::Where('id', auth()->guard('worker')->user()->id)->first();
        $worker->dues = $worker->dues + $total;
        $worker->save();
        $build->total = $total;
        $date = explode('/', $request->created_at);
        $build->created_at = $date[2].'-'.$date[0].'-'.$date[1];
        $build->band = 0;
        $build->save();
        return redirect()->route('index')->with('success', 'تم تعديل البيانات بنجاح و اجمالى المبلغ هو '.$total);
    }
}
