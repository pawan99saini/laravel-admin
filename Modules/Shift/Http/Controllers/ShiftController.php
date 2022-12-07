<?php

namespace Modules\Shift\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Shift::orderBy('id','DESC')->paginate(10);
         return view('shift::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shift::create');
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
            'shift_name' => 'required',
            'min_start_time' => 'required',
            'start_time' => 'required',
            'max_start_time' => 'required',
            'min_end_time' => 'required',
            'end_time' => 'required',
            'max_end_time' => 'required',
            'break_time' => 'required',
            'repeat' => 'required',
            'end_date' => 'required',
        ]);
        $input = $request->all();
        $input['week'] = $input['week'] ? json_encode($input['week']) : null;
        $input['recurring_shift'] = $input['recurring_shift'] ? $input['recurring_shift'] : 0;
        $input['indefinite'] = $input['Indefinite'] ? $input['Indefinite'] : 0;
        Shift::create($input);
        return redirect()->route('shift.index')
        ->with('success','Shift created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('shift::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $shift = Shift::find($id);
        return view('shift::edit',compact('shift'));
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
            'shift_name' => 'required',
            'min_start_time' => 'required',
            'start_time' => 'required',
            'max_start_time' => 'required',
            'min_end_time' => 'required',
            'end_time' => 'required',
            'max_end_time' => 'required',
            'break_time' => 'required',
            'repeat' => 'required',
            'end_date' => 'required',
        ]);
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $input['week'] = !empty($input['week']) ? json_encode($input['week']) : null;
        $input['recurring_shift'] = $input['recurring_shift'] ? $input['recurring_shift'] : 0;
        $input['indefinite'] = $input['Indefinite'] ? $input['Indefinite'] : 0;
        Shift::where('id', $id)->update($input);
        return redirect()->route('shift.index')
        ->with('success','Shift update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $res = Shift::find($id);
        if($res){
            Shift::destroy($id);
            return redirect()->route('shift.index')
            ->with('success','Shift deleted successfully');
    
        }
    }
}
