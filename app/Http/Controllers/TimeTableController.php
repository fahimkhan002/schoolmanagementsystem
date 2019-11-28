<?php

namespace App\Http\Controllers;

use App\iClass;
use App\Section;
use App\Subject;
use App\Teacher;
use App\Timetable;

use Cassandra\Time;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TimeTableController extends Controller
{
    public function getTimeTable(){
        $iClass = iClass::all();
        $sections = Section::all();
        return view('timetable.show',compact('iClass','sections'));
    }

    public function createTimeTable(){
        $iClass = iClass::all();
        $section = Section::all();
        $subject = Subject::all();
        $teacher = Teacher::all();

        return view('timetable.create',compact('iClass','section','teacher','subject'));
    }

    public function storeTimeTable(Request $request,Timetable $timetable)
    {

        $condition = request()->except(['_token']);
        //dd(collect($condition));


        if($request->ajax()) {
            $rules = array(
                'class_id.*' => 'required',
                'section_id.*' => 'required',
                'subject_id.*'=>'required',
                'teacher_id.*' => 'required',
                'days.*' => 'required',
                'Start_Time.*' => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error' => $error->errors()->all()
                ]);
            }

            $class_id = $request->class_id;
            $section_id = $request->section_id;
            $subject_id = $request->subject_id;
            $teacher_id = $request->teacher_id;
            $days = $request->days;
            $start_time = $request->Start_Time;

            for ($count = 0; $count < count($class_id); $count++) {
                $data = array(
                    'class_id' => $class_id[$count],
                    'section_id' => $section_id[$count],
                    'subject_id'=>$subject_id[$count],
                    'teacher_id' => $teacher_id[$count],
                    'days' => $days[$count],
                    'Start_Time' => $start_time[$count],
                );
                $insert_data[] = $data;

            }


            if($timetable->alreadyHas($condition)){
                return response()->json([
                    'error' => 'Record Already Exist!'
                ]);
            }


            for($count=0;$count<count($insert_data);$count++){
                if($timetable->alreadyHas($insert_data[$count])){
                    return response()->json([
                        'error' => 'Record Already Exist!'
                    ]);
                }
            }

            for ($i = 0; $i < count($insert_data) - 1; $i ++) {

                for ($j = $i + 1; $j < count($insert_data); $j++) {

                    if($insert_data[$i]['class_id']==$insert_data[$j]['class_id']&&
                        $insert_data[$i]['section_id']==$insert_data[$j]['section_id']&&
                        $insert_data[$i]['subject_id']==$insert_data[$j]['subject_id']&&
                        $insert_data[$i]['teacher_id']==$insert_data[$j]['teacher_id']&&
                        $insert_data[$i]['days']==$insert_data[$j]['days']&&
                        $insert_data[$i]['Start_Time']==$insert_data[$j]['Start_Time']
                    ){
                        return response()->json([
                            'error' => '    Same Record Cannot be inserted!'
                        ]);
                    }

                }

            }

            for ($i = 0; $i < count($insert_data) - 1; $i ++) {

                for ($j = $i + 1; $j < count($insert_data); $j++) {

                    if($insert_data[$i]['teacher_id']==$insert_data[$j]['teacher_id']&&
                        $insert_data[$i]['days']==$insert_data[$j]['days']&&
                        $insert_data[$i]['Start_Time']  ==$insert_data[$j]['Start_Time']  ) {
                        return response()->json([
                            'error' => 'Teacher Cannot be in 2 classes at same time! please change teacher or change time or day!'
                        ]);
                    }
                }

            }

            $toInsert= array_map("unserialize", array_unique(array_map("serialize", $insert_data)));
            Timetable::insert($toInsert);
                return response()->json([
                    'success' => 'Data Added successfully.',
                    'redirect' => url('/manage/timetable'),
                ]);

            }

        return redirect('/manage/timetable')->with('message','Data Added Successfully!');

    }

    public function showtimetable(Request $request){

        $subject = Subject::all();

        $monday = Timetable::where('days', '=', 1)->get();
        $tuesday = Timetable::where('days','=',2)->get();
        $wednesday = Timetable::where('days','=',3)->get();
        $thursday = Timetable::where('days','=',4)->get();
        $friday = Timetable::where('days','=',5)->get();



        return view('timetable.class-timetable',compact('monday','tuesday','wednesday','thursday','friday'));
    }

    public function findSection(Request $request)
    {
        $data = Section::select('name', 'id')->where('class_id', $request->id)->take(100)->get();
        return response()->json($data);
    }

    public function findTimetable(Request $request)
    {
        $data = Timetable::select('id','class_id','teacher_id','subject_id','days')->where([
            ['class_id', '=', $request->class_id],
            ['section_id', '=', $request->section_id],

        ])->with('iClass')
            ->with('teacher.user')
            ->with('subject')
            ->get();

        //dd($data);
        return response()->json($data);
    }

}
