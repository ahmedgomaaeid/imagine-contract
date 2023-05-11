@extends('layouts.workerdashboard')

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
                                                    <table id="data-table" class="table table-bordered text-nowrap mb-0">
                                                        <thead class="border-top">
                                                            <tr>
                                                                <th class="bg-transparent border-bottom-0">
                                                                    المهمة</th>
                                                                <th class="bg-transparent border-bottom-0" style="width: 5%;">العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($jops as $jop)
                                                            <tr>
                                                                <td class="">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6 class="mb-0 fs-14 fw-semibold">

                                                                            {{$jop->jop_text}}</h6>
                                                                    </div>
                                                                </td>


                                                                <td>
                                                                    <div class="g-2">
                                                                        <a class="btn text-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="approve" href="{{route('get.jops.done',$jop->id)}}"><span class="fe fe-check-circle fs-14"></span></a>
                                                                        <a class="btn text-danger btn-sm" data-bs-toggle="modal" data-bs-target="#input-modal{{$jop->id}}" data-bs-whatever="@mdo"><span class="fe fe-x-circle fs-14"></span></a>
                                                                        <div class="modal fade" id="input-modal{{$jop->id}}">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content modal-content-demo">
                                                                                    <form action="{{route('post.jops.cancel', $jop->id)}}" method="POST">
                                                                                        @csrf
                                                                                        <div class="modal-header">
                                                                                            <h6 class="modal-title">سبب الرفض</h6>
                                                                                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">×</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                                <div class="mb-3">
                                                                                                    <label for="recipient-name" class="col-form-label">السبب:</label>
                                                                                                    <input type="text" class="form-control" id="recipient-name" name="notes">
                                                                                                    <input type="hidden" class="form-control" name="jop_id" value="{{$jop->id}}">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button class="btn ripple btn-success" type="submit">ارسال</button>
                                                                                            <span class="btn ripple btn-danger" data-bs-dismiss="modal">رجوع</span>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
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
        <!-- ROW-4 END -->
    </div>
    <!-- CONTAINER END -->
</div>
</div>

<script>
    //change jop_id_send value to jop_id value whene click on 

</script>
@endsection
