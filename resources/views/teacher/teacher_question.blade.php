  @extends('layouts.teacher.teacher_layout')
  @section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <div id="content" class="p-4 p-md-5 pt-5">
       <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>

<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalTable">
  Add Questions
</button>
        <div class="table-responsive">
        <table class="table table-borderless">
           <tr>
                <th colspan="6" style="text-align: center; font-size: 30px;">{{$data->title}}</th>
           </tr>
           <tr class="bg-info">
            <th scope="col">Question Title</th>
            <th scope="col">Option 1</th>
            <th scope="col">Option 2</th>
            <th scope="col">Option 3</th>
            <th scope="col">Option 4</th>
            <th scope="col">Correct Option</th>
            <th scope="col">Actions</th>
          </tr>
          <tbody>
              @foreach($questions as $question)
                <tr>
                  <th>{{ $question->question }}</th>
                  <td>{{ $question->option_1 }}</td>
                  <td>{{ $question->option_2 }}</td>
                  <td>{{ $question->option_3 }}</td>
                  <td>{{ $question->option_4 }}</td>
                  <td>{{ $question->correct_answer }}</td>
                  <td><button class="btn btn-primary btn-sm">Edit</button> | <button class="btn btn-danger btn-sm">Delete</button></td>
                </tr>
              @endforeach
          </tbody>
        </table>
          </div>
          </div>



  <!--  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalTable">
  Add Quizzes
</button> -->
        <div id="modalTable" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="post" action="{{url('teacher/question')}}">
                @csrf()
                <div class="form-group">

                    <input type="hidden" name="id" value="{{ request()->id }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <input type="hidden" name="book_id" value="{{ $data->book_id }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Question Title</label>
                  <input type="text" name="q_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Option 1</label>
                  <input type="text" name="q_1" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Option 2</label>
                  <input type="text" name="q_2" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Option 3</label>
                  <input type="text" name="q_3" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Option 4</label>
                  <input type="text" name="q_4" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Answer</label>
                     <input type="text" name="answer" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
      </div>
  @endsection
