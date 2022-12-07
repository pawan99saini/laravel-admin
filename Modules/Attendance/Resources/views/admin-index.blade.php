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
                        Attendance</h1>
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

                <div class="card mb-5 mb-xl-8">

                    <!--begin::Body-->
                    <div class="card-body py-3">
                    <form method="get" action="{{route('attendance.index')}}">
                        <div class="row mb-5">
                            
                            <div class="col-md-3">
                                <select class="form-control" name="user_id">
                                <option value="">Select Employee</option>
                                @foreach($users as $k=>$user)
                                    <option value="{{$user->id}}" {{request()->get('user_id') == $user->id ? 'selected' : ''}}>{{$user->first_name}}</option>
                                @endforeach
                            </select></div>
                            <div class="col-md-3">
                                <input type="number" name="month" class="form-control" value="{{request()->get('month')}}" placeholder="Month">
                                </div>
                                <div class="col-md-3">
                                <input type="number" name="year" class="form-control" value="{{request()->get('year')}}" placeholder="Year">
                                </div>
                        <div class="col-md-2"><button type="submit" class="btn btn-lg btn-info">Apply</button></div>

                        </div>
                        </form>
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted bg-light">
                                        <th>Employee</th>
                                        @for($i=1;$i<=31;$i++)
                                        <th>{{$i}}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($attendance as $att)
                                    @php 
                                    $days = explode(",",$att->day);
                                    $created = \Carbon\Carbon::parse($att->created)->format('d');
                                    @endphp
                                        <tr>
                                            <td>{{$att->user_att->first_name}}</td>
                                            @for($i=1;$i<=31;$i++)
                                            @php
                                            $url = route('attendance.ViewAttendance',[$att->created,$att->user_att->id]);
                                            @endphp
                                            <td><span class="day">{!! in_array($i,$days) ? '<a href="'.$url.'"><i class="fa fa-check text-success"></i></a>' : '<i class="fa fa-close text-danger"></i>' !!}</span>
</td>   
                                    @endfor
                                    <td class="text-end">
																
																<a href="{{ URL::to('attendance/' . $att->id . '/edit') }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																	<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</a>
																<form action="{{ route('attendance.destroy', $att->id) }}" method="POST" id="delete-{{$att->id}}">
  @csrf
  @method("DELETE")
 
  <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="validateForm({{$att->id}})">
																	<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																			<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</a>
</form>
															</td>
														
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            {!! $attendance->links() !!}

                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 10-->
                <!--begin::Tables Widget 11-->

                <!--end::Tables Widget 11-->
                <!--begin::Tables Widget 12-->

                <!--end::Tables Widget 12-->
                <!--begin::Tables Widget 13-->

                <!--end::Tables Widget 13-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->


</div>
@endsection

