<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('home', ['tasks' => Task::where('user_id', Auth::user()->id)->get()]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|min:5|max:255',
      'description' => 'required|min:10|max:555',
    ]);

    $task = new Task();
    $task->name = $request->name;
    $task->user_id = Auth::user()->id;
    $task->description = $request->description;
    $task->save();
    return redirect('/home')->with('success', 'Task added successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $task = Task::where('id', $id)->first();
    return view('show', ['task' => $task]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    return view('edit', ['task' => Task::where('id', $id)->first()]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {

    $validatedData = $request->validate([
      'name' => 'required|min:5|max:255',
      'description' => 'required|min:10|max:555',
    ]);

    $existingTask = Task::where('id', $request->id)->first();
    $task = Task::find($request->id);

    $task->name = $request->name;
    $task->description = $request->description;
    $task->status = $request->status;
    if (($existingTask->status == 0) && ($request->status != 0)) {
      $task->start_at = date("Y-m-d h:i:s", time() + 6 * 3600);
    }
    if (($existingTask->status != 2) && ($request->status == 2)) {
      $task->end_at = date("Y-m-d h:i:s", time() + 6 * 3600);
    }
    $task->save();

    return redirect('/home')->with('success', 'Task update successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $task = Task::find($id);
    $task->delete();
    return redirect('/home')->with('success', 'Task deleted successfully.');
  }
}
