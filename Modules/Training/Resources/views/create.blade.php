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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Training
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
                                    id="kt_careers_form" action="{{ route('training.store') }}"
                                    enctype='multipart/form-data'>
                                    <!--begin::Input group-->
                                    @csrf
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Trainer</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->

                                            <select class="form-control form-control-solid" name="trainer_id">
                                                <option value="">Select </option>
                                                @foreach($trainer as $t)
                                                <option value="{{$t->id}}">{{$t->first_name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('trainer_id'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('trainer_id') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Employees</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->

                                            <select class="form-control form-control-solid selectpicker" multiple="multiple" name="user_id[]">
                                                @foreach($staff as $s)
                                                <option value="{{$s->id}}">{{$s->first_name}}</option>
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
                                            <label class="required fs-5 fw-semibold mb-2">Training Type</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->

                                            <select class="form-control form-control-solid" name="type_id">
                                                <option value="">Select </option>
                                                @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('type_id'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('type_id') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Start Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid date" placeholder=""
                                                name="start_date" value="{{ old('start_date') }}" readonly>
                                            @if($errors->has('start_date'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('start_date') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div><!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">End Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid date" placeholder=""
                                                name="end_date" value="{{ old('end_date') }}" readonly>
                                            @if($errors->has('end_date'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('end_date') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Cost</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" class="form-control form-control-solid" placeholder=""
                                                name="cost" value="{{ old('cost') }}" min="0">
                                            @if($errors->has('cost'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('cost') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Description</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="form-control form-control-solid" name="description">{{ old('reason') }}</textarea>
                                                
                                            @if($errors->has('description'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('description') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Status</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->

                                            <select class="form-control form-control-solid" name="status">
                                                <option value="">Select</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                                
                                            </select>
                                            @if($errors->has('type_id'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('type_id') }}</div>
                                            @endif

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
                                <!--end::Form-->

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
