<?php

namespace App\Http\Controllers;

use App\iClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function getClass(){
        $iclasses = iClass::all();
        return view('class.show-class',compact('iclasses'));
    }

    public function createClass(){
        $iclass = new iClass();
        return view('class.create',compact('iclass'));
    }

    public function storeClass(Request $request){

        iClass::create($this->validateData());
        return redirect('/manage/class')->with('message','Class Successfuly Added!');
    }

    public function editClass($iclass){
        $iclass = iClass::findOrFail($iclass);
        return view('class.edit',compact('iclass'));
    }

    public function updateClass(Request $request, $id){
        $iclass = iClass::where('id', $id)->first();
       $iclass->update($this->validateData());
        return redirect('/manage/class')->with('message','Class Updated Successfully!');
    }

    public function deleteClass($iclass){
        $iclass = iClass::where('id', $iclass)->first();
        $iclass->delete();
        return redirect('/manage/class')->with('message','Class Delete Successfully!');
    }

    private function validateData(){
        return request()->validate([
            'name'=>'required',
            'numericvalue'=>'required',
            'group'=>'required',
            'note'=>'sometimes'
        ]);
    }
}
