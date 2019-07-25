@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          





            <div class="card">

                <div class="card-header">
                  Task Detail
                </div>

                <div class="card-body">
                  <table>
                    <tr>
                      <td>Task Name </td>
                      <td>:</td>
                      <td>{{ $task->name }}</td>
                    </tr>
                    <tr>
                      <td>Task Description </td>
                      <td>:</td>
                      <td>{{ $task->description }}</td>
                    </tr>
                    <tr>
                      <td>Task Status </td>
                      <td>:</td>
                      <td>
                        @if ($task->status == 0) Set
                        @elseif ($task->status == 1) Start
                        @else Finish
                        @endif
                      </td>
                    </tr>
                    @if ($task->status > 0)
                      <tr>
                        <td>Task Start </td>
                        <td>:</td>
                        <td>{{ $task->start_at  }}</td>
                      </tr>
                    @endif
                    @if ($task->status == 2)
                      <tr>
                        <td>Task End </td>
                        <td>:</td>
                        <td>{{ $task->end_at  }}</td>
                      </tr>
                    @endif
                  </table>
                  <a class="btn btn-primary btn-sm float-right" href="/home">Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
