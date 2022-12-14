<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new Test();
    }

    public function index()
    {
        //get database data
        $response['tasks']=$this->task->all();
        //dd($response);
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->task->create($request->all());

        return redirect()->back();
        //return redirect()->route('todo');
    }

    public function delete($task_id)
    {
        //dd($task_id);
        $task= $this->task->find($task_id);
        $task->delete();

        return redirect()->back();
        //return redirect()->route('todo');
    }

    public function done($task_id)
    {
        //dd($task_id);
        $task= $this->task->find($task_id);
        $task->done =1;
        $task->update();
        
        return redirect()->back();
        //return redirect()->route('todo');
    }
}
