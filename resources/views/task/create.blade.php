@extends('layouts.app')
@section('content')

<div class="task_table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="from-area w-50 m-auto p-3 rounded shadow bg-white">
                    <h3 class="task-btn text-center">Create Task</h3>
                    <hr>
                    <form action="{{route('task.create')}}" method="POST" class="">
                        @csrf
                        
                        <div class="form-group">
                            <label>Task</label>
                            <input type="text" class="form-control required" name="task" placeholder="Task">
                            @if ($errors->has('task'))
                                <span class="error text-danger">{{ $errors->first('task') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control required" name="desc" placeholder="Description">
                        </div>
                      
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="start_date">
                            @if ($errors->has('start_date'))
                                <span class="error text-danger">{{ $errors->first('start_date') }}</span>
                            @endif
                        </div>
    
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="end_date">
                            @if ($errors->has('end_date'))
                                <span class="error text-danger">{{ $errors->first('end_date') }}</span>
                            @endif
                        </div>
    
                        <button type="submit" class="btn btn-primary m-auto text-center d-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection