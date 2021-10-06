@extends('layouts.admin.admin_layout')
  @section('content')
      <div class="content-wrapper">
          <div class="row" style="margin-right: 0px !important;margin-left: 0px !important;">
              <div class="col-md-12 ">
                  {{--      @foreach($user as $person)--}}
                  {{--        <h3>The Course already Selected for this user <span class="text-light bg-danger">{{$person->name}}</span></h1>--}}
                  {{--      @endforeach--}}
                  <form action="/admin/enrollstudent" method="post" class="form-horizontal">
                      @csrf
                      <div class="col-lg-6 m-auto p-3">
                          <div class="card">
                              <div class="card-header">
                                  <h3>Course Selection</h3>
                              </div>
                              <div class="card-body card-block">
                                      <div class="row form-group">
                                          <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Student Name</label></div>
                                          <div class="col-12 col-md-9"><input type="text" id="hf-email"  value="{{$user->name}}" class="form-control" readonly></div>
                                          <div class="col-12 col-md-9"><input type="hidden"  name="student_id" value="{{$user->id}}" class="form-control"></div>
                                      </div>
                                      <div class="row form-group">
                                          <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Class Name</label></div>
                                          <div class="col-12 col-md-9">
                                              <select name="select" id="select" class="form-control">
                                                  <option value="0">Please select</option>
                                                  @foreach($class as $name)
                                                      <option value="{{$name->id}}">{{$name->class_name}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                              </div>
                              <div class="card-footer">
                                  @if($check === null)
                                      <button type="submit" class="btn btn-primary btn-sm" >
                                          <i class="fa fa-dot-circle-o"></i> Register Student
                                      </button>
                                  @else
                                      <button  class="btn btn-danger btn-sm" disabled>
                                          <i class="fa fa-dot-circle-o"></i>Class Assigned Already
                                      </button>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  @endsection
