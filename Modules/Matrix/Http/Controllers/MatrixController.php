<?php

namespace Modules\Matrix\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Matrix;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('admin'))
        {
            $data = Matrix::with('staff')->orderBy('id','DESC')->paginate(10);

        }
        else
        {
            $data = Matrix::with('staff')->where('user_id',Auth()->user()->id)->orderBy('id','DESC')->paginate(10);

        }
        

         return view('matrix::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $staff = User::with('qualification')->where('id',Auth()->user()->id)->first();
        return view('matrix::create',compact('staff'));
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
            'date' => 'required',
        ]);
        $input = $request->all();
        $matrix = new Matrix;
        $matrix->user_id = Auth()->user()->id;
        $matrix->created = Carbon::createFromFormat('Y-m-d', $input['date']);
        $matrix->save();
        if($request->qualification)
        {
            foreach($request->qualification as $value)
            {
            DB::table('matrix_qualifications')->insert([
                'matrix_id' => $matrix->id,
                'qualification' => $value['name'],
                'start_date' => $value['start_date'],
                'end_date' => $value['end_date']
            ]);
        }
        }
        
        if($request->course)
        {

            $i=0;
            foreach($request->course as $value)
            {
            DB::table('matrix_courses')->insert([
                'matrix_id' => $matrix->id,
                'course_title' => $value['title'],
                'skill_1' => $value['skill_1'],
                'skill_2' => $value['skill_2'],
                'skill_3' => $value['skill_3'],
            ]);
            $i++;
        }
        }
        return redirect()->route('matrix.index')
        ->with('success','Matrix created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data = Matrix::with('staff.info')->where('id',$id)->orderBy('id','DESC')->first();
        return view('matrix::show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $matrix = Matrix::with('staff','matrix_qualification','matrix_course')->find($id);
        return view('matrix::edit',compact('matrix'));

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
                'date' => 'required',
            ]);
            $input = $request->all();
            $matrix = Matrix::find($id);
            $matrix->created = Carbon::createFromFormat('Y-m-d', $input['date']);
            $matrix->save();
            if($request->qualification)
            {
                foreach($request->qualification as $key=>$value)
                {
                
             DB::table('matrix_qualifications')
              ->where('id', $key)
              ->update(['matrix_id' => $matrix->id,
              'qualification' => $value['name'],
              'start_date' => $value['start_date'],
              'end_date' => $value['end_date']]);
            }
            }
            
            if($request->course)
            {
    
                foreach($request->course as $key=>$value)
                {
                
                DB::table('matrix_courses')
              ->where('id', $key)
              ->update(['matrix_id' => $matrix->id,
                   'course_title' => $value['title'],
                    'skill_1' => $value['skill_1'],
                    'skill_2' => $value['skill_2'],
                    'skill_3' => $value['skill_3']]);
            }
            }
            return redirect()->route('matrix.index')
            ->with('success','Matrix updated successfully');
    
      
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $res = Matrix::find($id);
        if($res){
            $res->matrix_qualification()->delete();
            $res->matrix_course()->delete();

            Matrix::destroy($id);
            return redirect()->route('matrix.index')
            ->with('success','Matrix deleted successfully');
    
        }
    }

    public function updateCourse(Request $request)
    {
        $type = $request->type;
        $id = $request->course_id;
        $value = $request->value;
        if(DB::table('matrix_courses')
        ->where('id',$id)
        ->update([
        $type => $value]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
