@extends('layouts.admin.admin_layout')
  @section('content')
      <div class="content-wrapper">
        <div id="content" class="p-4 p-md-5 pt-5">
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
               <tr>
                <th colspan="5"><h3>All Students</h3></th>
              </tr>
              <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Email</th>
                <th class="th-sm">Course Selection</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($teacher as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="assignsubject/{{ $user->id }}">Assign Subject</a></td>
                <td>Active</td>
                <td><button class="btn btn-primary btn-sm">Edit</button> | <button class="btn btn-danger btn-sm">Delete</button></td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>

              </tr>
            </tfoot>
          </table>
        </div>
      </div>
  @endsection
