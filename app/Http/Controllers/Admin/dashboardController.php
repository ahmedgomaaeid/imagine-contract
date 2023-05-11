<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Worker;
use App\Exports\WorkersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $worker_dues = Worker::Where('dues', '!=', 0)->orderBy('dues', 'desc')->get();
        $departments = Department::where('soft_delete', '=', 0)->orderby('updated_at', 'desc')->get();
        return view('admin.index', compact('worker_dues'), compact('departments'));
    }
    public function sendMoney($id)
    {
        $worker = Worker::find($id);
        $worker->dues = 0;
        Department::where('worker_id', $id)->where('cash_done', 0)->orderby('updated_at', 'desc')->update(['cash_done' => 1]);
        $worker->save();
        return redirect()->back()->with('success', 'تم ارسال المبلغ بنجاح');
    }
    public function showPhotos($id)
    {
        $photos = Department::find($id)->photos;
        $array_photos = explode(',', $photos);
        return view('admin.showphotos', compact('array_photos'));
    }
    public function export(Request $request)
    {
        $date = explode('/', $request->from);
        $date1 = explode('/', $request->to);
        $from = $date[2].'-'.$date[0].'-'.$date[1];
        $to = $date1[2].'-'.$date1[0].'-'.$date1[1].' 23:59:59';
        return Excel::download(new WorkersExport($from, $to), 'imagine-contract.xlsx');
    }
}
