<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Tasks</title>
    <link rel="stylesheet" href="/bootstrap-4.0.0-dist/css/bootstrap.css">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <body>
        <div class="mx-auto" style="width: 70%;">
            <h1 class="text-center h1">Task Details</h1>
            <div class="card">
                <div class="card-header">
                    <h2>{{ $task->taskname }}</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <h5 class="card-title">Due Date</h5>
                    <p class="card-text">{{ $task->due_date }}</p>

                </div>
            </div>

            <div class="d-flex flex-row p-3">
                <a href="{{ url('tasks/edit/') }}/{{ $task->tasks_id }}" class="btn btn-primary px-2 ml-1"
                    tabindex="-1" role="button">Edit</a>
                <a href="{{ url('/tasks') }}/index" class="btn btn-primary px-2 ml-1" role="button">View All Task</a>
                <form action="{{ url('tasks/delete/') }}/{{ $task->tasks_id }}" method="post">
                    @csrf
                    @method('DELETE')
                    {{-- {{ dd('here') }} --}}
                    <button type="submit" class="btn btn-primary px-2 ml-1">Delete Task</button>
                </form>
            </div>
        </div>


    </body>
</x-app-layout>

</html>
