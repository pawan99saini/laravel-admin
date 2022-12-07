<?php

namespace Modules\Training\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\TrainingType;
use App\Models\Training;
use App\Models\Trainer;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Training::with('employee','trainer','type')->orderBy('id','DESC')->paginate(10);
         return view('training::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $types = TrainingType::where('status','=',1)->select('id','name')->get();
        $staff = User::role('staff')->select('id','first_name')->get();
        $trainer = Trainer::where('status',1)->select('id','first_name')->get();
        return view('training::create',compact('types','trainer','staff'));
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
            'type_id' => 'required',
            'trainer_id' => 'required',
            'cost' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['start_date'] = Carbon::createFromFormat('Y-m-d', $input['start_date']);
        $input['end_date'] = Carbon::createFromFormat('Y-m-d', $input['end_date']);
        $traning = new Training;
        $traning->type_id = $input['type_id'];
        $traning->trainer_id = $input['trainer_id'];
        $traning->cost = $input['cost'];
        $traning->description = $input['description'];
        $traning->start_date = $input['start_date'];
        $traning->end_date = $input['end_date'];
        $traning->status = $input['status'];
        $traning->save();
        $traning->employee()->attach($input['user_id']);
        return redirect()->route('training.index')
        ->with('success','Training created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('training::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $types = TrainingType::where('status','=',1)->select('id','name')->get();
        $staff = User::role('staff')->select('id','first_name')->get();
        $trainer = Trainer::where('status',1)->select('id','first_name')->get();
        $training = Training::with('employee')->find($id);
        $employee=[];
        foreach($training->employee as $t)
        {
            $employee[]=$t->id;
        }
        return view('training::edit',compact('types','staff','trainer','training','employee'));
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
            'type_id' => 'required',
            'trainer_id' => 'required',
            'cost' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['start_date'] = Carbon::createFromFormat('Y-m-d', $input['start_date']);
        $input['end_date'] = Carbon::createFromFormat('Y-m-d', $input['end_date']);
        $training=Training::find($id);
        $training->type_id = $input['type_id'];
        $training->trainer_id = $input['trainer_id'];
        $training->cost = $input['cost'];
        $training->description = $input['description'];
        $training->start_date = $input['start_date'];
        $training->end_date = $input['end_date'];
        $training->status = $input['status'];
        $training->save();
        $training->employee()->sync($input['user_id']);
        return redirect()->route('training.index')
        ->with('success','Training created successfully');

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
