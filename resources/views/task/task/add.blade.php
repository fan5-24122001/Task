@extends('layouts.app')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Trạng Thái</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Sửa Trạng Thái</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session()->has('massage'))
                        <div class="alert alert-success">
                            {{ session()->get('massage') }}
                        </div>
                        @endif
                        <div class="email-box ms-0 ms-sm-0 ms-sm-0">
                            <div class="p-0">
                                <a href="email-compose.html" class="btn btn-primary "> Trạng Thái</a>
                            </div>
                            <br>
                            <div class="basic-form">

                                <form action="{{ route('Task.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">name label</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Example input" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">des label</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"
                                            placeholder="Another input" name="des">
                                    </div>
                                    <div class="form-group">
                                    <label for="formGroupExampleInput2">Cate label</label>
                                    <select class="form-control form-control-lg"  name="id_cate">
                                    @foreach ($cate as $ca)
                                        <option value="{{$ca->id}}">{{$ca->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="formGroupExampleInput2">Image label</label>
                                        <input type="file" id="fname" name="img1" class="form-control" id="formGroupExampleInput2"
                                            placeholder="Another input" >
                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                            <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                    class="me-2"><i
                                                        class="fa fa-paper-plane"></i></span>Cập Nhật</button>
                                        </div>
                                </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @endsection