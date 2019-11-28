<?php

namespace App\Http\Controllers;

use App\iClass;
use App\Section;
use App\Student;
use App\Timetable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    public function getStudent()
    {
        $iClass = iClass::all();

        $students = Student::all();
        return view('student.show',compact('iClass','students'));
    }

    public function createStudent()
    {
        $iClass = iClass::all();
        $student = null;
        $section = Section::all();
        return view('student.create', compact('iClass','student','section'));
    }

    public function findSectionName(Request $request)
    {
        $data = Section::select('name', 'id')->where('class_id', $request->id)->take(100)->get();
        return response()->json($data);
    }

    ////Timtable Filter Option
    public function findTimetable(Request $request)
    {
        $data = Timetable::select('id')->where([
            ['class_id', '=', $request->class_id],
            ['section_id', '=', $request->section_id],
        ])->get();

        return response()->json($data);
    }

    public function storeStudent(Request $request)
    {
        $this->Data($request);
        return redirect('/manage/student')->with('message', 'Data Stored Successfully!');

    }

    public function studentProfile($student){
        $student = Student::findOrFail($student);
        return view('student.student-profile',compact('student'));
    }

    public function studentEdit($student){
        $student = Student::findOrFail($student);
        $iClass = iClass::all();
        $sections = Section::select('id','name')->where('class_id',$student->class_id)->get();
        return view('student.edit',compact('student','iClass','sections'));
    }

    public function studentUpdate(Request $request,$student){
        $student = Student::where('id', $student)->first();
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'fathername' => 'required',
            'fatherphoneno' => 'required',
            'idcard' => 'required',
            'photo' => 'sometimes|file|image|max:300',
            'class_id' => 'required',
            'enrollmentDate' => 'required',
        ];

        $data['gender'] = $request->get('gender');
        $data['dob'] = $request->get('dob');
        $data['address'] = $request->get('address');
        $data['fathername'] = $request->get('fathername');
        $data['fatherphoneno'] = $request->get('fatherphoneno');
        $photo = $this->storeImage();
        if(!empty($photo)){
            $data['photo']=$photo;
        }
        $data['note'] = $request->get('note');
        $data['idcard'] = $request->get('idcard');
        $data['class_id'] = $request->get('class_id');



        $student->fill($data);
        if($student->user){
            $student->user->name = $request->get('name');
            $student->user->email = $request->get('email');
            $student->user->save();
        }
//      $teacher->user_id = $user->id;
        $student->save();

        return redirect('/manage/student')->with('message','Data Updated Successfully!');
    }


    private function storeImage()
    {
        if (request()->has('photo')) {
            $path = request()->file('photo')->store('students', 'public');
            return $path;
        }
    }

    public function deleteStudent($id){
        $student = DB::select(
            "DELETE students,users FROM `students` JOIN users on students.user_id=users.id WHERE students.id=$id"
        );
        return redirect('/manage/student')->with('deleteMessage','Student Deleted Successfully');

    }

    public function Data(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'fathername' => 'required',
            'fatherphoneno' => 'required',
            'idcard' => 'required',
            'photo' => 'sometimes|file|image|max:300',
            'class_id' => 'required',
            'enrollmentDate' => 'required',
        ]);

        $studentname = $request->input('name');
        $studentusername = $request->input('username');
        $studentpassword = bcrypt($request->input('password'));
        $studentEmail = $request->input('email');

        $user = User::create(
            [
                'role_id' => '3',
                'name' => $studentname,
                'username' => $studentusername,
                'email' => $studentEmail,
                'password' => bcrypt($studentpassword),
                'active' => 1
            ]
        );


        $student = new Student();
        $student->gender = $request->input('gender');
        $student->dob = $request->input('dob');
        $student->address = $request->input('address');
        $student->photo = $this->storeImage();
        $student->fathername = $request->input('fathername');
        $student->fatherphoneno = $request->input('fatherphoneno');
        $student->note = $request->input('note');
        $student->idcard = $request->input('idcard');
        $student->user_id = $user->id;
        $student->class_id = $request->input('class_id');
        $student->section_id = $request->input('section');
        $student->enrollmentDate = $request->input('enrollmentDate');

        $student->save();

    }


}
