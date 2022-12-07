<?php

namespace Modules\TraningType\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\TrainingType;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class TraningTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
    public function index(Request $request)
    {
        $data = TrainingType::orderBy('id','DESC')->paginate(10);
         return view('traningtype::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);

    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('traningtype::create');
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
            'name' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        TrainingType::create($input);
        return redirect()->route('traningtype.index')
        ->with('success','Traning Type created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('traningtype::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $traningtype = TrainingType::find($id);
        return view('traningtype::edit',compact('traningtype'));
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
            'name' => 'required',
            'status' => 'required',
        ]);
        $traningtype = TrainingType::find($id);
        $traningtype->name = $request->name;
        $traningtype->status = $request->status;
        $traningtype->save();
        return redirect()->route('traningtype.index')
        ->with('success','Traning Type update successfully');

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
