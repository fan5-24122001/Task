<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Post\PostRepository;
use App\Models\Task;
use App\Models\Cate;

use App\Repositories\TaskRepository;
class TaskRepository implements TaskRepositoryInterface
{

    public function index()
    {
        return Task::latest()->paginate(10);
    }
    public function create()
    {
       
        return Task::latest()->paginate(10);
    }

    public function store($request)
    {
        if($request->has('img1'))
        {
            $img1 = $request->img1;
            $extension = $request->img1->extension();
            $img1Name = time().'-1.'.$extension;
            $img1->move(public_path('imgUploads'), $img1Name);
            $request->img1 = $img1Name;
        }
        if(Task::create([
            'name'=>$request->name,
            'id_cate'=>$request->id_cate,
            'des'=>$request->des,
            'img1'=>$request->img1,
          
        ]))
        {
            return redirect()->back()->with('success','successfully Add.');
        }
        
    }

    public function show($id)
    {
       
        return Task::find($id);
    }
    public function edit($id)
    {
        return Task::find($id);
    }

    public function update( $request, $id)
    {   
       
        $task = Task::where('id', $id)->first();
        if($request->has('img1'))
        {
            $img1 = $request->img1;
            $extension = $request->img1->extension();
            $img1Name = time().'-1.'.$extension;
            $img1->move(public_path('imgUploads'), $img1Name);
            $request->img1 = $img1Name;
        }else{
            $request->img1= $request->img11;
        }
        $task->name = $request->name;
        $task->des = $request->des;
        $task->id_cate = $request->id_cate;
        $task->img1 = $request->img1;
      
        $task->save();
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
