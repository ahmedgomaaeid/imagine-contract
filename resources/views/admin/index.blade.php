@extends('layouts.dashboard')
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
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">مستحقات العمال</h3>
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
                                                                                    الاسم</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    البريد الالكتروني</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    المستحقات</th>
                                                                                
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">اتمام الدفع</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($worker_dues as $due)
                                                                                <tr class="border-bottom">
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                     {{$due->name}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$due->email}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$due->dues}}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    
                                                                                    <td>
                                                                                        <div class="g-2">
                                                                                            <a class="btn text-primary btn-lg"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-original-title="send money" href="{{route('get.admin.send.money',$due->id)}}"><span
                                                                                                    class="fa fa-money"></span></a>
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
                        <!-- ROW-1 END -->
                        <form method="POST" action="{{route('export')}}">
                            @csrf
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">تصدير التسجيلات</div>
                                    </div>
                                    <div class="card-body">
                                        <p class="mg-b-20 mg-sm-b-40">من</p>
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="from">
                                            </div>
                                        </div>
                                        <p class="mg-b-20 mg-sm-b-40">الى</p>
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="to">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <!--Row-->
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-primary">تصدير</button>
                                            </div>
                                        </div>
                                        <!--End Row-->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- ROW-2 -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">جميع التسجيلات</h3>
                                        <div id="data-table_filter" class="dataTables_filter"><label><input type="search" id="myInput" onkeyup="myFunction()" class="form-control form-control" placeholder="ابحث..." aria-controls="data-table"></label></div>

                                    </div>
                                    <div class="card-body pt-4" style="overflow: scroll; height: 500px;">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
                                                    <div class="panel-body tabs-menu-body border-0 pt-0">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab5">
                                                                <div class="table-responsive">
                                                                    <table id="myTable"
                                                                        class="table table-bordered text-nowrap mb-0">
                                                                        <thead class="border-top">
                                                                            <tr>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    الصور</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    القائم بالتسجيل</th>
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
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    العمليات</th>
                                                                                
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
                                                                                                       <a href="{{route('get.admin.show.photos',$dep->id)}}"> عرض </a></h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex">
                                                                                            <div
                                                                                                class="mt-0 mt-sm-3 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                        {{$dep->worker->name}}</h6>
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
                                                                                                        @if ($dep->type != 0)
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
                                                                                    <td>
                                                                                    <div class="g-2">
                                                                                        <a class="btn text-primary btn-sm"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Edit" href="{{route('get.admin.department.edit',$dep->id)}}"><span
                                                                                                class="fe fe-edit fs-14"></span></a>
                                                                                        <a class="btn text-danger btn-sm"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Delete" href="{{route('get.admin.department.delete',$dep->id)}}"><span
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
                        <!-- ROW-2 END -->
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    td2 = tr[i].getElementsByTagName("td")[3];
    if (td != null || td2 != null) {
      txtValue = td.textContent || td.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
@endsection