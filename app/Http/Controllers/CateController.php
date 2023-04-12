<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cate;
use App\Repositories\Interfaces\CateRepositoryInterface;
use App\Repositories\CateRepository;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $CateRepository;


     public function __construct(CateRepositoryInterface $CateRepository)
     {
         $this->CateRepository = $CateRepository;
     }
    public function index()
    {
        $cate =  $this->CateRepository->index();
        return view('cate.index', compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('cate.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = $this->CateRepository->store($request);
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
        $cate =  $this->CateRepository->show($id);
        return view('cate.show', compact('cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate =  $this->CateRepository->edit($id);
        return view('cate.edit', compact('cate'));
        
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
        $cate =  $this->CateRepository->update($request,$id);
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
        $cate =  $this->CateRepository->destroy($id);
        return redirect()->back()->with('status', 'Delete Success');
    }
}
