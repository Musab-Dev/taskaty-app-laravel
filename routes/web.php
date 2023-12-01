<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tasks', function () {
    return view('index', [
    'page_title' => 'Home',
    'tasks' => Task::latest()->paginate(10),
]);
})->name('tasks.index');

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('tasks/create', function () {
    return view('create', [
        'page_title' => 'Add New Task',
    ]);
})->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'page_title' => 'Edit Task',
        'task'=> $task,
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'page_title' => $task->title,
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title'  => 'required|unique:tasks,title|max:255',
        'description'=> 'required',
        'long_description' => 'nullable',
    ]);
    Task::create($data);
    return redirect()->route('tasks.index')->with('success','task added successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}/update', function (Task $task, Request $request) {
    $data = $request->validate([
        'title'  => 'required|unique:tasks,title,'. $task->id .'|max:255',
        'description'=> 'required',
        'long_description' => 'nullable',
    ]);
    Task::firstOrFail('id', $task->id)->update($data);
    return redirect()->route('tasks.show', ['task' => $task])->with('success','task updated successfully!');
})->name('tasks.update');

Route::put('tasks/{task}/toggle_completeness', function (Task $task) {
    $task->is_completed = !$task->is_completed;
    $task->save();

    return redirect()->route('tasks.show', ['task' => $task])->with('success','task status updated successfully!');
})->name('tasks.toggle_completeness');

Route::delete('tasks/{task}/delete', function (Task $task) {
    //Task::destroy($task->id);
    $task->delete();
    return redirect()->route('tasks.index')->with('success','task deleted successfully!');
})->name('tasks.destroy');
