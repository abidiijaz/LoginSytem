@extends('layouts.admin.admin_layout')
@section('content')
    <div class="content-wrapper">
<div class="row" style="margin-right: 0px !important;margin-left: 0px !important;">
<div class="col-md-12">
    <div class="col-md-6" style="float: left">
        <!-- general form elements -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add New Classes</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/admin/addClassName">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Class Name</label>
                        <input type="text" name="class_name" class="form-control" placeholder="Enter Class Name">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Add Class</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
        <div class="col-md-6" style="float: right">

            <!-- general form elements -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add New Subjects</h3>

                </div>
                @if(Session::has('Success'))
                    <p class="text-success" style="text-align: center;margin:10px">{{ Session::get('Success') }}</p>
                @endif
                @if(Session::has('error'))
                    <p class="text-danger" style="text-align: center;margin:10px">{{ Session::get('error') }}</p>
            @endif
            <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="/admin/addsubject">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subject Name</label>
                            <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Enter Subject Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Choose Class</label>
                            <select name="select" id="select" class="form-control">
                                <option value="0">Please select</option>
                                @foreach($class as $name)
                                    <option value="{{$name->id}}">{{$name->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Add Subject</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
</div>
</div>
        <div class="row" style="margin-right: 0px !important;margin-left: 0px !important;">
            <div class="col-md-12">

                <div class="card card-info">
                    <div class="card-header">
                        <strong class="card-title">Classes And Subjects</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-active">
                            <thead>
                            <tr>
                                <th scope="col">Class Name</th>
                                <th scope="col">Book 1</th>
                                <th scope="col">Book 2</th>
                                <th scope="col">Book 3</th>
                                <th scope="col">Book 4</th>
                                <th scope="col">Book 5</th>
                                <th scope="col">Book 6</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<sizeof($subjects); $i++)
                                    <tr>
                                        <th>{{$c_name[$i]->class_name}}</th>
                                    @foreach($subjects[$i] as $subject)
                                            <td>{{$subject->subject_name}}</td>
                                    @endforeach
                                        <th><button class="btnb btn-info btn-sm">Edit</button> | <button class="btn btn-danger btn-sm">Del</button></th>
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
