<?php

namespace App\Http\Controllers\Api\V1;

use App\Classes\Constants;
use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'owner' => 'required',
            'status' => ['required', Rule::in(Constants::ALLOWED_TASK_STATUSES)],
        ];

        $this->validate($request, $rules);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'owner' => $request->owner,
            'status' => $request->status,
        ]);

        return response()->json($task);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }



    public function update(Task $task, Request $request)
    {

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'owner' => 'required',
            'status' => ['required', Rule::in(Constants::ALLOWED_TASK_STATUSES)],
        ];

        $this->validate($request, $rules);

        $task['title'] = $request->title;
        $task['description'] = $request->description;
        $task['owner'] = $request->owner;
        $task['status'] = $request->status;

        $task->save();

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return response()->json($task);
    }
}
