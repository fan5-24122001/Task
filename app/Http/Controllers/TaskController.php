<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Post\PostRepository;
use App\Models\Task;
use App\Models\Cate;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $postRepository;

    public function index()
    {
        $task  = Task::all();
        $cate = Cate::all();
        return view('task.task.index', compact('task','cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Cate::all();
        return view('task.task.add', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'des' => ['required']

        ]);
      
        $task  = new  Task;
        $task->name = $request['name'];
        $task->id_cate = $request->id_cate;
        $task->des = $request['des'];
        if($request->has('img1'))
        {
            $img1 = $request->img1;
            $extension = $request->img1->extension();
            $img1Name = time().'-1.'.$extension;
            $img1->move(public_path('imgUploads'), $img1Name);
            $task->img1 = $img1Name;
        }
        else{
            $task->img1= $request->img11;
        }
        $task->save();
        return redirect()->back()->with('massage', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate = Cate::all();
        $task = Task::find($id);
        return view('task.task.show', compact('task','cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $cate = Cate::all();
        return view('task.task.edit', compact('task','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        $request->validate([
            'name' => ['required', 'max:255'],
            'des' => ['required']

        ]);

        $task  =  Task::find($id);
        $task->name = $request['name'];
        $task->des = $request['des'];
        $task->id_cate = $request->id_cate;
        if($request->has('img1'))
        {
            $img1 = $request->img1;
            $extension = $request->img1->extension();
            $img1Name = time().'-1.'.$extension;
            $img1->move(public_path('imgUploads'), $img1Name);
            $task->img1 = $img1Name;
        }
        else{
            $task->img1= $request->img11;
        }
        $task->save();
        $task ->save();
        return redirect()->back()->with('massage', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->back()->with('status', 'Delete Success');
    }
}
