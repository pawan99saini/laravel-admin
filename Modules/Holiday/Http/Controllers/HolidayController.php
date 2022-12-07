<?php

namespace Modules\Holiday\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Holiday;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Holiday::orderBy('id','DESC')->paginate(10);
         return view('holiday::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('holiday::create');
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
            'holiday_date' => 'required',
        ]);
        $input = $request->all();
        Holiday::create($input);
        return redirect()->route('holiday.index')
        ->with('success','Holiday created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('holiday::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $holiday = Holiday::find($id);
        return view('holiday::edit',compact('holiday'));
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
            'holiday_date' => 'required',
        ]);
        $holiday = Holiday::find($id);
        $holiday->name = $request->name;
        $holiday->holiday_date = $request->holiday_date;
        $holiday->save();
        return redirect()->route('holiday.index')
        ->with('success','Holiday update successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $res = Holiday::find($id);
        if($res){
            Holiday::destroy($id);
            return redirect()->route('holiday.index')
            ->with('success','Holiday deleted successfully');
    
        }
    }
}
