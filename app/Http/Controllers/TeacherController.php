<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function getTeacher(){
        $users = User::all();
        $teachers = Teacher::all();
        return view('teacher.show-teacher',compact('users','teachers'));
    }

    public function createTeacher(){
        $teacher = null;
        return view('teacher.create',compact('teacher'));
    }

    public function storeTeacher(Request $request){

        $rules = [
            'name' => 'required',
            'id_card' => 'required|max:255',
            'designation' => 'required',
            'qualification' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'joining_date' => 'required',
            'photo' => 'sometimes|file|image|max:300'
        ];

        $this->validate($request, $rules);

        $teachername = $request->input('name');
        $teacherusername = $request->input('username');
        $teacherpassword = bcrypt($request->input('password'));
        $teacherEmail = $request->input('email');
        $teacherRoleID= 2;

        $user = User::create(
            [
                'role_id' => '2',
                'name' => $teachername,
                'username' => $teacherusername,
                'email' => $teacherEmail,
                'password' => bcrypt($teacherpassword),
                'active' => '1',
            ]
        );

        $teacher = new Teacher();
        $teacher->id_card = $request->input('id_card');
        $teacher->designation = $request->input('designation');
        $teacher->qualification = $request->input('qualification');
        $teacher->dob = $request->input('dob');
        $teacher->gender = $request->input('gender');
        $teacher->phone_no = $request->input('phone');
        $teacher->address = $request->input('address');
        $teacher->joining_date = $request->input('joining_date');
        $teacher->photo = $this->storeImage();
        $teacher->user_id = $user->id;
        $teacher->save();

        return redirect('/manage/teacher')->with('message','Data Stored Successfully!');
    }

    public function showTeacher($teacher){

        $teacher = Teacher::findOrFail($teacher);
        return view('teacher.teacher-profile',compact('teacher'));
    }


    public function editTeacher($teacher){
        $teacher = Teacher::findOrFail($teacher);
        return view('teacher.edit',compact('teacher'));
    }

    public function updateTeacher(Request $request,$id){
        $teacher = Teacher::where('teacher_id', $id)->first();

        $rules = [
            'name' => 'required',
            'id_card' => 'required|max:255',
            'designation' => 'required',
            'qualification' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'joining_date' => 'required',
            'photo' => 'sometimes|file|image|max:300'
        ];


        $data['id_card'] = $request->get('id_card');
        $data['designation'] = $request->get('designation');
        $data['qualification'] = $request->get('qualification');
        $data['dob'] = $request->get('dob');
        $data['gender'] = $request->get('gender');
        $data['phone_no'] = $request->get('phone');
        $data['address'] = $request->get('address');
        $data['joining_date'] = $request->get('joining_date');
       $photo = $this->storeImage();
        if(!empty($photo)){
            $data['photo']=$photo;
        }
        $teacher->fill($data);
        if($teacher->user){
            $teacher->user->name = $request->get('name');
            $teacher->user->email = $request->get('email');
            $teacher->user->save();
        }
//      $teacher->user_id = $user->id;
        $teacher->save();

        return redirect('/manage/teacher')->with('message','Data Updated Successfully!');
    }
    public function deleteTeacher($id){

        $teacher = DB::select(
            "DELETE teachers,users FROM `teachers` JOIN users on teachers.user_id=users.id WHERE teacher_id=$id"
        );
        return redirect('/manage/teacher')->with('deleteMessage','Teacher Deleted Successfully');
    }

    private function storeImage(){
            if(request()->has('photo'))
            {
                $path = request()->file('photo')->store('teachers','public');
                return $path;

            }
    }


}
