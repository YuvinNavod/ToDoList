<?php
namespace domain\Services;

use App\Models\Todo;

class TodoService
{
    protected $task;

    public function __construct()
    {
        $this->task = new Todo();
    }

    public function all()
    {
        return $this->task->all();
    }

    public function store( $data)
    {
        $this->task->create($data);
    }

    public function delete ($task_id)
    {
        $task= $this->task->find($task_id);
        $task->delete();
    }

    public function done ($task_id)
    {
        $task= $this->task->find($task_id);
        $task->done= 1;
        $task->update();
    }

    /*
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
*/
}
