@extends('layouts.workerdashboard')

@section('content')
<div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">تعديل منزل شعرة واحدة </h1>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-lg-12">
                            <form method="post" action="{{route('post.house1.edit',$house->id)}}" enctype= "multipart/form-data">
                            @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title"> تعديل منزل شعرة واحدة </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                        <label class="col-md-3 form-label"> الصور المرفقة :</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="file" name="photos[]" multiple>
                                                @error('video')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> رقم المشترك :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="sub_num" placeholder="رقم المشترك" value="{{$house->sub_num}}">
                                                @error('sub_num')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> الرقم البريدي :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="post_code" placeholder="الرقم البريدي" value="{{$house->post_code}}">
                                                @error('post_code')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> بداية قراءة الكيبل بالامتار  :</label>
                                            <div class="col-md-9">
                                                <input type="tel" class="form-control" name="cable_start" placeholder="بداية قراءة الكيبل بالامتار " value="{{$house->cable_start}}">
                                                @error('cable_start')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> نهاية القراءة  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="end_read" placeholder="نهاية القراءة " value="{{$house->end_read}}">
                                                @error('end_read')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> رقم المنفذ  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="port_num" placeholder="رقم المنفذ" value="{{$house->port_num}}">
                                                @error('port_num')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> اشارة المنفذ  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="port_signal" placeholder="اشارة المنفذ" value="{{$house->port_signal}}">
                                                @error('port_signal')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> اشارة البوكس المنزلي  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="box_signal" placeholder="اشارة البوكس المنزلي " value="{{$house->box_signal}}">
                                                @error('box_signal')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> ترنش  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="tranch" placeholder="ترنش" value="{{$house->tranch}}">
                                                @error('tranch')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> مواسير حرارية pvc  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="pvc" placeholder="مواسير حرارية pvc" value="{{$house->pvc}}">
                                                @error('pvc')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> سحابات  :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="sharshor" placeholder="سحابات" value="{{$house->sharshor}}">
                                                @error('sharshor')
                                                    <div class="invalid-feedback" style="display:block;">{{$message}}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> التاريخ  :</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="created_at" value="{{$o_date}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label"> هل التركيبة مسار مغلق ؟ :</label>
                                                <div class="form-group">
                                                    <label class="custom-switch form-switch mb-0">
                                                            <input type="checkbox" name="use_spliter" value="1" class="custom-switch-input" 
                                                            @if($house->use_spliter == 1)
                                                                checked
                                                                @endif
                                                            >
                                                            <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                                        </label>
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