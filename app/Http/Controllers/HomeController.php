<?php

namespace App\Http\Controllers;

use App\Class_enrollment;
use App\Classes;
use App\Quiz;
use App\Subject;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $student_id = Auth::user()->id;
        $enroll = Class_enrollment::where('student_id',$student_id)->first('class_id');
        $subjects = Subject::where('class_id',$enroll->class_id)->get();
        $class_name = Classes::where('id',$enroll->class_id)->first();
        $a[]='';
        for($i=0; $i<sizeof($subjects); $i++){
            $a[$i] = isset($subjects[$i]->quizes) ? $subjects[$i]->quizes : "";
//            $a[$i] = $subjects[$i]->quizes;
        }

//        $q = array();
//        for($i=0; $i<sizeof($subjects); $i++){
//
//            array_push($q,Quiz::where('book_id',$subjects[$i]->id)->get());
//        }
//        for($j=0; $j<sizeof($q); $j++){
//            for ($k=0; $k==0; $k++){
//                if ( !isset($q[$j][$k]->id)) {
//
//                    $q[$j][$k] = null;
//                }
//                print_r($q[$j][$k]->id);
//
//            }
//
//        }

        return view('home',compact('subjects','class_name','a'));
    }

}
