@extends('layouts.teacher.teacher_layout')
  @section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 t">Welcome <span class="text-success">{{Auth::guard('teacher')->user()->name}}</span> On Teacher Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$numberofstudents}}</h3>

                                <p>Your Students</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

            <div id="content" class="p-4 p-md-5 pt-5">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr class="bg-info">
                        <th colspan="6"><h3>Your Class Is <span class="text-dark">{{ $className }}</span></h3></th>
                    </tr>
                    <tr>

                        <th class="th-sm">Subjects Name</th>
                        <th class="th-sm">Making Quiz</th>
                        <th class="th-sm">Making Assignment</th>
                        <th class="th-sm">Notes</th>
                        <th class="th-sm">Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($select_subjects as $select_subject)
                        <tr>
                            <td>{{$select_subject->subject_name}}</td>
                            <td> <a href="/teacher/quiz/{{$select_subject->id}}"><button class="btn btn-info">Add Quiz</button></a></td>
                            <td> <a href="/teacher/question/{{$select_subject->id}}"><button class="btn btn-info">Add Assignment</button></a></td>
                            <td><a href="#">Making Notes</a></td>
                            <td>Active</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Subject Name</th>
                        <th>Making Quiz</th>
                        <th>Making Assignment</th>
                        <th>Notes</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
    </div>
    <!-- /.content-wrapper -->



  @endsection
