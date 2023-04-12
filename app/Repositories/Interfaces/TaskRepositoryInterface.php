<?php
namespace App\Repositories\Interfaces;

Interface TaskRepositoryInterface{
    
    public function index();
    public function create();
    public function store(Request $request);
    public function show($id);
    public function edit($id);
    public function update( $request, $id); 
    public function destroy($id);
}   