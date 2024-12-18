<?php

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
        'tasks' => Task::latest()->get()
    ]);

})->name('tasks.index');

Route::view('/tasks/create', 'createTask')->name('tasks.create');

Route::get('/tasks/{id}/edit', function ($id) {
  return view('editTask', [
    'task'=>Task::findOrFail($id)
  ]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
  return view('showTask', ['task'=>Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request){
  $data= $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
  ]);
  $task = new Task;
  $task ->title = $data['title'];
  $task ->description = $data['description'];
  $task ->long_description = $data['long_description'];

  $task ->save();

  return redirect()->route('tasks.show',['id'=>$task->id])->with('success', 'Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{id}', function($id,Request $request){
  $data= $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
  ]);
  $task = Task::findOrFail($id);
  $task ->title = $data['title'];
  $task ->description = $data['description'];
  $task ->long_description = $data['long_description'];

  $task ->save();

  return redirect()->route('tasks.show',['id'=>$task->id])->with('success', 'Task edited successfully');
})->name('tasks.update');




//journal routes

Route::get('/journal', function () {
    return view('journal',[
        'entries' => Journal::latest()->get()
    ]);
})->name('journal.home');

Route::view('journal/create','createEntry')->name('journal.create');

Route::get('/journal/{id}', function ($id) {
  return view('showEntry', [
    'entry'=>Journal::findOrFail($id)
  ]);
})->name('journal.show');

Route::get('/journal/{id}/edit', function ($id) {
  return view('editEntry', [
    'entry'=>Journal::findOrFail($id)
  ]);
})->name('journal.edit');

Route::post('/journal',function(Request $request){
  $data= $request -> validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
  ]);
  $entry= new Journal;
  $entry-> title            =$data['title'];
  $entry-> description      =$data['description'];
  $entry-> long_description =$data['long_description'];

  $entry->save();
  
  return redirect()->route('journal.show', ['id'=>$entry->id])->with('success', 'Entry created successfully');
})->name('journal.store');

