<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Post\PostRepository;
use App\Models\Task;
use App\Models\Cate;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $TaskRepository;


    public function __construct(TaskRepositoryInterface $TaskRepository)
    {
        $this->TaskRepository = $TaskRepository;
    }
    public function index()
    {
        $cates = Cate::all();
        $task =  $this->TaskRepository->index();
        return view('task.task.index', compact('task','cates'));
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
       
       
        $task =  $this->TaskRepository->store($request);
        
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
        $task =  $this->TaskRepository->show($id);
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
        $task =  $this->TaskRepository->destroy($id);
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
        $task =  $this->TaskRepository->update($request,$id);
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
        $task =  $this->TaskRepository->destroy($id);
        return redirect()->back()->with('status', 'Delete Success');
    }
}
