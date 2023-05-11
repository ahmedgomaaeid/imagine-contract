@extends('layouts.workerdashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">ادخال عمل</h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.open-house.create')}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title"> ادخال عمل </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-lg">
                                                <textarea class="form-control mb-4" placeholder="قم بادخال الاعمال الحرة هنا" rows="4" name = "text"></textarea>
                                            </div>
                                    </div>
                                    <div class="row mb-4">
                                            <label class="col-md-3 form-label"> التاريخ  :</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="created_at">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card-footer">
                                        <!--Row-->
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-primary">اضافة</button>
                                            </div>
                                        </div>
                                        <!--End Row-->
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!-- /ROW-1 CLOSED -->
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
@endsection