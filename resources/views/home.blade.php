@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif



            <div class="card">

                <div class="card-header">Dashboard
                  <a class="btn btn-primary btn-sm float-right" href="/task/create/">Add New</a>
                </div>

                <div class="card-body">
                  <table class="table table-striped table-bordered">
                    <tr>
                      <th>Sn.</th>
                      <th>Task</th>
                      <th class="text-center">Status</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($tasks as $key => $task)
                    <tr>
                      <td width="30">{{ $key+1 }}</td>
                      <td>{{ $task->name }}</td>
                      <td class="text-center">

                        @if ($task->status == 0)
                          <span class="badge badge-danger px-3 py-1">Set</span>
                        @elseif ($task->status == 1)
                          <span class="badge badge-info px-3 py-1">Start</span>
                        @else
                          <span class="badge badge-success px-3 py-1">Finish</span>
                        @endif
                      </td>
                      <td width="180">
                        <a class="btn btn-danger btn-sm float-right text-light" data-toggle="modal" data-target="#delete">Delete</a>
                        <a class="btn btn-info btn-sm float-right mx-1 text-light" href="/task/edit/{{ $task->id }}">Edit</a>
                        <a class="btn btn-primary btn-sm float-right text-light" href="/task/show/{{ $task->id }}">View</a>

                      </td>
                    </tr>
                    @endforeach
                  </table>


                  <!-- Task Delete Modal -->
                  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Do you want to delete this task?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                          <a href="/task/delete/{{ $task->id }}" class="btn btn-primary btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
