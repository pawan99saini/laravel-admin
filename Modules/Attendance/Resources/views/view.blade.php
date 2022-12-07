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
								<div class="row">
                                <div class="col-lg-4">
										<!--begin::Mixed Widget 14-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title font-weight-bolder">Attendance Info</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
																		<span class="navi-text">New Group</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
																		<span class="navi-text">Contacts</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Groups</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-primary label-inline font-weight-bold">new</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Calls</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-gear"></i>
																		</span>
																		<span class="navi-text">Settings</span>
																	</a>
																</li>
																<li class="navi-separator my-3"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-magnifier-tool"></i>
																		</span>
																		<span class="navi-text">Help</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Privacy</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
                                            <a href="#" class="btn btn-info font-weight-bolder font-size-sm mr-3">Punch In at <br>{{ \Carbon\Carbon::parse($data->time_in)->format('F j, Y, g:i a') }}
</a>
<a href="#" class="btn btn-info font-weight-bolder font-size-sm mt-5 mr-3">Punch out at <br>{{ \Carbon\Carbon::parse($data->time_out)->format('F j, Y, g:i a') }}
</a>
												<div class="flex-grow-1" style="position: relative;">
													<div id="kt_mixed_widget_14_chart" style="height: 200px; min-height: 178.7px;"><div id="apexchartsvclv4bvk" class="apexcharts-canvas apexchartsvclv4bvk apexcharts-theme-light" style="width: 355px; height: 178.7px;"><svg id="SvgjsSvg1517" width="355" height="178.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1519" class="apexcharts-inner apexcharts-graphical" transform="translate(90.5, 0)"><defs id="SvgjsDefs1518"><clipPath id="gridRectMaskvclv4bvk"><rect id="SvgjsRect1521" width="182" height="200" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskvclv4bvk"><rect id="SvgjsRect1522" width="180" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1523" class="apexcharts-radialbar"><g id="SvgjsG1524"><g id="SvgjsG1525" class="apexcharts-tracks"><g id="SvgjsG1526" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023" fill="none" fill-opacity="1" stroke="rgba(201,247,245,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="8.97439024390244" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023"></path></g></g><g id="SvgjsG1528"><g id="SvgjsG1532" class="apexcharts-series apexcharts-radial-series" seriesName="Progress" rel="1" data:realIndex="0"><path id="SvgjsPath1533" d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158" fill="none" fill-opacity="0.85" stroke="rgba(27,197,189,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="8.97439024390244" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="266" data:value="74" index="0" j="0" data:pathOrig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158"></path></g><circle id="SvgjsCircle1529" r="56.9048780487805" cx="88" cy="88" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1530" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1531" font-family="Helvetica, Arial, sans-serif" x="88" y="100" text-anchor="middle" dominant-baseline="auto" font-size="30px" font-weight="700" fill="#5e6278" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">{{($data->production / 60)}} hrs</text></g></g></g></g><line id="SvgjsLine1534" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1535" x1="0" y1="0" x2="176" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1520" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
												<div class="resize-triggers"><div class="expand-trigger"><div style="width: 356px; height: 243px;"></div></div><div class="contract-trigger"></div></div></div>
												
                                                <div class="pt-5">
                                                    
													<a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Timesheet {{ \Carbon\Carbon::parse($data->created)->format('F j, Y') }}</a>
							</div>     
                            <div class="row">
                            <a href="#" class="col-md-4 btn btn-light-success mt-5 font-weight-bolder font-size-sm">Break <br>
                            {{round(($data->break / 60),2)}} hrs
                        </a>
                        <a href="#" class="col-md-4 pull-right btn btn-light-success mx-5 mt-5 font-weight-bolder font-size-sm">Overtime <br>
                            {{round(($data->break / 60),2)}} hrs
                        </a>
</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 14-->
									</div>
                                <div class="col-lg-6 col-xxl-4">
										<!--begin::List Widget 9-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="font-weight-bolder text-dark">My Activity</span>
												</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Timeline-->
												<div class="timeline timeline-6 mt-3">
                                                    @php 
                                                    $i=0;
                                                    @endphp
                                                    @foreach($activity as $a)
													<!--begin::Item-->
                                                    @if($i%2==0)
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">
                                                        {{ \Carbon\Carbon::parse($a->start)->format('g:i a') }}
                                                        </div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-success icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
                                                        <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">Punch In at</div>
														<!--end::Text-->
													</div>
                                                    @else
                                                    <div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">
                                                        {{ \Carbon\Carbon::parse($a->end)->format('g:i a') }}</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-warning icon-xl"></i>
														</div>
                                                        <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">Punch Out at</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<!--end::Text-->
													</div>
                                                    @endif
													<!--end::Item-->
													
													<!--end::Item-->
                                                    @php 
                                                    $i++;
                                                    @endphp
													@endforeach
												</div>
												<!--end::Timeline-->
											</div>
											<!--end: Card Body-->
										</div>
										<!--end: List Widget 9-->
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