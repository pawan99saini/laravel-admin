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
                        Users
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
                                    id="kt_careers_form" action="{{ route('users.store') }}"
                                    enctype='multipart/form-data'>
                                    <!--begin::Input group-->
                                    @csrf
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="first_name" value="{{ old('first_name') }}">
                                            @if($errors->has('first_name'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('first_name') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="email" value="{{ old('email') }}">
                                            @if($errors->has('email'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('email') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Password</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="password" class="form-control form-control-solid"
                                                placeholder="" name="password">
                                            @if($errors->has('password'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('password') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Confirm Password</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="password" class="form-control form-control-solid"
                                                placeholder="" name="confirm-password">
                                            @if($errors->has('confirm-password'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('confirm-password') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Role</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->

                                            <select class="form-control form-control-solid" name="roles[]">
                                                <option value="">Select Role</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role }}">{{ $role }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('roles'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('roles') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Phone</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="phone" value="{{ old('phone') }}">


                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <label class="required fs-5 fw-semibold mb-2">Gender</label>

                                            <label class="flex-stack mb-5 cursor-pointer">

                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                
                                                <span class="form-check form-check-custom form-check-solid">
                                                Male  <input class="form-check-input" type="radio" name="gender"
                                                        value="male">
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <label class="flex-stack mb-5 cursor-pointer">
                                                
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                Female <input class="form-check-input" type="radio" name="gender"
                                                        value="female">
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Start date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" class="form-control form-control-solid date" readonly placeholder="Start date"
                                                name="start_date" value="{{ old('start_date') }}">


                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">End date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="date" class="form-control form-control-solid date" readonly splaceholder="End date"
                                                name="end_date" value="{{ old('end_date') }}">


                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                      
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Country</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="country" value="{{ old('country') }}">


                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Department</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->

                                            <select class="form-control form-control-solid" name="department">
                                                <option value="">Select Department</option>
                                                @foreach($departments as $k=>$department)
                                                    <option value="{{ $k }}">{{ $department }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('department'))
                                                <div class="text-danger fs-7 fw-bold">
                                                    {{ $errors->first('department') }}</div>
                                            @endif

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Position</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="position" value="{{ old('position') }}">


                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                       
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                                            <!--end::Label-->
                                            <!--begin::Image placeholder-->
                                            <style>
                                                .image-input-placeholder {
                                                    background-image: url('assets/media/svg/files/blank-image.svg');
                                                }

                                                [data-theme="dark"] .image-input-placeholder {
                                                    background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                                }
                                            </style>
                                            <!--end::Image placeholder-->
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline image-input-placeholder image-input-empty"
                                                data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: none;"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    aria-label="Change avatar" data-kt-initialized="1">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="avatar_remove" value="1">
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    aria-label="Cancel avatar" data-kt-initialized="1">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    aria-label="Remove avatar" data-kt-initialized="1">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <div id="kt_repeater_1">
												<div class="form-group row">
                                                <label class="required fs-5 fw-semibold mb-2">Address</label>

													<div data-repeater-list="address" class="col-lg-10">
														<div data-repeater-item="" class="form-group row align-items-center">
															<textarea class="form-control form-control-solid" placeholder="" name="address" value=""></textarea>
															
															<div class="col-md-4 m-5">
																<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
																<i class="la la-trash-o"></i>Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label text-right"></label>
													<div class="col-lg-4">
														<a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
														<i class="la la-plus"></i>Add</a>
													</div>
												</div>
											</div>
                                            <div id="kt_repeater_2">
												<div class="form-group row">
                                                <label class="required fs-5 fw-semibold mb-2">Contact Details</label>

													<div data-repeater-list="contact_details" class="col-lg-10">
														<div data-repeater-item="" class="form-group row align-items-center">
															<input type="text" class="form-control form-control-solid" placeholder="" name="contact_detail" value="">
															
															<div class="col-md-4 m-5">
																<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
																<i class="la la-trash-o"></i>Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label text-right"></label>
													<div class="col-lg-4">
														<a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
														<i class="la la-plus"></i>Add</a>
													</div>
												</div>
											</div>
                                            <div id="kt_repeater_3">
												<div class="form-group row">
                                                <label class="required fs-5 fw-semibold mb-2">Qualification</label>

													<div data-repeater-list="qualifications" class="col-lg-10">
														<div data-repeater-item="" class="form-group row align-items-center">
                                                            <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-solid mb-3" placeholder="Qualification" name="qualification" value="">
															<input type="date" class="form-control form-control-solid mb-3 date" placeholder="Start date" readonly name="start_date" value="">
															<input type="date" class="form-control form-control-solid mb-3 date" placeholder="End date" readonly name="end_date" value="">
															
                                                            </div>
															
															<div class="col-md-4 m-5">
																<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
																<i class="la la-trash-o"></i>Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label text-right"></label>
													<div class="col-lg-4">
														<a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
														<i class="la la-plus"></i>Add</a>
													</div>
												</div>
											</div><div id="kt_repeater_4">
												<div class="form-group row">
                                                <label class="required fs-5 fw-semibold mb-2">Skills</label>

													<div data-repeater-list="skills" class="col-lg-10">
														<div data-repeater-item="" class="form-group row align-items-center">
                                                            <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-solid mb-3" placeholder="Skill" name="skill" value="">
															
                                                            </div>
															
															<div class="col-md-4 m-5">
																<a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
																<i class="la la-trash-o"></i>Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label text-right"></label>
													<div class="col-lg-4">
														<a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
														<i class="la la-plus"></i>Add</a>
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
    
</script>
@endsection
