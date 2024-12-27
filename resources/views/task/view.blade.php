@extends('layouts.app')
@section('content')

<div class="task_table">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                
                <h3 class="text-center">View Task</h3>
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
                        {{-- <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$token->name}}</td>
                            <td>{{$token->amount ?? "None"}}</td>
                            <td>{{$token->straight_amount ?? "None"}}</td>
                            <td>{{$token->rumble_amount ?? "None"}}</td>
                            <td>
                                <a href="{{route('task.edit',$token->id)}}" class="text-info">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{route('task.delete',$token->id)}}" class="text-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection