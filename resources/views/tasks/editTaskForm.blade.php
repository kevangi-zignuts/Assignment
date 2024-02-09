<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap-4.0.0-dist/css/bootstrap.css">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <body>
        <h1 class="text-center h1">Add A New Task</h1>
        <div class="mx-auto" style="width: 70%;">
            <form action="{{ url('tasks/update/') }}/{{ $task->tasks_id }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" value="{{ $task->id }}" name="tasks_id">
                <div class="form-group">
                    <label>Enter Task Name</label>
                    <input type="text" name="taskname" class="form-control" value="{{ $task->taskname }}">
                </div>
                <div class="form-group">
                    <label>Duedate</label>
                    <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Add Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name='users_id' value="{{ Auth::id() }}">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ dd('here') }}
                        {{ session('success') }}
                    </div>
                @endif

                <div class="d-grid gap-2 d-md-block">
                    <button type="submit" class="btn btn-primary px-2 ml-1">Update</button>
                    <a href="{{ url('tasks/') }}/index" class="btn btn-primary px-2 ml-1" role="button">View All
                        Task</a>
                </div>
            </form>
        </div>
    </body>
</x-app-layout>

</html>
