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
                                    id="kt_careers_form" action="{{ route('shift.update',$shift->id) }}"
                                    enctype='multipart/form-data'>
                                    <!--begin::Input group-->
                                    @csrf
                                    @method('put')
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                      
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Shift Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" placeholder=""
                                                name="shift_name" value="{{ $shift->shift_name }}">
                                            @if($errors->has('shift_name'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('shift_name') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Min Start Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" readonly 
                                                name="min_start_time" value="{{ $shift->min_start_time }}">
                                            @if($errors->has('start_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('min_start_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2 time">Start Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" readonly
                                                name="start_time" value="{{ $shift->max_start_time }}">
                                            @if($errors->has('max_start_time'))
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
                                            <input type="text" class="form-control form-control-solid time" readonly
                                                name="max_start_time" value="{{ $shift->max_start_time }}">
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
                                            <input type="text" class="form-control form-control-solid time" readonly
                                                name="min_end_time" value="{{ $shift->min_end_time }}">
                                            @if($errors->has('min_end_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('min_end_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div><div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">End Time</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid time" readonly placeholder="End Time"
                                                name="end_time" value="{{ $shift->end_time }}">
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
                                            <input type="text" class="form-control form-control-solid time" readonly 
                                                name="max_end_time" value="{{ $shift->max_end_time }}">
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
                                            <input type="text" class="form-control form-control-solid time" readonly
                                                name="break_time" value="{{ $shift->break_time }}">
                                            @if($errors->has('break_time'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('break_time') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class=" fs-5 fw-semibold mb-2">Recurring Shift</label>

                                            <label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input" name="recurring_shift" type="checkbox" value="1" id="kt_modal_add_customer_billing" {{ $shift->recurring_shift ==1 ? 'checked' : ''}}>
																			<!--end::Input-->
																			<!--begin::Label-->
																			<span class="form-check-label fw-semibold text-muted" for="kt_modal_add_customer_billing">Yes</span>
																			<!--end::Label-->
																		</label>
                                        <!--end::Col-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Repeat Every </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" class="form-control form-control-solid"
                                                name="repeat" value="{{ $shift->repeat }}" min="1">
                                            @if($errors->has('repeat'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('repeat') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2"> Week(s)</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            @php 
                                            $weeks = ['M','T','W','TH','F','S','SN'];
                                            @endphp
                                            @for($i=0;$i<count($weeks);$i++)
                                            <input class="form-check-input" name="week[]" type="checkbox" value="{{$weeks[$i]}}" >
                                           {{$weeks[$i]}}
                                            @endfor
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">End Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid date" readonly placeholder="End Date"
                                                name="end_date" value="{{ $shift->end_date }}" min="1">
                                            @if($errors->has('end_date'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('end_date') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class=" fs-5 fw-semibold mb-2">Indefinite</label>

                                            <label class="form-check form-switch form-check-custom form-check-solid">
																			<!--begin::Input-->
																			<input class="form-check-input" name="Indefinite" type="checkbox" value="1" {{ $shift->indefinite ==1 ? 'checked' : ''}}>
																			<!--end::Input-->
																			<!--begin::Label-->
																			<span class="form-check-label fw-semibold text-muted" for="kt_modal_add_customer_billing">Yes</span>
																			<!--end::Label-->
																		</label>
                                        <!--end::Col-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Add Tag</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="form-control form-control-solid"
                                                name="tag" >{{ $shift->tag }}</textarea>
                                           
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Note</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="form-control form-control-solid"
                                                name="note" >{{ $shift->note }}</textarea>
                                           
                                            <!--end::Input-->
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
