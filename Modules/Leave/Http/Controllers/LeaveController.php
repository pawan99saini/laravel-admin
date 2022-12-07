<?php

namespace Modules\Leave\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        

        if(Auth::user()->hasRole('admin'))
        {
            $user_id = $request->get('user_id');
            $type = $request->get('type');
            $status = $request->get('status');
            $data = Leave::with('leaveType')
            ->when($type, function($query, $type) {
                return $query->where('type', '=', $type);
              })
              ->when($user_id, function($query, $user_id) {
                return $query->where('user_id', '=', $user_id);
              })
              ->when($status, function($query, $status) {
                return $query->where('status', '=', $status);
              })
    
            
            ->orderBy('id','DESC')->paginate(10);

        }
        else{
            $data = Leave::with('leaveType')->orderBy('id','DESC')->where('user_id','=',Auth::user()->id)->paginate(10);

        }
        $leave_types = LeaveType::where('status',1)->select('id','name')->get();
        $users = User::select('id','first_name')->get();
        return view('leave::index',compact('data','leave_types','users'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $leave_types = LeaveType::where('status',1)->select('id','name')->get();
        return view('leave::create',compact('leave_types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        //
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'type' => 'required',
            'reason' => 'required',
        ]);
        $input = $request->all();
        $input['from'] = Carbon::createFromFormat('Y-m-d', $input['from']);
        $input['to'] = Carbon::createFromFormat('Y-m-d', $input['to']);
        $input['user_id'] = Auth::user()->id;
        Leave::create($input);
        return redirect()->route('leave.index')
        ->with('success','Leave created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('leave::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $leave = Leave::find($id);
        $leave_types = LeaveType::where('status',1)->select('id','name')->get();
        return view('leave::edit',compact('leave','leave_types'));
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
            'from' => 'required',
            'to' => 'required',
            'type' => 'required',
            'reason' => 'required',
        ]);
        $input = $request->all();
        $input['from'] = Carbon::createFromFormat('Y-m-d', $input['from']);
        $input['to'] = Carbon::createFromFormat('Y-m-d', $input['to']);
        unset($input['_token']);
        unset($input['_method']);
        Leave::where('id', $id)->update($input);
        return redirect()->route('leave.index')
        ->with('success','Leave created successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $res = Leave::find($id);
    if($res){
        Leave::destroy($id);
        return redirect()->route('leave.index')
        ->with('success','Leave deleted successfully');

    }

    }

    public function changeStatus(Request $request)
    {
        $data=$request->all();
        $id = $data['id'];
        $status = $data['status'];
        $leave = Leave::find($id);
        $leave->status = $status;
        $leave->approved_by = Auth::user()->id;
        if($leave->save())
        {
            echo true;
        }
        else{

            echo false;
        }
    }
}
