@extends('layouts.master')
@section('css')
<script src="https://cdn.jsdelivr.net/npm/apexcharts" on:load={initCharts}></script>

<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

@endsection
@section('title-page-header')
الصفحه الرئيسيه
@endsection
@section('page-header')
الاحصائيات
@endsection

@section('content')


<?php $userL = \App\Models\User_year::where('user_id',Auth::user()->id)->count(); ?>
    @if ($userL>0)
        <?php
        $userY = \App\Models\User_year::where('user_id',Auth::user()->id)->first();
        $uY = $userY->year;
        ?>
    @else
        <?php $uY = null; ?>
    @endif<?php $userL = \App\Models\User_year::where('user_id',Auth::user()->id)->count(); ?>
    @if ($userL>0)
        <?php
        $userY = \App\Models\User_year::where('user_id',Auth::user()->id)->first();
        $uY = $userY->year;
        ?>
    @else
        <?php $uY = null; ?>
    @endif
{{-- @php
 $hours = now()->diffInMinutes(\Carbon\Carbon::parse(\App\Models\Reminder_task::first()->created_at));
echo $hours;
@endphp --}}
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h4 class="mb-3 text-white">الطلاب</h4>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h3 class="font-weight-bold mb-1 text-white">{{ \App\Models\Student::where("isdelete",0)->count() }}</h3>

										</div>

									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h4 class="mb-3 text-white">المعلمين</h4>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h3 class="font-weight-bold mb-1 text-white">{{ \App\Models\Teacher::where("isdelete",0)->count() }}</h3>

										</div>

									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h4 class="mb-3 text-white">الموظفين</h4>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h3 class=" font-weight-bold mb-1 text-white">{{ \App\Models\Employee::where("isdelete",0)->count() }}</h3>

										</div>

									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h4 class="mb-3 text-white">الدورات</h4>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h3 class="font-weight-bold mb-1 text-white">{{ \App\Models\Course::where("isdelete",0)->count() }}</h3>

										</div>

									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
				</div>
				<!-- row closed -->

				<!-- row opened -->
					<div class="row row-sm">
					<div class="col">
						<div class="card">
							<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mb-0">احصائيات الوضع المالي</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>

							</div>
							<div class="card-body">
								<div class="total-revenue">
									<div>

									  <label><span class="bg-primary"></span>الصندوق الرئيسي</label>
									</div>
									<div>

									  <label><span class="bg-danger"></span>صندوق المركز</label>
									</div>
									<div>
									  <label><span class="bg-warning"></span>صندوق الدورت</label>
									</div>
                                    <div>
									  <label><span class="bg-success"></span>صندوق الرواتب</label>
									</div>
								  </div>
								<div id="bar" class="sales-bar mt-4"></div>
							</div>
						</div>
					</div>

				</div>
				<!-- row closed -->

				<!-- row opened -->
				<div class="row row-sm">
					<div class="col">
						<div class="card">
					<div style="width:100%;">
                        {!! $chartjs->render() !!}
                    </div>
						</div>
					</div>
{{--
					<div class="col-xl-4 col-md-12 col-lg-6">
						<div class="card">
							<div class="card-header pb-0">
								<h3 class="card-title mb-2">Recent Orders</h3>
								<p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>
							</div>
							<div class="card-body sales-info ot-0 pt-0 pb-0">
								<div id="chart" class="ht-150"></div>
								<div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
									<div class="col-md-6 col">
										<p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>
										<h3 class="mb-1">5238</h3>
										<div class="d-flex">
											<p class="text-muted ">Last 6 months</p>
										</div>
									</div>
									<div class="col-md-6 col">
										<p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>
											<h3 class="mb-1">3467</h3>
										<div class="d-flex">
											<p class="text-muted">Last 6 months</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card ">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="d-flex align-items-center pb-2">
											<p class="mb-0">Total Sales</p>
										</div>
										<h4 class="font-weight-bold mb-2">$7,590</h4>
										<div class="progress progress-style progress-sm">
											<div class="progress-bar bg-primary-gradient wd-80p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
										</div>
									</div>
									<div class="col-md-6 mt-4 mt-md-0">
										<div class="d-flex align-items-center pb-2">
											<p class="mb-0">Active Users</p>
										</div>
										<h4 class="font-weight-bold mb-2">$5,460</h4>
										<div class="progress progress-style progress-sm">
											<div class="progress-bar bg-danger-gradient wd-75" role="progressbar"  aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
				<!-- row close -->

				<!-- row opened -->
				<div class="row row-sm row-deck">
					<div class="col-md-12 col-lg-4 col-xl-4">
						<div class="card card-dashboard-eight pb-2">
							<h6 class="card-title">Your Top Countries</h6><span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span>
							<div class="list-group">
								<div class="list-group-item border-top-0">
									<i class="flag-icon flag-icon-us flag-icon-squared"></i>
									<p>United States</p><span>$1,671.10</span>
								</div>
								<div class="list-group-item">
									<i class="flag-icon flag-icon-nl flag-icon-squared"></i>
									<p>Netherlands</p><span>$1,064.75</span>
								</div>
								<div class="list-group-item">
									<i class="flag-icon flag-icon-gb flag-icon-squared"></i>
									<p>United Kingdom</p><span>$1,055.98</span>
								</div>
								<div class="list-group-item">
									<i class="flag-icon flag-icon-ca flag-icon-squared"></i>
									<p>Canada</p><span>$1,045.49</span>
								</div>
								<div class="list-group-item">
									<i class="flag-icon flag-icon-in flag-icon-squared"></i>
									<p>India</p><span>$1,930.12</span>
								</div>
								<div class="list-group-item border-bottom-0 mb-0">
									<i class="flag-icon flag-icon-au flag-icon-squared"></i>
									<p>Australia</p><span>$1,042.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-8 col-xl-8">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">احصائيات المستودعات</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>

							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">اسم المستودع</th>
											<th class="wd-lg-25p tx-right">عدد الاقسام</th>
											<th class="wd-lg-25p tx-right">عدد المنتجات</th>
                                            <th class="wd-lg-25p tx-right">قيمه القبض</th>
                                            <th class="wd-lg-25p tx-right">قيمه الصرف</th>
										</tr>
									</thead>
									<tbody>
{{--
                                            $repos = \App\Models\Repository::leftJoin('repositories_year as rp', 'rp.repository_id','=','repositories.id')->where('isdelete',0)->where('rp.m_year','=',$userL>0?$uY:$moneyWork->year)->get(); --}}
                                    @php
                                          $repos = \App\Models\Repository::where('isdelete',0)->get();

                                    @endphp
                                    @foreach ( $repos as $repo )
                                    	<tr>
											<td class="tx-right tx-medium tx-danger">{{$repo->name}}</td>
											<td class="tx-right tx-medium tx-inverse">{{\App\Models\Rep_section::where('repository_id',$repo->id)->where('isdelete',0)->count() }}</td>
											<td class="tx-right tx-medium tx-inverse">{{\App\Models\Material::where('repository_id',$repo->id)->where('isdelete',0)->count() }}</td>
                                       <td class="tx-right tx-medium tx-inverse">{{\App\Models\Repository_year::where('repository_id',$repo->id)->where('m_year','=',$userL>0?$uY:$moneyWork->year)->first()->repository_in }}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{\App\Models\Repository_year::where('repository_id',$repo->id)->where('m_year','=',$userL>0?$uY:$moneyWork->year)->first()->repository_out }}</td>
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
				<!-- /row -->
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')


{{--

<script>

/* Apexcharts (#bar) */
	var optionsBar = {
	  chart: {
		height: 300,
		type: 'bar',
		toolbar: {
		   show: true,
		},
		fontFamily: 'Nunito, sans-serif',
		// dropShadow: {
		//   enabled: true,
		//   top: 1,
		//   left: 1,
		//   blur: 2,
		//   opacity: 0.2,
		// }
	  },
	 colors: ["#036fe7", '#f93a5a', '#f7a556','#319353'],
	 plotOptions: {
				bar: {
				  dataLabels: {
					enabled: false
				  },
				  columnWidth: '42%',
				  endingShape: 'rounded',
				}
			},
	  dataLabels: {
		  enabled: false
	  },
	  stroke: {
		  show: true,
		  width: 2,
		  endingShape: 'rounded',
		  colors: ['transparent'],
	  },
	  responsive: [{
		  breakpoint: 576,
		  options: {
			   stroke: {
			  show: true,
			  width: 1,
			  endingShape: 'rounded',
			  colors: ['transparent'],
			},
		  },


	  }],

      series: [{
        name: 'Speed',
        data: [7, 8, 5, 5, 7, 3, 6]
    },{
        name: 'Turnover',
        data: [4, 3, 10, 9, 4, 5, 5]
    },{
        name: 'Turnover',
        data: [4, 3, 10, 9, 4, 5, 5]
    },
     {
        name: 'In',
        data: [2, 3, 4, 7, 3, 6, 2]
    }],
    xaxis: {
        categories: ['day1', 'day2', 'day3', 'day4', 'day5', 'day6', 'day7'],
    },

	  fill: {
		  opacity: 1
	  },
	  legend: {
		show: false,
		floating: true,
		position: 'top',
		horizontalAlign: 'left',
		// offsetY: -36

	  },
	  // title: {
	  //   text: 'Financial Information',
	  //   align: 'left',
	  // },
	  tooltip: {
		  y: {
			  formatter: function (val) {
				  return "$ " + val + " thousands"
			  }
		  }
	  }
	}




   var url = '/CMS/datatables/QueryMoney';
 $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        async: true,
        cache: false,

        success: function (response) {
         	 var chartq = new ApexCharts(document.querySelector('#bar'), optionsBar);
     chartq.render();

chartq.updateOptions({
 series: [{
        name: 'Speed',
       data: [response.data[0].day1, response.data[0].day15, response.data[0].day7,response.data[0].day30, response.data[0].day60, response.data[0].day90, response.data[0].day180]
    },{
        name: 'Turnover',
        data: [response.data[1].day1, response.data[1].day15, response.data[1].day7,response.data[1].day30, response.data[1].day60, response.data[1].day90, response.data[1].day180]
    },{
        name: 'Turnover',
        data: [response.data[2].day1, response.data[2].day15, response.data[2].day7,response.data[2].day30, response.data[2].day60, response.data[2].day90, response.data[2].day180]
    },
     {
        name: 'In',
        data: [response.data[3].day1, response.data[3].day15, response.data[3].day7,response.data[3].day30, response.data[3].day60, response.data[3].day90, response.data[3].day180]
    }],
    xaxis: {
        categories: ['day1', 'day2', 'day3', 'day4', 'day5', 'day6', 'day7'],
    },
});
        }
    });
	/* Apexcharts (#bar) closed */


</script> --}}
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>

<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>

@endsection
