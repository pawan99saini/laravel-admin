@extends('layout.master-layout')
@section('content')

<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Default</h1>
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
											<li class="breadcrumb-item text-muted">Dashboards</li>
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
								<div id="kt_app_content_container" class="app-container container-fluid">
								<div class="row g-5 g-xl-10">
									<div class="col-xl-4">
										<!--begin::List Widget 20-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-borderless mb-0">
														<tbody>
															<!--begin::Item-->
															@foreach($menus as $menu)

															<tr>
																<!--begin::Icon-->
																<td class="align-middle w-50px pl-0 pr-2 pb-6">
																	<!--begin::Symbol-->
																	<div class="symbol symbol-50 symbol-light-success">
																		<div class="symbol-label" style="background-image: url({{asset('storage/uploads/'.$menu->icon)}})"></div>
																	</div>
																	<!--end::Symbol-->
																</td>
																<!--end::Icon-->
																<!--begin::Content-->
																<td class="align-middle pb-6">
																	<div class="font-size-lg font-weight-bolder text-dark-75 mb-1">{{$menu->title}}</div>
																	<a href="{{$menu->link}}" class="btn btn-info btn-sm" target="{{$menu->link_open_in}}">View</a>
																</td>
																
																
																<!--end::Content-->
															</tr>
															@endforeach

															<!--end::Item-->
															<!--begin::Item-->
															
															<!--end::Item-->
															<!--begin::Item-->
															
															<!--end::Item-->
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 20-->
									</div>
									</div>
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						
					</div>
					<!--end:::Main-->
                    @endsection