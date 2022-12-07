<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Department;
use App\Models\Schedule;
use App\Models\Shift;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Schedule::with('user_schedule','shift')->orderBy('id','DESC')->paginate(10);
       // dd($data);
         return view('schedule::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $departments = Department::where('status','=',1)->pluck('name','id')->all();
        $users = User::pluck('first_name','id')->all();
        $shifts = Shift::pluck('shift_name','id')->all();

        return view('schedule::create',compact('departments','users','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'user_id' => 'required',
            'department_id' => 'required',
            'shift_id' => 'required',
            'created' => 'required',
            'min_start_time' => 'required',
            'start_time' => 'required',
            'max_start_time' => 'required',
            'min_end_time' => 'required',
            'end_time' => 'required',
            'max_end_time' => 'required',
           
        ]);
        $input = $request->all();
        $input['extra_hours'] = $input['extra_hours'] ? $input['extra_hours'] : 0;
        $input['publish'] = $input['publish'] ? $input['publish'] : 0;
        Schedule::create($input);
        return redirect()->route('schedule.index')
        ->with('success','Schedule created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('schedule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $departments = Department::where('status','=',1)->pluck('name','id')->all();
        $users = User::pluck('first_name','id')->all();
        $shifts = Shift::pluck('shift_name','id')->all();
        $schedule = Schedule::find($id);

        return view('schedule::edit',compact('departments','users','shifts','schedule'));
   
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'department_id' => 'required',
            'shift_id' => 'required',
            'created' => 'required',
            'min_start_time' => 'required',
            'start_time' => 'required',
            'max_start_time' => 'required',
            'min_end_time' => 'required',
            'end_time' => 'required',
            'max_end_time' => 'required',
           
        ]);
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $input['extra_hours'] = $input['extra_hours'] ? $input['extra_hours'] : 0;
        $input['publish'] = $input['publish'] ? $input['publish'] : 0;
        Schedule::where('id', $id)->update($input);
        return redirect()->route('schedule.index')
        ->with('success','Schedule update successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $res = Schedule::find($id);
        if($res){
            Schedule::destroy($id);
            return redirect()->route('schedule.index')
            ->with('success','Schedule deleted successfully');
    
        }
    }
}
