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
        <div class="mx-auto" style="width: 60%;">
            <h1 class="text-center h1">All Task Details</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Task Name</th>
                        <th scope="col">Due Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->taskname }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td><a href="{{ url('tasks/task/') }}/{{ $task->tasks_id }}"
                                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View</a>
                            </td>
                            <td><a href="{{ url('tasks/edit/') }}/{{ $task->tasks_id }}"
                                    class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('tasks/delete/') }}/{{ $task->tasks_id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    {{-- {{ dd('here') }} --}}
                                    <button type="submit" class="btn btn-link">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ url('tasks/') }}/create" class="btn btn-primary" role="button">Add New Task</a>

        </div>
    </body>
</x-app-layout>

</html>
