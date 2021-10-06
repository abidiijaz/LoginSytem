@extends('layouts.teacher.teacher_layout')
  @section('content')
      <div class="content-wrapper">



      <div id="content" class="p-4 p-md-5 pt-5">
       <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>

<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalTable">
  Add Quizzes
</button>
        <div id="modalTable" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Quizs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="post" action="{{url('teacher/quiz')}}">
                @csrf()
          <div class="form-group">
              <input type="hidden" name="book_id" class="form-control" value="{{ request()->id }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <label for="exampleInputEmail1">Quiz Title</label>
            <input type="text" name="q_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Quiz Description</label>
            <input type="text" name="q_desc" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Totall Number of Quizzes</label>
            <input type="text" name="q_number" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Passing Marks</label>
            <input type="text" name="q_passing" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <script>
          var $table = $('#table')

          $(function() {
            $('#modalTable').on('shown.bs.modal', function () {
              $table.bootstrapTable('resetView')
            })
          })
        </script>

        <div class="table-responsive">

        <table class="table table-borderless">
           <tr class="bg-info">
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Totall Questions</th>
        <th scope="col">Passing Marks</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

       @foreach($quizes as $quiz)
      <tr>
        <td><a href="/teacher/question/{{$quiz->id}}"> {{ $quiz->title }}</a></td>
        <td>{{$quiz->desc }}</td>
        <td>{{$quiz->number_of_question}}</td>
        <td>{{$quiz->passing_marks}}</td>
        <td>{{$quiz->publish}}</td>
        <td><button class="btn btn-primary btn-sm">Edit</button> | <a href="/teacher/deletequiz/{{$quiz->id}}"><button class="btn btn-danger btn-sm">Delete</button></a></td>
      </tr>
     @endforeach

    </tbody>
        </table>
      </div>
      </div>
      </div>

  @endsection
