<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;


use Illuminate\Http\Response;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all();

        $current_folder = Folder::find($id);

        $tasks = Task::where('folder_id', $current_folder->id)->get();

        return view('tasks/index',[
             'folders'=> $folders,
             'current_folder_id' => $current_folder->id,
             'tasks' => $tasks,
        ]);
    }
    public function showCreateForm(int $id){

        return view('tasks/create',['folder_id' => $id]);
    }
    public function create(int $id, Request $request){
        $current_folder = Folder::find($id);

    $task = new Task();
    $task->title = $request->title;
    $task->due_date = $request->due_date;

    $current_folder->tasks()->save($task);

    return redirect()->route('tasks.index', [
        'id' => $current_folder->id,
    ]);
    }
}