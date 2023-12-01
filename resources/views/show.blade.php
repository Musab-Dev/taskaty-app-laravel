@extends('layouts.app')

<div class="page-actions-container">
    <a class="page-action" href="{{ route('tasks.index') }}"> ← Go back to Taskaty List </a>
</div>

@section('title', $task->title)

@section('content')
    <div class="text-xs">
        added <span class="time-card">{{ $task->created_at->diffForHumans() }}</span> •
        updated <span class="time-card">{{ $task->updated_at->diffForHumans() }}</span>
    </div>
    <div>
        @if ($task->is_completed)
            <p class="task-status">Completed</p>
        @else
            <p class="task-status">Not Completed</p>
        @endif
    </div>
    <div class="text-justify"><b>discription:</b> {{ $task->description }}</div>
    @isset($task->long_description)
        <div class="text-justify mt-2"><b>long discription:</b> {{ $task->long_description }}</div>
    @endisset

    <div class="form-actions flex space-x-2">
        <form method="post" action="{{ route('tasks.toggle_completeness', ['task' => $task]) }}">
            @csrf
            @method('put')
            <div>
                <button type="submit" class="primary-btn">
                    @if ($task->is_completed)
                        Mark as Incomplete
                    @else
                        Mark as Completed
                    @endif
                </button>
            </div>
        </form>
        <form method="GET" action="{{ route('tasks.edit', ['task' => $task]) }}">
            @csrf
            <div>
                <button type="submit" class="primary-btn-outline">Edit Task</button>
            </div>
        </form>
        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
            @csrf
            @method('delete')
            <div>
                <button type="submit" class="danger-btn-outline">Delete Task</button>
            </div>
        </form>
    </div>

@endsection
