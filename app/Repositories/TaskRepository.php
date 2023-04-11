<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\Cate;
class TaskRepository implements TaskRepositoryInterface
{

    public function index()
    {
        return Task::latest()->paginate(10);
    }
    public function create()
    {
        $cate = Cate::all();
        return Task::latest()->paginate(10);
    }

    public function store($data)
    {
       
        $task  = new  Task;
        
        $task->name = $data['name'];
        $task->id_cate = $data->id_cate;
        $task->des = $data['des'];
        if($data->has('img1'))
        {
            $img1 = $data->img1;
            $extension = $data->img1->extension();
            $img1Name = time().'-1.'.$extension;
            $img1->move(public_path('imgUploads'), $img1Name);
            $task->img1 = $img1Name;
        }
        else{
            $task->img1= $request->img11;
        }
        $task->save();
    }

    public function show($id)
    {
       
        return Task::find($id);
    }
    public function edit($id)
    {
        return Task::find($id);
    }

    public function update($data, $id)
    {   
       
        $task = Task::where('id', $id)->first();
        $task->name = $data['name'];
        $task->des = $data['des'];
        $task->img1 = $data['img1'];
        $task->save();
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
