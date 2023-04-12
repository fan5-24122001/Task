<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CateRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Cate;

use App\Repositories\CateRepository;
class CateRepository implements CateRepositoryInterface
{

    public function index()
    {
        return Cate::latest()->paginate(10);
    }
    public function create()
    {
       
        return Cate::latest()->paginate(10);
    }

    public function store($request)
    {
       
        $cate = new Cate();
        $cate->name = $request['name'];
        $cate->save();
            return redirect()->back()->with('success','successfully Add.');
        
        
    }

    public function show($id)
    {
       
        return Cate::find($id);
    }
    public function edit($id)
    {
        return Cate::find($id);
    }

    public function update( $request, $id)
    {   
       
        $cate = Cate::where('id', $id)->first();
        $cate->name = $request->name;
        $cate->save();
    }

    public function destroy($id)
    {
        $cate = Cate::find($id);
        $cate->delete();
    }
}
