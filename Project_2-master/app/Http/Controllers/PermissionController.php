<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
         $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Permission::all();

        return view('permissions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // แก้ไขส่วน Validate ให้เรียกใช้ไฟล์แปล permissions.php
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ], [
            'name.required' => __('permissions.name_required'),
            'name.unique'   => __('permissions.name_unique'),
        ]);
    
        Permission::create(['name' => $request->input('name')]);
    
        // แก้ไขข้อความ success ให้เรียกใช้ไฟล์แปล
        return redirect()->route('permissions.index')
            ->with('success', __('permissions.permission_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
    
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
    
        return view('permissions.edit', compact('permission'));
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
        // แก้ไขส่วน Validate ให้เรียกใช้ไฟล์แปล permissions.php
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => __('permissions.name_required'),
        ]);
    
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();
        
        // แก้ไขข้อความ success ให้เรียกใช้ไฟล์แปล
        return redirect()->route('permissions.index')
            ->with('success', __('permissions.permission_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        
        // แก้ไขข้อความ success ให้เรียกใช้ไฟล์แปล
        return redirect()->route('permissions.index')
            ->with('success', __('permissions.permission_deleted_successfully'));
    }
}
