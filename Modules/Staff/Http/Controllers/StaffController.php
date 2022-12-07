<?php

namespace Modules\Staff\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Carbon\Carbon;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        
        $data = User::role('staff')->orderBy('id','DESC')->paginate(5);
        return view('staff::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('staff::create',compact('roles'));
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
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        if($request->file('avatar')) {
            $fileName = time().'_'.$request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            $avatar = time().'_'.$request->file('avatar')->getClientOriginalName();
           
        }

        $userinfo = new Userinfo;
        $userinfo->user_id = $user->id;
        $userinfo->avatar = $avatar;
        $userinfo->gender = $request->gender;
        $userinfo->start_date = Carbon::createFromFormat('d-m-y', $request->start_date)->format('Y-m-d');
        $userinfo->duration_end = Carbon::createFromFormat('d-m-y', $request->duration_end)->format('Y-m-d');
        $userinfo->address = $request->address;
        $userinfo->country = $request->country;
        $userinfo->qualification = $request->qualification;
        $userinfo->position = $request->position;
        $userinfo->start = $request->start;
        $userinfo->end = $request->end;
        $userinfo->save();
        return redirect()->route('staff.index')
        ->with('success','User created successfully');

    
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('staff::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('staff::edit');
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
