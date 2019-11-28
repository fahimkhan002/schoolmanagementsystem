<?php

namespace App\Http\Controllers;

use App\iClass;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function dashboard(){
        $teachers = User::where('role_id','2')->count();
        $students = User::where('role_id','3')->count();
        $iClasses = DB::table('classes')->count();
        //$subjects = Subject::where('id')->count();
        $subjects = DB::table('subjects')->count();
        return view('layouts.master',compact('students','teachers','iClasses','subjects'));
    }
}
