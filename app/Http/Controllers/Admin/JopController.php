<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\JopImport;
use App\Jop;
use App\Worker;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JopController extends Controller
{
    public function index()
    {
        $jops = Jop::where('worker_id', null)->orderBy('id', 'desc')->get();
        $workers = Worker::where('status', 1)->get();
        return view('admin.jop.new.index', compact('jops', 'workers'));
    }
    public function create()
    {
        return view('admin.jop.new.create');
    }
    public function store(Request $request)
    {
        $jop = new Jop();
        $jop->jop_text = $request->jop_text;
        $jop->save();
        return redirect()->route('get.admin.jop')->with('success', 'تم الاضافة بنجاح');
    }
    public function import(Request $request)
    {
        Excel::import(new JopImport, $request->file('file'));
        return redirect()->back()->with('success', 'تم الاضافة بنجاح');
    }
    public function destroy($id)
    {
        $jop = Jop::find($id);
        $jop->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
    public function sendjop(Request $request)
    {
        foreach($request->jop_id as $jop_id){
            $jop = Jop::find($jop_id);
            $jop->worker_id = $request->worker_id;
            $jop->save();
        }
        return redirect()->back()->with('success', 'تم الارسال بنجاح');
    }
    public function return($id)
    {
        $jop = Jop::find($id);
        $jop->worker_id = null;
        $jop->save();
        return redirect()->back()->with('success', 'تم الارجاع بنجاح');
    }
    public function submited()
    {
        $jops = Jop::where('worker_id', '!=', null)->orderBy('worker_id', 'desc')->orderBy('id', 'desc')->get();
        return view('admin.jop.submited.index', compact('jops'));
    }
}
