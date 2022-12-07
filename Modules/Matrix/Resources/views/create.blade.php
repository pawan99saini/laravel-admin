@extends('layout.master-layout')

@section('content')
<script src="{{ asset('demo1/js/jquery.czMore-latest.js') }}"></script>

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
                    Matrix
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
                                    id="kt_careers_form" action="{{ route('matrix.store') }}"
                                    enctype='multipart/form-data'>
                                    <!--begin::Input group-->
                                    @csrf
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    Staff Summary
</h1>
<div class="separator mb-8"></div>

                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                     
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Staff Member Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="staff_name" value="{{$staff->first_name}}" disabled>
                                         
                                                
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Position</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="position" value="{{$staff->position}}" disabled>
                                            @if($errors->has('position'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('position') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                          <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid date" placeholder=""
                                                name="date" value="{{ old('date') }}" readonly>
                                            @if($errors->has('date'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('date') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="separator mb-8"></div>

                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    Qualification
</h1>
                                    
                                @if($staff->qualification)
                                @php 
                                $i=1;
                                @endphp
                                @foreach($staff->qualification as $qualification)
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Qualification</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="qualification[{{$i}}][name]" value="{{$qualification->qualification }}" readonly>
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Start Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="qualification[{{$i}}][start_date]" value="{{$qualification->start_date }}" readonly>
                                            

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                          <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">End Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="qualification[{{$i}}][end_date]" value="{{$qualification->end_date }}" readonly>
                                            

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        
                                    </div>
                                    @php 
                                    $i++;
                                    @endphp
                                    @endforeach
                                    @endif
                                    <div class="separator mb-8"></div>

                                    <div id="czContainer">
            <div id="first">
                <div class="recordset">
                    <div class="fieldRow clearfix row">
                        <div class="col-md-3">
                            <div id="div_id_stock_1_service" class="form-group">
                                <label for="id_stock_1_product" class="control-label  requiredField">
                                    Title<span class="asteriskField">*</span>
                                </label><div class="controls ">
                                            <input type="text" name="course[1][title]" id="id_stock_1_product" class="textinput form-control" />
                                </div>
                            </div>
                        </div><div class="col-md-3">
                            <div id="div_id_stock_1_unit" class="form-group">
                                <label for="id_stock_1_unit" class="control-label  requiredField">
                                    Skill 1<span class="asteriskField">*</span>
                                </label><div class="controls "><textarea class="select form-control" id="id_stock_1_unit" name="course[1][skill_1]"></textarea></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="div_id_stock_1_quantity" class="form-group">
                                <label for="id_stock_1_quantity" class="control-label  requiredField">
                                    Skill 2<span class="asteriskField">*</span>
                                </label><div class="controls "><textarea class="select form-control" id="id_stock_1_quantity" name="course[1][skill_2]"></textarea></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="div_id_stock_1_skill" class="form-group">
                                <label for="div_id_stock_1_skill" class="control-label  requiredField">
                                    Skill 3<span class="asteriskField">*</span>
                                </label><div class="controls "><textarea class="select form-control" id="div_id_stock_1_skill" name="course[1][skill_3]"></textarea></div>
                            </div>
                        </div>
                    </div>
                </div>
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
<script>
    	$("#czContainer").czMore();

</script>
@endsection
