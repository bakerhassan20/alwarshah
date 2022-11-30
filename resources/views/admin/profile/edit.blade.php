@extends('layouts.master')
@section('css')

    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@section('title')
تعديل الملف الشخصي
@stop

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/تعديل الملف الشخصي</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


				<!-- row -->
				<div class="row">
    @if (session()->has('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('errors') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<div class="col-12 py-3">
	<div class="container">
		<div class=" d-flex row m-0">
			<div class="col-12 col-lg-6 my-2">
				<form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
					@csrf
					@method("PUT")
                    <div class="col-12 p-0 main-box shadow">
						<div class="col-12 px-0">
							<div class="col-12 px-3 py-3">
							 	<span class="bx bx-info-circle lg"></span> البيانات الأساسية
							</div>
							<div class="col-12 divider" style="min-height: 2px;"></div>
						</div>
						<div class="col-12 p-3">
							<div class="col-12 py-2 px-0 d-flex justify-content-center">
									<img src="{{URL::asset('assets/img/faces/'.Auth::user()->avatar)}}" style="width:150px;height:150px;border-radius:50%;" id="getUserAvatar">
							</div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    الصورة الشخصية
                                </div>
                                <div class="col-12 pt-3">
                                    <input type="file" name="avatar" class="form-control"  id="avatar-image"onchange="loadFile(event)">
                            </div>
                            </div>
							<div class="col-12 p-2">
								<div class="col-12">
									اسم المستخدم
								<span style="color:red;font-size:16px">*</span></div>
								<div class="col-12 pt-3">
									<input type="text" name="name" required="" min="3" max="190" class="form-control" value="{{ Auth::user()->name }}" accept="image/*">
								</div>
							</div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    النبذة
                                </div>
                                <div class="col-12 pt-3">
                                    <textarea class="form-control" name="bio" style="min-height:150px">{{ Auth::user()->bio }}</textarea>
                                </div>
                            </div>
							<div class="col-12 p-2">
								<div class="col-12 pt-3">
									<button class="btn btn-primary">حفظ البيانات</button>

								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

            <div class="col-12 col-lg-6 my-2">
                <form method="POST" action="{{route('profile.update-phone')}}">
                     @csrf
                    @method("PUT")
                    <div class="col-12 p-0 main-box shadow">
                        <div class="col-12 px-0">
                            <div class="col-12 px-3 py-3">
                                <span class="bx bx-phone fa-lg"></span> تغيير الهاتف
                            </div>
                            <div class="col-12 divider" style="min-height: 2px;"></div>
                        </div>
                        <div class="col-12 p-3">
                            <div class="col-12 p-2">
                                <div class="col-12">
                                الهاتف الحالي
                                <span style="color:red;font-size:16px">*</span></div>
                                <div class="col-12 pt-3">
                                    <input type="number" name="old_phone" class="form-control" required="" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="col-12">
                                    الهاتف الجديد
                                <span style="color:red;font-size:16px">*</span></div>
                                <div class="col-12 pt-3">
                                    <input type="number" name="phone" class="form-control " required="">
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    تأكيدالهاتف الجديد
                                <span style="color:red;font-size:16px">*</span></div>
                                <div class="col-12 pt-3">
                                    <input type="number" name="phone_confirmation" class="form-control" required="">
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="col-12 pt-3">
                                    <button class="btn btn-primary"> تغييرالهاتف </button>

                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-lg-6 my-2">
                <form method="POST" action="{{route('profile.update-password')}}">
                     @csrf
                    @method("PUT")
                     <div class="col-12 p-0 main-box shadow">
                        <div class="col-12 px-0">
                            <div class="col-12 px-3 py-3">
                                <span class="bx bx-key fa-lg"></span>  كلمة المرور
                            </div>
                            <div class="col-12 divider" style="min-height: 2px;"></div>
                        </div>
                        <div class="col-12 p-3">
                            <div class="col-12 p-2">
                                <div class="col-12 pt-3">
                                    <div class="alert alert-warning">
                                        يفضل إستخدام كلمة مرور مكونة من أحرف وأرقام وعلامات خاصة مثل ( % $ # @ )
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    كلمة المرور الحالية
                                <span style="color:red;font-size:16px">*</span></div>
                                <div class="col-12 pt-3">
                                    <input type="password" name="old_password" class="form-control" required="" minlength="8" maxlength="190">
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="col-12">
                                    كلمة المرور الجديدة
                                <span style="color:red;font-size:16px">*</span></div>
                                <div class="col-12 pt-3">
                                    <input type="password" name="password" class="form-control" required="" minlength="8" maxlength="190">
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    تأكيد المرور الجديدة
                                <span style="color:red;font-size:16px">*</span></div>
                                <div class="col-12 pt-3">
                                    <input type="password" name="password_confirmation" class="form-control" required="" minlength="8" maxlength="190">
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="col-12 pt-3">
                                    <button class="btn btn-primary">تغيير كلمة المرور</button>

                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>

		</div>
	</div>
</div>



</div>




				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>


@endsection
