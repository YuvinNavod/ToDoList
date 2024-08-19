@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">My Todo List</h1>
        </div>
        <div class = "col-lg-12 mt-5">
            <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div calss ="form-group">
                            <input class="form-control" name="title" type="text" placeholder="Enter task" >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-striped table-primary">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key =>$task)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->title }}</td>
                            <td>
                                @if ($task->done == 0)
                                    <span class="badge text-bg-danger">Pending</span>
                                @else
                                    <span class="badge text-bg-success">Completed</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('todo.delete', $task->id )}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="{{ route('todo.done', $task->id )}}" class="btn btn-success"><i class="fa-solid fa-circle-check"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .page-title {
        padding-top: 5vh;
        font-size: xxx-large;
        color: rgb(13 110 253);
    }
</style>
@endpush
