<?php

namespace Modules\Timesheet\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Leave;
use App\Models\Timesheet;
use App\Models\Project;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('admin'))
        {
            $data = Timesheet::with('user')->orderBy('id','DESC')->paginate(10);

        }
        else{
            $data = Timesheet::orderBy('id','DESC')->where('user_id','=',Auth::user()->id)->paginate(10);

        }
        return view('timesheet::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $projects = Project::where('status','=',1)->select('id','name')->get();
        return view('timesheet::create',compact('projects'));
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
            'project' => 'required',
            'hours' => 'required',
            'created' => 'required',
        ]);
        $input = $request->all();
        $input['created'] = Carbon::createFromFormat('Y-m-d', $input['created']);
        $input['user_id'] = Auth::user()->id;
        $input['project_id'] = $input['project'];
        Timesheet::create($input);
        return redirect()->route('timesheet.index')
        ->with('success','Timesheet created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('timesheet::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $projects = Project::where('status','=',1)->select('id','name')->get();
        $timesheet = Timesheet::find($id);
        return view('timesheet::edit',compact('projects','timesheet'));
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
            'project' => 'required',
            'hours' => 'required',
            'created' => 'required',
        ]);
        $timesheet = Timesheet::find($id);
        $input = $request->all();
        $input['project_id'] = $input['project'];
        $timesheet->user_id = Auth::user()->id;
        $timesheet->project_id = $input['project'];
        $timesheet->hours = $input['hours'];
        $timesheet->description = $input['description'];
        $timesheet->created = Carbon::createFromFormat('Y-m-d', $input['created']);
        $timesheet->save();

        return redirect()->route('timesheet.index')
        ->with('success','Timesheet update successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
