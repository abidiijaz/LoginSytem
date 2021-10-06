<?php

namespace App\Http\Controllers\Admin;

use App\Class_enrollment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Book;
use App\Teacher;
use App\Course_selection;
use App\Assign_Subject;
use App\Classes;
use App\Subject;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
   public function index(){
        return view('admin.admin_dashboard');
    }
    public function login(Request $req){
       if($req->isMethod('post')){
            $data = $req->all();
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/admin/dashboard');
            }
       }
        return view('admin.admin_login');
    }
    public function Total_Students(){
        $users = User::all();
        return view('admin.admin_viewstudent',compact('users'));
    }
    public function CourseSelection($id){

        $user = User::where('id',$id)->first();
        $class = Classes::get();
        $check = Class_enrollment::where('student_id',$id)->first();
        return view('admin.admin_courseselection',compact('user','class','check'));
    }
    public function TotalTeacher(){
        $teacher = Teacher::all();
        return view('admin.admin_teacher',compact('teacher'));
    }

    public function AssignSubject($id){
        $teacher = Teacher::where('id',$id)->first();
        $class = Classes::get();
        $checks = Assign_Subject::where('teacher_id',$id)->first();
        return view('admin.admin_assignsubject',compact('teacher','class','checks'));
    }

    public function AssignClass(Request $req){

        $class_data = $req->all();
       $course = new Assign_subject();
       $course->teacher_id = $class_data['teacher_id'];
       $course->subject_id = $class_data['select'];
       $course->save();

       return redirect()->back();
    }
    public function ClassSubject(){
       $class = Classes::get();
            for($i=0; $i<sizeof($class); $i++){
                $subjects[$i] = $class[$i]->subjects;
                $class_n = $subjects[$i][0]->class_id;
                $c_name[$i] = Classes::find($class_n);
            }

       return view('admin.admin_classSubject',compact('class','subjects','c_name'));
    }
    public function AddClassName(Request $req){
        $classes = new Classes();
        $classes->class_name = $req->class_name;
        $classes->save();
        return redirect()->back();
    }
    public function AddSubject(Request $req){
       if($req->subject != null && $req->select != 0){
            $subject = new Subject();
            $subject->subject_name = $req->subject;
            $subject->class_id = $req->select;
            $subject->save();
            return redirect()->back()->with('Success','Entered Successfully New Subject');
       }else{
           return redirect()->back()->with('error', 'Please Enter Both Suject and class Names!');

       }

    }
    public function EnrollStudent(Request $req){

       $class_enroll = new Class_enrollment();
       $class_enroll->student_id = $req->student_id;
       $class_enroll->class_id = $req->select;
       $class_enroll->save();
        $users = User::all();
        return view('admin.admin_viewstudent',compact('users'));
    }
}
