<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function index(){
        $borrows=Borrow::paginate(10);
        $trashDepartments=Borrow::paginate(10);
        return view('admin.borrow.index',compact('borrows'));

    }
        //
        public function store(Request $request){
        $request->validate([
            'borrow_name'=>'required|unique:borrows|max:50'
        ]);
        //
        $borrows = new Borrow();
        $borrows->borrow_name = $request->borrow_name;
        $borrows->borrow_id = Auth::user()->id;
        $borrows->save();
        return redirect()->back()->with('success',"Save Complete");
    }

        public function edit($id){
            $borrows = Borrow::find($id);
            return view('admin.borrow.edit',compact('borrows'));
    }

        public function update(Request $request , $id){
            // dd($request);
            $request->validate([
                'borrow_name'=>'required|unique:borrows|max:30'
            ]);
            Borrow::where('id', $request->id)->update(
                [
                    'borrow_name'=>$request->borrow_name 
                ]
            );

            return redirect()->route('borrows')->with('success',"Update Complete");
    }
    // back button
        public function back(){
            return redirect()->route('borrows');
    }
    public function delete($id){
        $delete = Borrow::find($id)->forceDelete();
        return redirect()->back()->with('success',"Delete Complete");
}
}