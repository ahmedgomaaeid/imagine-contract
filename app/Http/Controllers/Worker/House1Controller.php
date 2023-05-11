<?php

namespace App\Http\Controllers\Worker;

use App\Department;
use App\Http\Controllers\Controller;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class House1Controller extends Controller
{
    public function create()
    {
        return view('worker.house1.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_num' => 'required',
            'post_code' => 'required',
            'cable_start' => 'required',
            'end_read' => 'required',
            'port_num' => 'required',
            'port_signal' => 'required',
            'box_signal' => 'required',
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
        $date = explode('/', $request->created_at);
        //convert array to string
        $photos = implode(',', $_FILES['photos']['name']);
        $total = Auth::guard('worker')->user()->start1+$request->tranch * Auth::guard('worker')->user()->tranch_price +$request->pvc * Auth::guard('worker')->user()->pipe_price+$request->sharshor * Auth::guard('worker')->user()->sharshor_price+ $sp * Auth::guard('worker')->user()->spliter_price;
        $house = new Department();
        $house->sub_num = $request->sub_num;
        $house->post_code = $request->post_code;
        $house->cable_start = $request->cable_start;
        $house->end_read = $request->end_read;
        $house->port_num = $request->port_num;
        $house->port_signal = $request->port_signal;
        $house->box_signal = $request->box_signal;
        $house->tranch = $request->tranch;
        $house->pvc = $request->pvc;
        $house->sharshor = $request->sharshor;
        $house->use_spliter = $sp;
        $house->type = 0;
        $house->total = $total;
        $worker = Worker::Where('id', auth()->guard('worker')->user()->id)->first();
        $worker->dues = $worker->dues + $total;
        $house->worker_id = $worker->id;
        $house->photos = $photos;
        if($date == [""]){
            $house->created_at = now();
        }else{
            $house->created_at = $date[2].'-'.$date[0].'-'.$date[1];
        }
        $worker->save();
        $house->save();
        return redirect()->route('index')->with('success', 'تم اضافة البيانات بنجاح و اجمالى المبلغ هو '.$total);
    }
    public function edit($id)
    {
        $house = Department::find($id);
        $date1 = explode(' ',$house->created_at);
        $date = explode('-', $date1[0]);
        $o_date = $date[1].'/'.$date[2].'/'.$date[0];
        return view('worker.house1.edit', compact('house', 'o_date'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sub_num' => 'required',
            'post_code' => 'required',
            'cable_start' => 'required',
            'end_read' => 'required',
            'port_num' => 'required',
            'port_signal' => 'required',
            'box_signal' => 'required',
        ]);

        if(!$request->has('use_spliter')){
            $sp = 0;
        }else{
            $sp = 1;
        }
        $date = explode('/', $request->created_at);
        $total = Auth::guard('worker')->user()->start1+$request->tranch * Auth::guard('worker')->user()->tranch_price+$request->sharshor * Auth::guard('worker')->user()->sharshor_price +$request->pvc * Auth::guard('worker')->user()->pipe_price+ $sp * Auth::guard('worker')->user()->spliter_price;

        $house = Department::find($id);
        if($request->hasFile('photos')){
            $countfiles = count($_FILES['photos']['name']);
            for($i=0;$i<$countfiles;$i++){
                $filename = $_FILES['photos']['name'][$i];
                
                // Upload file
                move_uploaded_file($_FILES['photos']['tmp_name'][$i],'assets/images/'.$filename);
            
           }
           $photos = implode(',', $_FILES['photos']['name']);
              $house->photos = $photos;
        }
        $house->sub_num = $request->sub_num;
        $house->post_code = $request->post_code;
        $house->cable_start = $request->cable_start;
        $house->end_read = $request->end_read;
        $house->port_num = $request->port_num;
        $house->port_signal = $request->port_signal;
        $house->box_signal = $request->box_signal;
        $house->tranch = $request->tranch;
        $house->pvc = $request->pvc;
        $house->sharshor = $request->sharshor;
        $house->use_spliter = $sp;
        $worker = Worker::Where('id', auth()->guard('worker')->user()->id)->first();
        $worker->dues = $worker->dues + $total;
        $worker->save();
        $house->total = $total;
        $house->band = 0;
        if($date == [""]){
            $house->created_at = now();
        }else{
            $house->created_at = $date[2].'-'.$date[0].'-'.$date[1];
        }
        $house->save();
        return redirect()->route('index')->with('success', 'تم تعديل البيانات بنجاح و اجمالى المبلغ هو '.$total);
    }
}
