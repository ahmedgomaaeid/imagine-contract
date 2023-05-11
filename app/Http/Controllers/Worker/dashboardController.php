<?php

namespace App\Http\Controllers\Worker;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        $dues = Auth::guard('worker')->user()->dues;
        $departments = Department::where('worker_id', Auth::guard('worker')->user()->id)->where('soft_delete', '=', 0)->orderBy('updated_at', 'desc')->get();
        return view('worker.index', compact('dues', 'departments'));
    }
}
