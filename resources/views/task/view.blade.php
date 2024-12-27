@extends('layouts.app')
@section('content')

<div class="task_table">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">

                <div class="task-view shadow rounded">
                    <h3 class="text-center">View Task</h3>
                    <hr>

                    <div class="task-item">
                        <span>Task Name :</span>
                        <h5>{{$task->task}}</h5>
                    </div>

                    <div class="task-item">
                        <span>Description :</span>
                        <h5>{{$task->desc ?? "None"}}</h5>
                    </div>

                    <div class="task-item">
                        <span>Status :</span>
                        <h5><div class="badge">{{$task->status}}</div></h5>
                    </div>

                    <div class="task-item">
                        <span>Start Date :</span>
                        <h5>{{$task->start_date}}</h5>
                    </div>

                    <div class="task-item">
                        <span>End Date :</span>
                        <h5>{{$task->end_date}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection