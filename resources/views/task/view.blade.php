@extends('layouts.app')
@section('content')

<div class="task_table">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                
                
                {{-- <table class="table table-striped border">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Eend Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$task->task}}</td>
                        <td>{{$token->amount ?? "None"}}</td>
                        <td>{{$token->start_date ?? "None"}}</td>
                        <td>{{$token->end_date ?? "None"}}</td>
                        <td>
                            <a href="{{route('task.edit',$token->id)}}" class="text-info">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="{{route('task.delete',$token->id)}}" class="text-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                </table> --}}

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
                        <h5><div class="badge badge-primary">{{$task->status}}</div></h5>
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