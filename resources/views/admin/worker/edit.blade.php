@extends('layouts.dashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">تعديل عامل </h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.admin.worker.edit',$worker->id)}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">تعديل عامل </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> اسم العامل :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="name" placeholder="اسم العامل" value="{{$worker->name}}">
                                                @error('name')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> البريد الالكتروني :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="email" placeholder="البريد الالكتروني" value="{{$worker->email}}">
                                                @error('email')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">  الرقم السري :</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" name="password" placeholder=" الرقم السري">
                                                @error('password')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الوصف :</label>
                                            <div class="col-md-9">
                                                <input type="tel" class="form-control" name="description" placeholder="الوصف" value="{{$worker->description}}">
                                                @error('description')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> بداية المنزل 1 شعرة  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="start1" placeholder="بداية المنزل 1 شعرة" value="{{$worker->start1}}">
                                                @error('start_1')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> بداية المنزل 4 شعرات  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="start2" placeholder="بداية المنزل 4 شعرة" value="{{$worker->start2}}">
                                                @error('start_2')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> بداية مبنى 4 شعرات :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="start3" placeholder="بداية مبنى 4 شعرات" value="{{$worker->start3}}">
                                                @error('start_3')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> سعر القراءة الخارجية :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="outer_price" placeholder="سعر القراءة الخارجية" value="{{$worker->outer_price}}">
                                                @error('outer_price')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> سعر القراءة الداخلية :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="inner_price" placeholder="سعر القراءة الداخلية" value="{{$worker->inner_price}}">
                                                @error('inner_price')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> سعر متر الترنش :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="tranch_price" placeholder="سعر متر الترنش" value="{{$worker->tranch_price}}">
                                                @error('tranch_price')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> سعر متر المواسير الحرارية :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="pipe_price" placeholder="سعر متر المواسير الحرارية" value="{{$worker->pipe_price}}">
                                                @error('pipe_price')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> سعر متر السحابات :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="sharshor_price" placeholder="سعر متر السحابات" value="{{$worker->sharshor_price}}">
                                                @error('sharshore_price')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> سعر  مسار مغلق :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="spliter_price" placeholder="سعر  مسار مغلق" value="{{$worker->spliter_price}}">
                                                @error('spliter_price')
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
                                                <button type="submit" class="btn btn-primary">تعديل</button>
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