<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;



class DepartmentController extends Controller
{
    public function index(){
        $departments=Department::paginate(10);
        $trashDepartments=Department::onlyTrashed()->paginate(10);
        return view('admin.department.index',compact('departments','trashDepartments'));

    }
        //
        public function store(Request $request){
        $request->validate([
            'department_name'=>'required|unique:departments|max:50'
        ]);
        //
        $department = new Department;
        $department->department_name = $request->department_name;
        $department->user_id = Auth::user()->id;
        $department->save();
        return redirect()->back()->with('success',"Save Complete");
    }

        public function edit($id){
            $department = Department::find($id);
            return view('admin.department.edit',compact('department'));
    }

        public function update(Request $request , $id){
            $request->validate([
                'department_name'=>'required|unique:departments|max:50'
            ]);
            $update = Department::find($id)->update([
               'department_name'=>$request->department_name,
               'user_id'=>Auth::user()->id
            ]);

            return redirect()->route('department')->with('success',"Update Complete");
    }
    // back button
        public function back(){
            return redirect()->route('department');
    }
    public function softdelete($id){
        $delete = Department::find($id)->delete();
        return redirect()->back()->with('success',"Delete Complete");
    }
    public function restore($id){
       Department::withTrashed()->find($id)->restore();
       return redirect()->back()->with('success',"Restore Complete");
    }
    public function delete($id){
        $delete = Department::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success',"Permanent delete Complete");
    }
    //
    public function borrow(){
        $borrows = Department::all()->borrow();
    }
}