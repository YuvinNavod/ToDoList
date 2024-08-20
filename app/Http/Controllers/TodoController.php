<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new Todo();
    }

    public function index()
    {
        $response['tasks']= $this->task->all();
        //dd($response);
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request)
    {
        //dydom
        //dd($request);

        $this->task->create($request->all());
        //return redirect()->route('todo'); or
        return redirect()->back();
    }

    public function delete ($task_id)
    {
        $task= $this->task->find($task_id);
        $task->delete();
        return redirect()->back();
    }

    public function done ($task_id)
    {
        $task= $this->task->find($task_id);
        $task->done= 1;
        $task->update();
        return redirect()->back();
    }
    public function edit (Request $request)
    {
        $response['task']= $this->task->find($request->task_id);
        //$response['task']=TodoFacade::get($request['task_id']);
        return view('pages.todo.edit')->with($response);
    }
    public function update (Request $request, $task_id)
    {
        $task= $this->task->find($task_id);
        $task->update($request->all());
        return redirect()->route('todo');
    }
}
