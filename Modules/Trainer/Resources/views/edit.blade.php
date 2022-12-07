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
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Permission</h1>
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
													<form class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" id="kt_careers_form" action="{{route('trainer.update',$trainer->id)}}">
														<!--begin::Input group-->
                                                        @csrf
                                                        @method('put')
														<div class="row mb-5">
															<!--begin::Col-->
															<div class="col-md-6 fv-row fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="required fs-5 fw-semibold mb-2">First Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" value="{{$trainer->first_name}}" placeholder="" name="first_name">
                                                                @if($errors->has('first_name'))
                                                                <div class="text-danger fs-7 fw-bold">{{ $errors->first('first_name') }}</div>
                                                            @endif

																<!--end::Input-->
															<div class="fv-plugins-message-container invalid-feedback"></div></div>
															<!--end::Col-->
															<!--begin::Col-->
															<div class="col-md-6 fv-row fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="required fs-5 fw-semibold mb-2">Last Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" placeholder="" name="last_name" value="{{$trainer->last_name}}">
                                                                @if($errors->has('last_name'))
                                                                <div class="text-danger fs-7 fw-bold">{{ $errors->first('last_name') }}</div>
                                                            @endif

																<!--end::Input-->
															<div class="fv-plugins-message-container invalid-feedback"></div></div>
															<!--end::Col-->
															
															<!--begin::Col-->
															<div class="col-md-6 fv-row fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="required fs-5 fw-semibold mb-2">Role</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" value="{{$trainer->role}}" placeholder="" name="role">
                                                                @if($errors->has('role'))
                                                                <div class="text-danger fs-7 fw-bold">{{ $errors->first('role') }}</div>
                                                            @endif

																<!--end::Input-->
															<div class="fv-plugins-message-container invalid-feedback"></div></div>	<!--begin::Col-->
															<div class="col-md-6 fv-row fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="required fs-5 fw-semibold mb-2">Email</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" class="form-control form-control-solid" value="{{$trainer->email}}" placeholder="" name="email">
                                                                @if($errors->has('email'))
                                                                <div class="text-danger fs-7 fw-bold">{{ $errors->first('email') }}</div>
                                                            @endif

																<!--end::Input-->
															<div class="fv-plugins-message-container invalid-feedback"></div></div>	<!--begin::Col-->
															<div class="col-md-6 fv-row fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="required fs-5 fw-semibold mb-2">Phone</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" value="{{$trainer->phone}}" placeholder="" name="phone">
                                                                @if($errors->has('phone'))
                                                                <div class="text-danger fs-7 fw-bold">{{ $errors->first('phone') }}</div>
                                                            @endif

																<!--end::Input-->
															<div class="fv-plugins-message-container invalid-feedback"></div></div>	
															
															<div class="col-md-6 fv-row fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="required fs-5 fw-semibold mb-2">Status</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select class="form-control form-control-solid" name="status">
																<option value=""> Select</option>
																<option value="1" {{$trainer->status==1 ? 'selected' : ''}}>Active</option>
																<option value="2" {{$trainer->status==2 ? 'selected' : ''}}>Inactive</option>
																</select>
                                                                @if($errors->has('status'))
                                                                <div class="text-danger fs-7 fw-bold">{{ $errors->first('status') }}</div>
                                                            @endif

																<!--end::Input-->
															<div class="fv-plugins-message-container invalid-feedback"></div></div>	
															<div class="col-md-12 fv-row fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="required fs-5 fw-semibold mb-2">Description</label>
																<!--end::Label-->
																<!--begin::Input-->
																<textarea class="form-control form-control-solid" name="description">{{$trainer->description}}</textarea>
                                                                @if($errors->has('description'))
                                                                <div class="text-danger fs-7 fw-bold">{{ $errors->first('description') }}</div>
                                                            @endif

																<!--end::Input-->
															<div class="fv-plugins-message-container invalid-feedback"></div></div>
															<!--end::Col-->
														</div>
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
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
