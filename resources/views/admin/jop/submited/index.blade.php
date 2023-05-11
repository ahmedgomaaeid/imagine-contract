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
                        <!-- ROW-4 -->
                        <div class="row" style="padding-top: 25px;">
                            <div class="col-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title mb-0">المهام المرسلة</h3>
                                        </div>
                                        <div class="card-body pt-4">
                                            <div class="grid-margin">
                                                <div class="">
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
                                                                                        ملاحظة</th>
                                                                                    <th
                                                                                        class="bg-transparent border-bottom-0">
                                                                                        المستخدم</th>
                                                                                    <th
                                                                                        class="bg-transparent border-bottom-0">
                                                                                        الاسم</th>
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
                                                                                                    @if ($jop->done == 1)
                                                                                                        <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">تم الانجاز</span>
                                                                                                    @elseif($jop->done == 2)
                                                                                                        <span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3">مرفوضة</span>
                                                                                                        {{$jop->notes}}
                                                                                                    @endif
                                                                                                    
                                                                                                    </h6>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="">
                                                                                            <div class="mt-0 mt-sm-2 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                    
                                                                                                    {{$jop->worker->name}}</h6>
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
                                                                                                data-bs-original-title="Delete" href="
                                                                                                @if($jop->done == 1)
                                                                                                    {{route('get.admin.jop.delete',$jop->id)}}
                                                                                                @else
                                                                                                    {{route('get.admin.jop.return',$jop->id)}}
                                                                                                @endif
                                                                                                "><span
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
                            </div>
                        </div>
                        <!-- ROW-4 END -->
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
@endsection