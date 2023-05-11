@extends('layouts.dashboard')

@section('content')
    <div class="main-content app-content mt-0">
                <div class="side-app">
                    @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }} 
                                </div>
                            @endif
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        <form method="POST" action="{{route('import')}}" enctype= "multipart/form-data" style="margin-top:20px">
                            @csrf
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">استيراد مهام</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                        <label class="col-md-3 form-label"> ملف الاكسل :</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="file" name="file">
                                                @error('file')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <!--Row-->
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-primary">استيراد</button>
                                            </div>
                                        </div>
                                        <!--End Row-->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- ROW-4 -->
                        <div class="row" style="padding-top: 25px;">
                            <div class="col-12 col-sm-12">
                            
                                <form method="POST" action="{{route('post.admin.jop.sendjop')}}">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title mb-0">المهام</h3>
                                            <div class="dataTables_filter" style="margin-right: 10px; width: 200px;">
                                                <select name="worker_id" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                    @foreach ($workers as $worker)
                                                        <option value="{{$worker->id}}">{{$worker->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-primary">ارسال</button>
                                            </div>
                                        </div>
                                        <div class="card-body pt-4">
                                            <div class="grid-margin">
                                                <div class="">
                                                    <div class="panel panel-primary">
                                                        <div class="tab-menu-heading border-0 p-0">
                                                        <div class="tabs-menu1">
                                                            <!-- Tabs -->
                                                            <ul class="nav panel-tabs product-sale">
                                                                <li><a href="{{route('get.admin.jop.create')}}" class="active"
                                                                        >اضافة مهمة</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                        <div class="panel-body tabs-menu-body border-0 pt-0">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="tab5">
                                                                    <div class="table-responsive">
                                                                        <table id="data-table"
                                                                            class="table table-bordered text-nowrap mb-0">
                                                                            <thead class="border-top">
                                                                                <tr>
                                                                                    <th
                                                                                        class="bg-transparent border-bottom-0">
                                                                                        تحديد</th>
                                                                                    <th
                                                                                        class="bg-transparent border-bottom-0">
                                                                                        المهمة</th>
                                                                                    <th class="bg-transparent border-bottom-0"
                                                                                        style="width: 5%;">العمليات</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($jops as $jop)
                                                                                    <tr>
                                                                                        <td class="">
                                                                                            <div class="mt-0 mt-sm-2 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                    
                                                                                                    <label class="custom-control custom-checkbox-md">
                                                                                                        <input type="checkbox" class="custom-control-input" name="jop_id[]" value="{{$jop->id}}">
                                                                                                        <span class="custom-control-label"></span>
                                                                                                    </label></h6>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="">
                                                                                            <div class="mt-0 mt-sm-2 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                    
                                                                                                    {{$jop->jop_text}}</h6>
                                                                                            </div>
                                                                                        </td>
                                                                                        
                                                                                        
                                                                                        <td>
                                                                                        <div class="g-2">
                                                                                            <a class="btn text-danger btn-sm"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-original-title="Delete" href="{{route('get.admin.jop.delete',$jop->id)}}"><span
                                                                                                    class="fe fe-trash-2 fs-14"></span></a>
                                                                                        </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- ROW-4 END -->
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
@endsection