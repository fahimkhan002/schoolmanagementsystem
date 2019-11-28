<?php

namespace App\Http\Controllers;

use App\iClass;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function getSection(){
        $iClass = iClass::all();
        $section = Section::all();
        return view('section.show-section',compact('iClass','section'));
    }
    public function createSection(){
        $iClass = iClass::all();
        $section = new Section();
        return view('section.create',compact('section','iClass'));
    }

    public function storeSection(){
        Section::create($this->validateData());
        return redirect('/manage/section')->with('message','Section Created Successfully!');
    }

    public function editSection($section){
        $section = Section::findOrFail($section);
        $iClass = iClass::all();

        return view('section.edit',compact('section','iClass'));
    }

    public function updateSection(Request $request, $id){
        $section = Section::where('id', $id)->first();
        $section->update($this->validateData());
        return redirect('/manage/section')->with('message','Section Updated Successfully!');
    }

    public function deleteSection($section){
        $section = Section::where('id', $section)->first();
        $section->delete();
        return redirect('/manage/section')->with('message','Section Delete Successfully!');
    }

    public function validateData(){
        return \request()->validate([
           'name'=>'required',
           'capacity'=>'required',
           'note'=>'sometimes',
           'class_id'=>'required'
        ]);
    }
}
