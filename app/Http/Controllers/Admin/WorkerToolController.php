<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tool;
use App\Worker;
use Illuminate\Http\Request;

class WorkerToolController extends Controller
{
    public function index($id)
    {
        $id = $id;
        $tools = Worker::find($id)->tools;
        return view('admin.worker_tools.index', compact('tools', 'id'));
    }
    public function create($id)
    {
        return view('admin.worker_tools.create', compact('id'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tool = new Tool();
        $tool->name = $request->name;
        $tool->worker_id = $id;
        $tool->save();
        return redirect()->route('get.admin.worker.tool', $id)->with('success', 'تم اضافة الاداة بنجاح');
    }
    public function edit($id)
    {
        $tool = Tool::find($id);
        return view('admin.worker_tools.edit', compact('tool'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tool = Tool::find($id);
        $tool->name = $request->name;
        $tool->save();
        return redirect()->route('get.admin.worker.tool', $tool->worker_id)->with('success', 'تم تعديل الاداة بنجاح');
    }
    public function destroy($id)
    {
        $tool = Tool::find($id);
        $tool->delete();
        return redirect()->route('get.admin.worker.tool', $tool->worker_id)->with('success', 'تم حذف الاداة بنجاح');
    }
}
