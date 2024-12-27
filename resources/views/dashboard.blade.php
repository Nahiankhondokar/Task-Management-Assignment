@extends('layouts.app')

@section('content')
<div class="task_table">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                
                <h3 class="text-center">Task List</h3>
                <div class="create-btn my-2 float-right">
                    <a href="{{route('task.create')}}" class="task-btn">Create task</a>
                </div>
                <table class="table table-striped border">
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
                      @forelse($tasks as $key => $task)
                      <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$task->task}}</td>
                        <td>{{$task->desc ?? "None"}}</td>
                        <td>{{$task->start_date ?? "None"}}</td>
                        <td>{{$task->end_date ?? "None"}}</td>
                        <td>
                            <div class="actions">
                                <a href="" class="text-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="" class="text-info">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="" class="text-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                      </tr>
                      @empty 
                      <tr>
                        <th scope="row">No Data</th>
                      </tr>
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>

    .task_table {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;

    }
    .task-btn {
        background: rgb(1, 63, 63);
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        font-size: 20px;
        color: white;
        border: 2px solid #1b94c5;
    }

    a.task-btn:hover {
        text-decoration: none;
        background: rgba(1, 63, 63, 0.671);
        color: white
    }
</style>
@endsection
