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
الطلبات
@stop

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/تنظيف </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


				<!-- row -->
				<div class="row">
                        <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header pb-0 col-xl-2 col-ms-2">
                                <div class="d-flex justify-content-between">

                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                                        <thead>
                                        <tr>
                                            <th class="border-bottom-0">#</th>
                                            <th class="border-bottom-0">اسم المستخدم</th>
                                            <th class="border-bottom-0"> الهاتف</th>
                                            <th class="border-bottom-0">نوع السياره</th>
                                            <th class="border-bottom-0">العنوان</th>
                                            <th class="border-bottom-0">الحاله</th>
                                            <th class="border-bottom-0">السائق</th>
                                            <th class="border-bottom-0">تتبع</th>
                                            <th class="border-bottom-0">تفاصيل</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                        @foreach($Orders as $x)
                                            <?php $i++?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{App\Models\User::find($x->user_id)->name}}</td>
                                            <td>{{App\Models\User::find($x->user_id)->phone}}</td>
                                            <td>{{$x->car_type}}</td>
                                            <td>{{$x->city}}</td>

                                            @if($x->status == 1)
                                             <td><span class="label text-warning d-flex">
                                                <div class="dot-label bg-warning ml-1"></div>Delivery
                                            </span></td>
                                            @elseif($x->status == 2)
                                             <td><span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>Done
                                            </span></td>
                                            @else
                                            <td><span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>Pending
                                            </span></td>
                                            @endif

                                            @if($x->driver_id)
                                            <td>{{App\Models\User::find($x->driver_id)->name}}</td>
                                            @else
                                            <td><span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>Pending
                                            </span></td>
                                            @endif

                                            @if($x->driver_id)
                                                <td><a href="{{route('adminTraking')}}" class="btn btn-sm btn-danger"><i class="las la-map-marker-alt la-lg"></i></a></td>
                                            @else
                                                <td><span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>Pending
                                            </span></td>
                                            @endif


                                            <td><a class="btn btn-sm btn-info"><i class="las la-eye"></i></a></td>
                                        </tr>
                                       @endforeach
                                        </tbody>
                                    </table>
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
