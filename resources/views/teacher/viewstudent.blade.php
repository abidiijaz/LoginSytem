@extends('layouts.teacher.teacher_layout')
@section('content')
    <div class="content-wrapper">


        <div id="content" class="p-4 p-md-5 pt-5">
       <h2>Your Class Students</h2>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tr class="bg-info">
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($s_student as $student)
                        @foreach($student as $kid)
                        <tr>
                            <td>{{$kid->name }}</td>
                            <td>{{$kid->email }}</td>
                        </tr>
                        @endforeach
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
