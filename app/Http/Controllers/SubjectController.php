<?php

namespace App\Http\Controllers;

use App\iClass;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function getSubject(){
        $subjects = Subject::all();
        return view('subject.show-subject',compact('subjects'));
    }

    public function createSubject(){
        $iClass = iClass::all();
        $subject = new Subject();
        return view('subject.create',compact('iClass','subject'));
    }

    public function storeSubject(){
        $iClass = iClass::all();

        if(!$iClass){
            return redirect('/manage/subject/create')->with('message','Must Create Class First');
        }
        else{
            Subject::create($this->validateData());
            return redirect('/manage/subject')->with('message','Subject Successfully Created!');
        }
    }

    public function editSubject($subject){
        $subject = Subject::findOrFail($subject);
        $iClass = iClass::all();
        return view('subject.edit',compact('subject','iClass'));
    }

    public function updateSubject($subject){
        $subject = Subject::findOrFail($subject);
        $subject->update($this->validateData());
        return redirect('/manage/subject')->with('message','Subject Updated Successfully!');
    }

    public function deleteSubject($subject){
        $subject = Subject::findOrFail($subject);
        $subject->delete();
        return redirect('/manage/subject')->with('deleteMessage','Subject Delete Successfully!');
    }

    private function validateData()
    {
        return request()->validate([
           'name' => 'required',
           'code'=>'required',
           'class_id'=>'required'
        ]);
    }


}
