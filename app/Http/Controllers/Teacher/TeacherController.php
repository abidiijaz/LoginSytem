<?php

namespace App\Http\Controllers\Teacher;

use App\Class_enrollment;
use App\Classes;
use App\Http\Controllers\Controller;
use App\Subject;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use App\Quiz;
use DB;
use App\Question;

use App\Assign_Subject;
use phpDocumentor\Reflection\Types\Array_;

class TeacherController extends Controller
{
   public function index(){
       $user = Auth::guard('teacher')->user()->id;
       $check = Assign_Subject::where('teacher_id',$user)->first();
       if($check == null){
           return view('teacher.teacher_dashboard')->with('msg','Your not Assign Yet any Class! Thank you,');
       }else{
            $class_id = $check->subject_id;
            $get_students = Class_enrollment::where('class_id',$class_id)->get();
            $numberofstudents = sizeof($get_students);
            $class = Classes::where('id', $class_id)->first();
            $className = $class->class_name;
            $select_subjects = Subject::where('class_id',$class_id)->get();
            return view('teacher.teacher_dashboard',compact('className','select_subjects','numberofstudents'));
       }
    }
    public function login(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            if(Auth::guard('teacher')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/teacher/dashboard');
            }
        }
        return view('teacher.teacher_login');
    }
    public function Logout(){
        Auth::guard('teacher')->logout();
        return redirect('/teacher');
    }
    public function Quiz($id){

        $user_id = Auth::guard('teacher')->user()->id;
        $quizes = Quiz::where('user_id',$user_id)->where('book_id',$id)->get();
        return view('teacher.quiz',compact('quizes'));

    }
    public function AddQuiz(Request $req){

        $data = $req->all();
        $user_id = Auth::guard('teacher')->user()->id;
        $quiz = new Quiz();
        $quiz->title = $data['q_title'];
        $quiz->desc = $data['q_desc'];
        $quiz->number_of_question = $data['q_number'];
        $quiz->passing_marks = $data['q_passing'];
        $quiz->publish = 1;
        $quiz->book_id = $data['book_id'];
        $quiz->user_id = $user_id;
        $quiz->save();
        return redirect()->back();
    }
    public function deleteQuiz($id){
        DB::table('quizs')->where('id', $id)->delete();
        return redirect()->back();
    }
    public function quizLink($id){
        $data = Quiz::where('id',$id)->first();
        $questions = Question::where('quiz_id',$id)->get();
        return view('teacher.teacher_question',compact('data','questions'));
    }
    public function addQuestion(Request $req){
        $data = $req->all();
        $question = new Question();
        $question->quiz_id = $data['id'];
        $question->book_id = $data['book_id'];
        $question->question = $data['q_title'];
        $question->option_1 = $data['q_1'];
        $question->option_2 = $data['q_2'];
        $question->option_3 = $data['q_3'];
        $question->option_4 = $data['q_4'];
        $question->correct_answer = $data['answer'];
        $question->save();

        return redirect()->back();
    }
    public function ViewVtudents(){

        $teacher = Auth::guard('teacher')->user()->id;
        $classId = Assign_subject::where('teacher_id',$teacher)->first();
        $students = Class_enrollment::where('class_id',$classId->subject_id)->get('student_id');
        $s_student=array();
        for($i=0;$i<sizeof($students);$i++){
             array_push($s_student,User::where('id',$students[$i]->student_id)->get());
        }
        return view('teacher/viewstudent',compact('s_student'));
    }
}
