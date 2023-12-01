<div class="page-actions-container">
    @isset($task)
        <a class="page-action" href="{{ route('tasks.show', ['task' => $task]) }}"> ← Go back Task Details </a>
    @else
        <a class="page-action" href="{{ route('tasks.index') }}"> ← Go back to Taskaty List </a>
    @endisset
</div>

@section('title', isset($task) ? 'Edit Task' : 'Add New Task')

@section('content')
    <form method="post" action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('put')
        @endisset
        <div class="flex flex-col">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"
                class="input-field">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" class="input-field">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10" class="input-field">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-actions">
            <button type="submit" class="primary-btn mr-2">
                @isset($task)
                    Save Changes
                @else
                    Save Task
                @endisset
            </button>
            <a href="{{ isset($task) ? route('tasks.show', ['task' => $task]) : route('tasks.index') }}">Cancel</a>
        </div>
    </form>
@endsection
