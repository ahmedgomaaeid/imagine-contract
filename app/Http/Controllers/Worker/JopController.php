<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Jop;
use Illuminate\Http\Request;

class JopController extends Controller
{
    public function index()
    {
        $jops = Jop::where('worker_id', auth()->user()->id)->where('done', null)->get();
        return view('worker.jop.index', compact('jops'));
    }
    public function done($id)
    {
        $jop = Jop::find($id);
        $jop->done = 1;
        $jop->save();
        return redirect()->back()->with('success', 'تم التسليم بنجاح');
    }
    public function cancel(Request $request)
    {
        $jop = Jop::find($request->jop_id);
        $jop->done = 2;
        $jop->notes = $request->notes;
        $jop->save();
        return redirect()->back()->with('success', 'تم الغاء الطلب بنجاح');
    }
}
