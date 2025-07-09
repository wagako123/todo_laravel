<?php

use App\Http\Requests\TaskRequest;
use App\Http\Requests\JournalRequest;
use App\Models\Task;
use App\Models\Journal;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function (){
    return redirect()->route('tasks.index');

});
Route::get('/tasks', function () {
    return view('index',[
        'tasks' => Task::latest()->paginate(12)
    ]);

})->name('tasks.index');

Route::view('/tasks/create', 'createTask')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('editTask', [
    'task'=>$task
  ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
  return view('showTask', ['task'=>$task]);
})->name('tasks.show');

Route::post('/tasks', function(TaskRequest $request){
  
  $task=Task::create($request->validated());

  return redirect()->route('tasks.show',['task'=>$task->id])->with('success', 'Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task,TaskRequest $request){

  $task ->update($request->validated());

  return redirect()->route('tasks.show',['task'=>$task->id])->with('success', 'Task edited successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task){
  $task->delete();

  return redirect()->route('tasks.index')
  ->with('Success', 'task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function(Task $task){
  $task->togglecomplete();

  return redirect()->back()->with("Success", "You've checked a task off your list");
})->name('tasks.togglecomplete');


//journal routes

Route::get('/journal', function () {
    return view('journal',[
        'entries' => Journal::latest()->paginate(12)
    ]);
})->name('journal.home');

Route::view('journal/create','createEntry')->name('journal.create');

Route::get('/journal/{journal}', function (Journal $journal) {
  return view('showEntry', [
    'journal'=>$journal
  ]);
})->name('journal.show');

Route::get('/journal/{journal}/edit', function (Journal $journal) {
  return view('editEntry', [
    'journal'=> $journal
  ]);
})->name('journal.edit');

Route::post('/journal',function(JournalRequest $request){
  $entry = Journal::create($request->validated());

  return redirect()->route('journal.show', ['journal'=>$entry->id])->with('success', 'Entry created successfully');
})->name('journal.store');

Route::put('/Journal/{journal}', function(Journal $journal,JournalRequest $request){

  $journal ->update($request->validated());

  return redirect()->route('journal.show',['journal'=>$journal->id])->with('success', 'Entry edited successfully');
})->name('journal.update');

Route::delete('/Journal/{journal}', function(Journal $journal){
  $journal->delete();

  return redirect()->route('journal.home')
  ->with('Success', 'Entry deleted successfully!');
})->name('journal.destroy');
