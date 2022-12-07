@extends('layout.master-layout')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Holiday
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <!--end::Item-->
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-17">

                        <!--begin::Layout-->
                        <div class="d-flex flex-column flex-lg-row mb-17">
                            <!--begin::Content-->
                            <div class="flex-lg-row-fluid me-0 me-lg-20">
                                <!--begin::Form-->
                                <form class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                                    id="kt_careers_form" action="{{ route('schedule.update',$schedule->id) }}"
                                    enctype='multipart/form-data'>
                                    <!--begin::Input group-->
                                    @csrf
                                    @method('put')
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                      
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Department</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="department_id" class="form-control form-control-solid">
                                            <option></option>
                                            @foreach($departments as $key=>$department)
                                            <option value="{{$key}}" {{$key==$schedule->department_id ? 'selected' : ''}}>{{$department}}</option>
                                            @endforeach
                                            </select>
                                            @if($errors->has('department_id'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('department_id') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Employee Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="user_id" class="form-control form-control-solid">
                                            <option></option>
                                            @foreach($users as $key=>$user)
                                            <option value="{{$key}}" {{$key==$schedule->user_id ? 'selected' : ''}}>{{$user}}</option>
                                            @endforeach
                                            </select>
                                            @if($errors->has('user_id'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('user_id') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Shift Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="shift_id" class="form-control form-control-solid">
                                            <option></option>
                                            @foreach($shifts as $key=>$shift)
                                            <option value="{{$key}}" {{$key==$schedule->shift_id ? 'selected' : ''}}>{{$shift}}</option>
                                            @endforeach
                                            </select>
                                            @if($errors->has('shift_id'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('shift_id') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid date" placeholder=""
                                                name="created" value="{{$schedule->created}}">
                                            @if($errors->has('created'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('created') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Min Start Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" placeholder=""
                                                name="min_start_time" value="{{$schedule->min_start_time}}">
                                            @if($errors->has('min_start_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('min_start_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Start Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" placeholder=""
                                                name="start_time" value="{{$schedule->start_time}}">
                                            @if($errors->has('start_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('start_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Max Start Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" placeholder=""
                                                name="max_start_time" value="{{$schedule->max_start_time}}">
                                            @if($errors->has('max_start_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('max_start_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Min End Time </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" placeholder=""
                                                name="min_end_time" value="{{$schedule->min_end_time}}">
                                            @if($errors->has('min_end_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('min_end_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">End Time </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" placeholder=""
                                                name="end_time" value="{{$schedule->end_time}}">
                                            @if($errors->has('end_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('end_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Max End Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" placeholder=""
                                                name="max_end_time" value="{{$schedule->max_end_time}}">
                                            @if($errors->has('max_end_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('max_end_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Break Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" placeholder=""
                                                name="break_time" value="{{$schedule->min_end_time}}">
                                            @if($errors->has('break_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('break_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class=" fs-5 fw-semibold mb-2">Extra hours</label>

                                            <label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input" name="extra_hours" type="checkbox" value="1" id="kt_modal_add_customer_billing" {{$schedule->extra_hours==1 ? 'checked' : ''}}>
																			<!--end::Input-->
																			<!--begin::Label-->
																			<span class="form-check-label fw-semibold text-muted" for="kt_modal_add_customer_billing">Yes</span>
																			<!--end::Label-->
																		</label>
                                        <!--end::Col-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class=" fs-5 fw-semibold mb-2">Publish</label>

                                            <label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input" name="publish" type="checkbox" value="1" id="kt_modal_add_customer_billing" {{$schedule->publish==1 ? 'checked' : ''}}>
																			<!--end::Input-->
																			<!--begin::Label-->
																			<span class="form-check-label fw-semibold text-muted" for="kt_modal_add_customer_billing">Yes</span>
																			<!--end::Label-->
																		</label>
                                        <!--end::Col-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Separator-->
                                    <div class="separator mb-8"></div>
                                    <!--end::Separator-->
                                    <!--begin::Submit-->
                                    <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Submit</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </button>
                                    <!--end::Submit-->
                                </form>
                               
                            </div>
                            <!--end::Content-->

                        </div>
                        <!--end::Layout-->

                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->


</div>
@endsection
