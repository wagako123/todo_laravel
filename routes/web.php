<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;



class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

Route::get('/', function (){
    return redirect()->route('tasks.index');

});
Route::get('/tasks', function () use($tasks) {
    return view('index',[
        'tasks' => $tasks
    ]);

})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if (!$task){
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('showTask', ['task'=>$task]);
})->name('tasks.show');


//journal routes

class Entry
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public string $created_at,
    public string $updated_at
  ) {
  }
}


$entries = [
  new Entry(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Entry(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Entry(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Entry(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

// Route::get('/', function () {
//     return redirect()->route('journal.home');
// });

Route::get('/journal', function () use($entries) {
    return view('journal',[
        'entries' => $entries 
    ]);
})->name('journal.home');

Route::get('/journal/{id}', function ($id) use($entries) {
    $entry = collect($entries)->firstWhere('id', $id);

    if (!$entry){
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('showEntry', ['entry'=>$entry]);
})->name('journal.show');

