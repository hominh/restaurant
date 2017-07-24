<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Position;
use App\User;
use DB;
use Auth;
use App\Employee;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('employees')
                ->leftJoin('positions','employees.position_id','=','positions.id')
                ->leftJoin('users','employees.user_id','=','users.id')
                ->select('employees.id','employees.firstname','employees.lastname','employees.created_at','positions.name as pname','users.name as uname')
                ->get();
        return view('admin/employee/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::select('id','name')->get();
        return view('admin/employee/add',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'firstname' => 'required',
           'lastname'  => 'required'
       ]);
       $employee = new Employee;
       $employee->firstname = $request->firstname;
       $employee->lastname = $request->lastname;
       $employee->note = $request->note;
       $employee->facebook_url = $request->facebook;
       $employee->twitter_url = $request->twitter;
       $employee->tumblr_url = $request->tumblr;
       $employee->position_id = $request->position;
       if(Input::hasFile('photo')) {
           $imageTempName = $request->file('photo')->getPathname();
           $imageName = $request->file('photo')->getClientOriginalName();
           $path = public_path("images/employee/");
           $request->file('photo')->move($path , $imageName);
           $employee->photo = $imageName;
       }
       $employee->user_id = Auth::user()->id;
       $employee->save();
       return redirect()->route('admin.employee.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employee::findOrFail($id)->toArray();
        $currentIdPosition = $data['position_id'];
        //dd($currentIdPosition);
        $currentPosition = DB::table('positions')
                            ->join('employees','positions.id','=','employees.position_id')
                            ->select('positions.id as idpt','positions.name as namept')
                            ->where('positions.id','=',$currentIdPosition)
                            ->get();
        //dd($currentPosition);
        $idpt = $currentPosition[0]->idpt;
        $otherPositionobj = DB::table('positions')
                            ->select('positions.id as idpt','positions.name as namept')
                            ->where('positions.id','<>',$idpt)
                            ->get();
        return view('admin.employee.edit',compact('data','id','strTag','currentPosition','otherPositionobj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'firstname' => 'required',
           'lastname'  => 'required'
       ]);
       $employee = Employee::find($id);
       $employee->firstname = $request->firstname;
       $employee->lastname = $request->lastname;
       $employee->note = $request->note;
       $employee->facebook_url = $request->facebook;
       $employee->twitter_url = $request->twitter;
       $employee->tumblr_url = $request->tumblr;
       $employee->position_id = $request->position;

       if($request->newphoto != "" || $request->newphoto != NULL) {
           if(Input::hasFile('newphoto')) {
               $imageTempName = $request->file('newphoto')->getPathname();
               $imageName = $request->file('newphoto')->getClientOriginalName();
               $path = public_path("images/employee/");
               $request->file('newphoto')->move($path , $imageName);
               $employee->photo = $imageName;
           }
       }
       $employee->user_id = Auth::user()->id;
       $employee->save();
       return redirect()->route('admin.employee.list');
    }

    public function getDelImg($id,Request $request) {
        if($request->ajax()) {

            $idEmployee = (int)$request->get('idEmployee');
            $employeeDetail = Employee::find($idEmployee);
            if(!empty($employeeDetail)) {
                $img = public_path("images/employee/");
                $img.= $employeeDetail->image;

                if(File::exists($img)) {
                    File::delete($img);
                }
                //Update image = Null
                $employeeDetail->photo = "";
                $employeeDetail->save();

            }

            return "ok";
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('admin.employee.list');
    }
}
