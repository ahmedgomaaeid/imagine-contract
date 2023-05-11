<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::where('status', 1)->get();
        return view('admin.worker.index', compact('workers'));
    }
    public function create()
    {
        return view('admin.worker.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:workers',
            'password' => 'required|min:6',
            'description' => 'required',
            'start1' => 'required',
            'start2' => 'required',
            'start3' => 'required',
            'outer_price' => 'required',
            'inner_price' => 'required',
            'spliter_price' => 'required',
        ]);
        $worker = new Worker();
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->password = bcrypt($request->password);
        $worker->description = $request->description;
        $worker->start1 = $request->start1;
        $worker->start2 = $request->start2;
        $worker->start3 = $request->start3;
        $worker->outer_price = $request->outer_price;
        $worker->inner_price = $request->inner_price;
        $worker->tranch_price = $request->tranch_price;
        $worker->pipe_price = $request->pipe_price;
        $worker->sharshor_price = $request->sharshor_price;
        $worker->spliter_price = $request->spliter_price;
        $worker->save();
        return redirect()->route('get.admin.worker')->with('success', 'تم اضافة العامل بنجاح');
    }
    public function edit($id)
    {
        $worker = Worker::find($id);
        return view('admin.worker.edit', compact('worker'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:workers,email,' . $id,
            'description' => 'required',
            'start1' => 'required',
            'start2' => 'required',
            'start3' => 'required',
            'outer_price' => 'required',
            'inner_price' => 'required',
            'spliter_price' => 'required',
        ]);
        $worker = Worker::find($id);
        $worker->name = $request->name;
        $worker->email = $request->email;
        if ($request->password) {
            $worker->password = bcrypt($request->password);
        }
        $worker->description = $request->description;
        $worker->start1 = $request->start1;
        $worker->start2 = $request->start2;
        $worker->start3 = $request->start3;
        $worker->outer_price = $request->outer_price;
        $worker->inner_price = $request->inner_price;
        $worker->tranch_price = $request->tranch_price;
        $worker->pipe_price = $request->pipe_price;
        $worker->sharshor_price = $request->sharshor_price;
        $worker->spliter_price = $request->spliter_price;
        $worker->save();
        return redirect()->route('get.admin.worker')->with('success', 'تم تعديل العامل بنجاح');
    }
    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->status = 0;
        $worker->save();
        return redirect()->route('get.admin.worker')->with('success', 'تم حذف العامل بنجاح');
    }
}