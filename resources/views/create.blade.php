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
                <div class="card-header">Add Task
                </div>

                <div class="card-body">
                  <form method="post" action="/task/store/">
                    @csrf
                    <div class="form-group">
                      <label>Task Name</label>
                      <input type="text" name="name" class="form-control" value="" placeholder="Task Title">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" style="align:left;" name="description" rows="3" cols="">

                      </textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
