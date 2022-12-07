<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Department;
use App\Models\Address;
use App\Models\ContactDetail;
use App\Models\Qualification;
use App\Models\Skills;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Carbon\Carbon;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(10);
        return view('users::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $roles = Role::where('name','!=','admin')->pluck('name','name')->all();
        $departments = Department::where('status','=',1)->pluck('name','id')->all();
        return view('users::create',compact('roles','departments'));
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
        $avatar  = NULL;
        if($request->file('avatar')) {
            $fileName = time().'_'.$request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            $avatar = time().'_'.$request->file('avatar')->getClientOriginalName();
           
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['start_date'] = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $input['end_date'] = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $input['country'] = $request->country;
        $input['department_id'] = $request->department;
        $input['position'] = $request->position;
        $input['avatar'] = $avatar;
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        if(!empty($request->address))
        {
            foreach ($request->address as $datas) 
            {
                $address = new Address;
                $address->address = $datas['address'];
                $address->user_id = $user->id;
                $address->save();
            }
        
        }
        
        if(!empty($request->contact_details))
        {
            foreach ($request->contact_details as $contact_details) 
            {
                $contact = new ContactDetail;
                $contact->contact_detail = $contact_details['contact_detail'];
                $contact->user_id = $user->id;
                $contact->save();
            }
        
        }
        
        if(!empty($request->qualifications))
        {
            foreach ($request->qualifications as $qualifications) 
            {
                $qualification = new Qualification;
                $qualification->qualification = $qualifications['qualification'];
                $qualification->start_date = Carbon::createFromFormat('Y-m-d', $qualifications['start_date']);
                $qualification->end_date = Carbon::createFromFormat('Y-m-d', $qualifications['end_date']);
                $qualification->user_id = $user->id;
                $qualification->save();
            }
        
        }

        if(!empty($request->skills))
        {
            foreach ($request->skills as $skills) 
            {
                $skill = new Skills;
                $skill->skill = $skills['skill'];
                $skill->user_id = $user->id;
                $skill->save();
            }
        
        }

        
        return redirect()->route('users.index')
        ->with('success','User created successfully');

    
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $user = User::with('address','contact_details','qualification','skills','department','leave.leaveType')->find($id);
        return view('users::show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = User::with('address','contact_details','qualification','skills')->find($id);
        //dd($user);
        $roles = Role::where('name','!=','admin')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $departments = Department::where('status','=',1)->pluck('name','id')->all();
        return view('users::edit',compact('user','roles','userRole','departments'));
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
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required'
        ]);
        $user = User::find($id);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        if($request->file('avatar')) {
            $fileName = time().'_'.$request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            $avatar = time().'_'.$request->file('avatar')->getClientOriginalName();
           
        }
        else{
          $avatar = $user->avatar;
        }
        $input['start_date'] = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $input['end_date'] = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $input['country'] = $request->country;
        $input['department_id'] = $request->department;
        $input['position'] = $request->position;
        $input['avatar'] = $avatar;
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        if(!empty($input['address'][0]['address']))
        {
            foreach ($request->address as $datas) 
            {
                $address = Address::find($datas['id']);
                $address->address = $datas['address'];
                $address->user_id = $user->id;
                $address->save();
            }
        
        }
        
        if(!empty($input['contact_details'][0]['contact_details']))
        {
            foreach ($request->contact_details as $contact_details) 
            {
                $contact = ContactDetail::$contact_details['id'];
                $contact->contact_detail = $contact_details['contact_detail'];
                $contact->user_id = $user->id;
                $contact->save();
            }
        
        }
        
        if(!empty($input['qualifications'][0]['qualification']))
        {
            foreach ($request->qualifications as $qualifications) 
            {
                $qualification = Qualification::find($qualifications['id']);
                $qualification->qualification = $qualifications['qualification'];
                $qualification->start_date = Carbon::createFromFormat('Y-m-d', $qualifications['start_date']);
                $qualification->end_date = Carbon::createFromFormat('Y-m-d', $qualifications['end_date']);
                $qualification->user_id = $user->id;
                $qualification->save();
            }
        
        }

        if(!empty($input['skills'][0]['skill']))
        {
            foreach ($request->skills as $skills) 
            {
                $skill = Skills::find($skills['id']);
                $skill->skill = $skills['skill'];
                $skill->user_id = $user->id;
                $skill->save();
            }
        
        }

        
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');

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
