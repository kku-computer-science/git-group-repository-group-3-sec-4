<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:departments-list|departments-create|departments-edit|departments-delete', ['only' => ['index','store']]);
         $this->middleware('permission:departments-create', ['only' => ['create','store']]);
         $this->middleware('permission:departments-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:departments-delete', ['only' => ['destroy']]);
         //Redirect::to('dashboard')->send();
    }

    public function index(Request $request)
    {
        $data = Department::latest()->paginate(5);

        return view('departments.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // เพิ่มข้อความแปล (validate)
        $this->validate($request, [
            'department_name_th' => 'required',
            'department_name_th' => 'required',
        ], [
            'department_name_th.required' => __('department.department_name_th_required'),
        ]);

        $input = $request->except(['_token']);
    
        Department::create($input);
    
        // เปลี่ยนข้อความ success เป็นฟังก์ชันแปล
        return redirect()->route('departments.index')
            ->with('success', __('department.department_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $department=Department::find($department->id);
       
        return view('departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        // *หมายเหตุ* โค้ดเดิมไม่มี validate ใน update 
        // หากต้องการเพิ่มการ validate ก็ทำได้เช่นกัน
        $department->update($request->all());

        // เปลี่ยนข้อความ success เป็นฟังก์ชันแปล
        return redirect()->route('departments.index')
                        ->with('success', __('department.department_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        // เปลี่ยนข้อความ success เป็นฟังก์ชันแปล
        return redirect()->route('departments.index')
                        ->with('success', __('department.department_deleted_successfully'));
    }
}
