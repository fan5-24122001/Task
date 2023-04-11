@extends('layouts.app')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Bài Viết</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Danh Sách Bài Viết</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh Sách Bài Viết</h4>
                    </div>
                    <div class="card-body">
                        @if(session()->has('status'))

                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Tên</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($task as $key => $cate)
                                    <tr>

                                        <td>{{$key}}</td>
                                        <td>{{$cate ->name}}</td>
                                        <td>{{$cate ->des}}</td>
                                        <td>  <img style="witdh:100px;height:100px" src="{{ asset("/imgUploads/$cate->img1")}}"></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('Task.show',$cate->id)}}">

                                                    <button type="submit" class="btn btn-danger btn-sm">Xem</button>

                                                </a>
                                                @guest
                                                @if (Route::has('login'))

                                                @endif
                                                @else

                                                @if (Auth::user()->is_admin == 1)
                                                <a href="{{route('Task.edit',$cate->id)}}">

                                                    <button type="submit" class="btn btn-danger btn-sm">Sửa</button>

                                                </a>

                                                <form method="post" action="{{route('Task.destroy',$cate->id)}}">
                                                    @method('delete')
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>


                                                </form>
                                                @elseif(Auth::user()->is_admin == 0)
                                                {{-- nhaf tuyeern dung --}}

                                                @endif




                                                @endguest


                                            </div>

                                        </td>

                                        @endforeach
                                    </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


@endsection