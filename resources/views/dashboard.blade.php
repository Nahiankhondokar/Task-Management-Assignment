@extends('layouts.app')

@section('content')
<div class="task_table">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                
                <h3 class="text-center">Task List</h3>
                <div class="create-btn my-2 float-right rounded">
                    <a href="{{route('task.status', "Pending")}}" class="btn btn-sm btn-info">Pending</a>
                    <a href="{{route('task.status', "In Progress")}}" class="btn btn-sm btn-primary">In Progress</a>
                    <a href="{{route('task.status', "Completed")}}" class="btn btn-sm btn-success">Completed</a>
                    <a href="" class="sort-by-date rounded">Sort By End Date</a>
                    <a href="{{route('task.create')}}" class="task-btn">Create task</a>
                </div>
                <table class="table table-striped border">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Description</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($tasks as $key => $task)
                      <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$task->task}}</td>
                        <td>{{$task->desc ?? "None"}}</td>
                        <td>{{$task->start_date ?? "None"}}</td>
                        <td>{{$task->end_date ?? "None"}}</td>
                        <td>
                            <div class="badge badge-info">{{$task->status ?? "None"}}</div>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{route('task.show', $task->id)}}" class="text-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{route('task.edit', $task->id)}}" class="text-info">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{route('task.delete', $task->id)}}" class="text-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                      </tr>
                      @empty 
                      <tr>
                        <th scope="row" colspan="7" class="text-danger">No Data</th>
                      </tr>
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
