<?php

namespace Modules\Trainer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Trainer;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Trainer::orderBy('id','DESC')->paginate(10);

        return view('trainer::index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('trainer::create');
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
            'last_name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        Trainer::create($input);
        return redirect()->route('trainer.index')
        ->with('success','Trainer created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('trainer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $trainer = Trainer::find($id);
        return view('trainer::edit',compact('trainer'));
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
            'last_name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        Trainer::where('id', $id)->update($input);
        return redirect()->route('trainer.index')
        ->with('success','Trainer updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $res = Trainer::find($id);
        if($res){
            Trainer::destroy($id);
            return redirect()->route('trainer.index')
            ->with('success','Trainer deleted successfully');
    
        }
    }
}
