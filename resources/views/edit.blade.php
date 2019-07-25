@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if ($errors->any())
            <div class="alert alert-danger mb-5">

                <ul class="list-group px-3 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li class="">{{ $error }}</li>
                    @endforeach
                </ul>

              </div>
            @endif

            
            <div class="card">
                <div class="card-header">Edit Task
                </div>

                <div class="card-body">
                  <form method="post" action="/task/update/">
                    @csrf
                    <input name="id" hidden value="{{ $task->id }}">
                    <div class="form-group">
                      <label>Task Name</label>
                      <input type="text" name="name" class="form-control" value="{{ $task->name }}" placeholder="Task Title">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" style="align:left;" name="description" rows="3" cols="">
                        {{ $task->description }}
                      </textarea>
                    </div>

                    <div class="form-group">
                      <label>Task Start</label>
                      @if ($task->start_at == null)
                        <input class="text-muted form-control" readonly value="Not start yet">
                      @else
                        <input class="text-muted form-control" readonly value="{{ $task->start_at }}">
                      @endif
                    </div>

                    <div class="form-group">
                      <label>Task End</label>
                      @if ($task->end_at == null)
                        <input class="text-muted form-control" readonly value="Not end yet">
                      @else
                        <input class="text-muted form-control" readonly value="{{ $task->start_at }}">
                      @endif
                    </div>
                    @php
                      $status= array('Set', 'Start', 'Finish');
                    @endphp
                    <div class="form-group">
                      <label>Task Status</label>
                      <select class="form-control" name="status">
                        @for ($i=$task->status; $i<3; $i++)
                          <option value="{{ $i }}">@php echo $status[$i]; @endphp
                          </option>
                        @endfor
                      </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
