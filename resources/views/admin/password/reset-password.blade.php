@extends('admin.layouts.master')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ویرایش رمز</h5>
				<!--end::Page Title-->
				<!--begin::Actions-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
				<span class="font-weight-bold mr-4">در این صفحه می توانید رمز مدیر را ویرایش کنید.</span>
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
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body">
                    <form class="form" id="kt_form" method="POST" action="{{route('Password',$manager_id)}}">
                        @csrf
                        <div class="tab-content">
                            <!--begin::Tab-->
                            <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-7 my-2">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <label class="col-3"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">رمز جدید :</h6>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <div class="col-9">
                                                @if ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        <div class="alert alert-danger text-center">{{$error}}</div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">رمز جدید :</label>
                                            <div class="col-9">
                                                <input name="password" class="form-control form-control-lg form-control-solid" type="password" placeholder="رمز جدید را وارد کنید." />
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">تکرار رمز :</label>
                                            <div class="col-9">
                                                <input name="password_confirmation" class="form-control form-control-lg form-control-solid" type="password" placeholder="تکرار رمز را وارد کنید." />
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left"></label>
                                            <div class="col-9">
                                                <button type="reset" class="btn btn-clean font-weight-bold">پاک کردن</button>
                                                <button type="submit" class="btn btn-light-primary font-weight-bold">ثبت</button>
                                            </div>
                                        </div>
                                        <!--end::Group-->
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab-->
                        </div>
                    </form>
                </div>
            </div>
            
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection