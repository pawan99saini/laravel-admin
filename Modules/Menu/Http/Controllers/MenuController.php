<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Menu::orderBy('id','DESC')->paginate(10);
         return view('menu::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $roles = Role::pluck('id','name')->all();
        return view('menu::create',compact('roles'));
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
            'title' => 'required',
            'link' => 'required',
            'position' => 'required',
            'icon' => 'required',
            'link_open_in' => 'required',
            'ordering' => 'required',
            'status' => 'required',
            'role' => 'required',
        ]);
        $input = $request->all();
        $icon  = NULL;
        if($request->file('icon')) {
            $fileName = time().'_'.$request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('uploads', $fileName, 'public');
            $icon = time().'_'.$request->file('icon')->getClientOriginalName();
           
        }
        $input['icon'] = $icon;
        $input['role'] = json_encode($input['role']);
        Menu::create($input);
        return redirect()->route('menus.index')
        ->with('success','Menu created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('menu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $roles = Role::pluck('id','name')->all();
        return view('menu::edit',compact('menu','roles'));
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
            'title' => 'required',
            'link' => 'required',
            'position' => 'required',
            'link_open_in' => 'required',
            'ordering' => 'required',
            'status' => 'required',
            'role' => 'required',
        ]);
        $request->except('_method', '_token');

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        if($request->file('icon')) {
            $fileName = time().'_'.$request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('uploads', $fileName, 'public');
            $icon = time().'_'.$request->file('icon')->getClientOriginalName();
            $input['icon'] = $icon;
 
        }
        $input['role'] = json_encode($input['role']);
        Menu::where('id', $id)->update($input);
        return redirect()->route('menus.index')
        ->with('success','Menu update successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $res = Menu::find($id);
        if($res){
            Menu::destroy($id);
            return redirect()->route('menus.index')
            ->with('success','Menu deleted successfully');
    
        }
    }
}
