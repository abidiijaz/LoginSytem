@extends('layouts.students.student_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-12">
            <h1 class="m-0">Welcom <span class="text-success">{{Auth::user()->name}}</span> To Online Learning Management System</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

      <div id="content" class="p-4 p-md-5 pt-5">
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
              <tr class="bg-info">
                  <th colspan="6"><h3>Your Class Is <span class="text-dark">{{$class_name->class_name}}</span></h3></th>
              </tr>
              <tr>
                  <th class="th-sm">Subjects Name</th>
                  <th class="th-sm">Quiz</th>
                  <th class="th-sm">Assignment</th>
                  <th class="th-sm">Notes</th>
              </tr>
              </thead>
              <tbody>


                    @foreach($subjects as $subject)
                          <tr>
                              <td>{{$subject->subject_name}}</td>
                              <td> <a href="/student/quiz/{{$subject->id}}" class="btn btn-info  position-relative">
                                         @foreach($a as $b)
                                            @foreach($b as $c)
                                              @if($c->book_id == $subject->id)
                                                  {{$c->book_id}}
                                              @endif
                                            @endforeach
                                        @endforeach
                                            Take Quiz <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">99+</span></a></td>
                              <td> <a href="/teacher/question/"><button class="btn btn-info">Upload Assignment</button></a></td>
                              <td><a href="#">View Notes</a></td>
                          </tr>
                    @endforeach

              </tbody>
              <tfoot>
              <tr>
                  <th>Subjects Name</th>
                  <th>Quiz</th>
                  <th>Assignment</th>
                  <th>Notes</th>
              </tr>
              </tfoot>
          </table>
      </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
