<?php

namespace Modules\Attendance\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use App\Models\Attendance;
use App\Models\WorkSession;
use Illuminate\Support\Arr;
use DB;
use Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        
        $time = Carbon::now();
        $time->toDateTimeString();
        $created = $time->format('Y-m-d');
        $att = Attendance::whereDate('created', '=', $created)->where('user_id','=',Auth::user()->id)->first();
        $last_record = null;
        if($att)
        {
            $last_record = WorkSession::select('type')->where('attendance_id','=',$att->id)->latest()->first();
        }
        if(Auth::user()->hasRole('admin'))
            {
                $user_id = $request->get('user_id');
                $month = $request->get('month') ? $request->get('month') : date('m');
                $year = $request->get('year');

                $attendance = Attendance::with('user_att')
                ->select('id','user_id','created',DB::raw('GROUP_CONCAT(DAY(created)) AS day'))
                ->when($user_id, function($query, $user_id) {
                    return $query->where('user_id', '=', $user_id);
                  })
                  ->when($month, function($query, $month) {
                    return $query->whereMonth('created', '=', $month);
                  })
                  ->when($year, function($query, $year) {
                    return $query->whereYear('created', '=', $year);
                  })
                  ->groupBy(DB::raw('user_id'))

                ->orderBy('id','DESC')->paginate(10);
                $users = User::select('id','first_name')->get();
                return view('attendance::admin-index',compact('attendance','users'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
            }
            else{
                $attendance = Attendance::where('user_id','=',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
                return view('attendance::index',compact('attendance','att','last_record'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
            }

        

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('attendance::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $time = Carbon::now();
        $time->toDateTimeString();
        $created = $time->format('Y-m-d');
        $att = Attendance::whereDate('created', '=', $created)->where('user_id','=',Auth::user()->id)->first();
        if($att==null)
        {
            $attendance = new Attendance;
            $attendance->created = $created;
            $attendance->time_in = $time;
            $attendance->time_out = $time;
            $attendance->break = 0;
            $attendance->production = 0;
            $attendance->overtime = 0;
            $attendance->user_id = Auth::user()->id;
            $attendance->save();
            $break = new WorkSession;
            $break->user_id = Auth::user()->id;
            $break->attendance_id = $attendance->id;
            $break->start = $time;
            $break->type = 'work';
            $break->save();
            echo 'add';
        }
        else
        {
        $at = Attendance::find($att->id);
        $attendance_id = $att->id;
        $time = Carbon::now();
        $last_record = WorkSession::where('attendance_id','=',$attendance_id)->latest()->first();
        $end_work = WorkSession::find($last_record->id);
        $end_work->end = $time;
        $end_work->save();
        $today_records = WorkSession::where('attendance_id','=',$attendance_id)->get();
        $total_work=0;
        $total_break=0;
        foreach($today_records as $records)
        {
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $records->start);
            $from = Carbon::createFromFormat('Y-m-d H:s:i', $records->end);
            $diff_in_minutes = $to->diffInMinutes($from);

            if($records->type=='work')
            {
                $total_work+= $diff_in_minutes;

            }
            else{
                $total_break+= $diff_in_minutes;

            }
            $at->time_out = $time;
            $at->break = $total_break;
            $at->production = $total_work;
            $at->status = 1;
            $at->save();
            
        }
        echo 'update';
        }

        

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('attendance::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $attendance = Attendance::with('user_att')->find($id);
        return view('attendance::edit',compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'status' => 'required',
        ]);
        $at = Attendance::find($id);
        if($request->status==1)
        {
            
        $attendance_id = $id;
        $last_record = WorkSession::where('attendance_id','=',$attendance_id)->latest()->first();
        $end_work = WorkSession::find($last_record->id);
        $end_work->start = \Carbon\Carbon::parse($at->created.' '.$request->time_in);
        $end_work->end = \Carbon\Carbon::parse($at->created.' '.$request->time_out);
        $end_work->save();
        $today_records = WorkSession::where('attendance_id','=',$attendance_id)->get();
        $total_work=0;
        $total_break=0;
        foreach($today_records as $records)
        {
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $records->start);
            $from = Carbon::createFromFormat('Y-m-d H:s:i', $records->end);
            $diff_in_minutes = $to->diffInMinutes($from);

            if($records->type=='work')
            {
                $total_work+= $diff_in_minutes;

            }
            else{
                $total_break+= $diff_in_minutes;

            }
            $at->time_in = \Carbon\Carbon::parse($at->created.' '.$request->time_in);
            $at->time_out =\Carbon\Carbon::parse($at->created.' '.$request->time_out);
            $at->break = $total_break;
            $at->production = $total_work;
            $at->status = 1;
            $at->save();

        }
    }
        else
        {
            $at->status = 0;
            $at->save();


        }
            return redirect()->route('attendance.index')
            ->with('success','Attendance update successfully');
    
        }
        
    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $res = Attendance::find($id);
        if($res){
            $res->sessions()->delete();
            Attendance::destroy($id);
            return redirect()->route('holiday.index')
            ->with('success','Holiday deleted successfully');
    
        }
    }
//break start
    public function breakStart(Request $request)
    {
        $attendance_id = $request->id;
        $time = Carbon::now();
        $last_record = WorkSession::where('attendance_id','=',$attendance_id)->latest()->first();
        $update_break = WorkSession::find($last_record->id);
        $update_break->end = $time;
        $update_break->save();
        $break = new WorkSession;
        $break->user_id = Auth::user()->id;
        $break->attendance_id = $attendance_id;
        $break->start = $time;
        $break->type = 'break';
        $break->save();
        echo 'add';
            
    }
    //break end
    public function breakEnd(Request $request)
    {
        $attendance_id = $request->id;
        $time = Carbon::now();
        $last_record = WorkSession::where('attendance_id','=',$attendance_id)->latest()->first();
        $update_break = WorkSession::find($last_record->id);
        $update_break->end = $time;
        $update_break->save();
        $break = new WorkSession;
        $break->user_id = Auth::user()->id;
        $break->attendance_id = $attendance_id;
        $break->start = $time;
        $break->type = 'work';
        $break->save();
        echo 'add';
            
    }

    public function ViewAttendance($date,$id)
    {
        $data = Attendance::with('user_att')->whereDate('created',$date)->where('user_id',$id)->first();
        $activity = WorkSession::where('attendance_id','=',$data->id)->get();
        return view('attendance::view',compact('data','activity'));

    }
}
