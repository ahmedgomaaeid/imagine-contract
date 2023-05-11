@extends('layouts.workerdashboard')
@section('content')
    <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                    @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }} 
                                </div>
                            @endif
                            @if(session()->has('status'))
                                <div class="alert alert-danger">
                                    {{ session()->get('status') }}
                                </div>
                                @endif
                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">لوحة التحكم</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">الرئسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">مستحقاتك</h6>
                                                        <h2 class="mb-0 number-font">{{$dues}}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 END -->
                        

                        <!-- ROW-2 -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">تسجيلاتك</h3>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
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
                                                                                    نوع التسجيل</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    رقم المشترك</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الرمز البريدي</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    بداية قراءة الكيبل بالامتار</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    القراءة على الهوك</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    نهاية القراءة</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    رقم المنفذ</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    رقم الروت</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    اشارة المنفذ</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    اشارة البوكس المنزلى</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    اشارة ماقبل السبلتر</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    اشارة المنافذ كمتوسط</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    ترنش</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    مواسير حرارية pvc</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    سحابات</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                     مسار مغلق</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    وقت التسجيل</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    category</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    مجموع المبلغ</th>
                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($departments as $dep)
                                                                                <tr class="border-bottom">
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                    

                                                                                                        @if ($dep->band ==1)
                                                                                                            مرفوض ({{$dep->reson}})
                                                                                                             <a class="btn text-primary btn-sm"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Edit" href="
                                                                                            @if($dep->type=="0")
                                                                                            {{route('get.house1.edit',$dep->id)}}
                                                                                            @elseif ($dep->type=="1")
                                                                                            {{route('get.house4.edit',$dep->id)}}
                                                                                            @elseif ($dep->type=="2")
                                                                                            {{route('get.build4.edit',$dep->id)}}
                                                                                            @endif
                                                                                            "><span
                                                                                                class="fe fe-edit fs-14"></span></a>
                                                                                                        @endif
                                                                                                        </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                     @if ($dep->type=="0")
                                                                                                        منزل شعرة واحدة
                                                                                                     @elseif($dep->type=="1")
                                                                                                        منزل 4 شعرات
                                                                                                     @elseif($dep->type=="2")
                                                                                                        بناية 4 شعرات
                                                                                                    @else
                                                                                                        (عمل جانبي) {{$dep->type}}
                                                                                                    @endif
                                                                                                    @if ($dep->cash_done ==1)
                                                                                                        <span class="badge bg-success-transparent rounded-pill text-success p-2 px-3">مدفوع</span>
                                                                                                    @endif
                                                                                                      </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->sub_num}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->post_code}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->cable_start}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->hook}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->end_read}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->port_num}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->root_num}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->port_signal}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->box_signal}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->pre_spliter_signal}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->port_signal_m}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->tranch}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->pvc}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->sharshor}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        @if($dep->use_spliter == 1) نعم @endif </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->created_at}} </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        @if ($dep->type == "1" or $dep->type == "2")
                                                                                                            @if ($dep->tranch +$dep->pvc >= 5)
                                                                                                                3
                                                                                                                
                                                                                                            @else
                                                                                                                2
                                                                                                            @endif
                                                                                                        @endif </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->total}} </h6>
                                                                                            </div>
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
                        <!-- ROW-2 END -->
                        
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
@endsection