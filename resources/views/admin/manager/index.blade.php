@extends('admin.layouts.master')

@section('content')
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Subheader-->
		<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
			<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Info-->
				<div class="d-flex align-items-center flex-wrap mr-2">
					<!--begin::Page Title-->
					<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">لیست مدیران</h5>
					<!--end::Page Title-->
					<!--begin::Actions-->
					<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
					<span class="font-weight-bold mr-4">در این صفحه لیست مدیران را مشاهده میکنید.</span>
					<!--end::Actions-->
				</div>
				<!--end::Info-->
				<!--begin::Toolbar-->
				<div class="d-flex align-items-center">
					<!--begin::Daterange-->
						<span class="text-muted font-size-base font-weight-bold mr-2">تاریخ:</span>
						<span class="text-primary font-size-base font-weight-bolder"><?php echo verta()->format('Y/m/d');?></span>
					<!--end::Daterange-->
				</div>
				<!--end::Toolbar-->
			</div>
		</div>
		<!--end::Subheader-->
		<!--begin::Entry-->
		<!--begin::Container-->
		<div class="card card-custom">
			<div class="card-header">
				<div class="card-title">
					<span class="card-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
						</svg>
					</span>
					<h3 class="card-label font-weight">لیست مدیران</h3>
				</div>
			</div>
			<div class="card-body">
				<!--begin: Datatable-->
				<table class="table table-bordered table-hover table-checkable" id="datatable" style="margin-top: 13px !important">
					<thead>
						<tr>
							<th>#</th>
							<th>نام</th>
                            <th>نام خانوادگی</th>
							<th>ایمیل</th>
                            <th>موبایل</th>
							<th>سمت</th>
							<th>وضعیت</th>
							<th>آخرین ورود</th>
							<th>تغییر رمز</th>
						</tr>
					</thead>
					<tbody>
						@if ($managers)
							@foreach ($managers as $manager)
								<tr>
									<td>{{++$loop->index}}</td>
									<td>{{$manager->first_name}}</td>
                                    <td>{{$manager->last_name}}</td>
                                    <td>{{$manager->email}}</td>
                                    <td>{{$manager->mobile}}</td>
									<td>
										<span id="div2{{$manager->id}}">
											@switch($manager->level)
													@case('manager')
														<button class="badge bg-light-success text-dark w-50 btn" onclick="ChangeLevelManager('{{$manager->id}}')"><span id="1{{$manager->id}}">{{FetchLevel($manager->level)}}</span></button>
														@break
													@case('operator')
														<button class="badge bg-light-warning text-dark w-60 btn" onclick="ChangeLevelManager('{{$manager->id}}')"><span id="1{{$manager->id}}">{{FetchLevel($manager->level)}}</span></button>
														@break    
													@default
											@endswitch
										</span>
									</td>
									<td>
										<span id="div{{$manager->id}}">
											@switch($manager->status)
												@case('active')
													<button class="badge bg-light-success text-dark w-50 btn" onclick="ChangeStatusManager('{{$manager->id}}')"><span id="{{$manager->id}}">{{FetchStatus($manager->status)}}</span></button>
													@break
												@case('inactive')
													<button class="badge bg-light-warning text-dark w-50 btn" onclick="ChangeStatusManager('{{$manager->id}}')"><span id="{{$manager->id}}">{{FetchStatus($manager->status)}}</span></button>
													@break
                                                @case('banned')
                                                    <button class="badge bg-light-danger text-dark w-50 btn" onclick="ChangeStatusManager('{{$manager->id}}')"><span id="{{$manager->id}}">{{FetchStatus($manager->status)}}</span></button>
                                                    @break    
												@default
											@endswitch
										</span>
									</td>
									<td>
										@if (!empty($manager->last_login_at))
											<?php echo verta($manager->last_login_at)->format('H:i:s Y/m/d');?>
										@else
											هنوز وارد نشده است.
                                    	@endif
									</td>
									<td>
										<a href="{{route('reset-password',$manager->id)}}" class="btn-sm btn-primary btn mx-1" data-toggle="tooltip" data-placement="bottom" title="ویرایش رمز">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
												<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
											</svg>
										</a>
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
				<!--end: Datatable-->
			</div>
		</div>
		<!--end::Container-->
	</div>
    <!--end::Entry-->
@endsection
