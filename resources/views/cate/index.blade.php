@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{route('Cate.create')}}" class="button"> Thêm Task</a><br>
                <table id="customers" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên</th>
                            <th>Tên</th>
                            <th>Trạng Thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cate as $key => $cate)
                        <tr>

                            <td>{{$key}}</td>
                            <td>{{$cate ->name}}</td>
                          

                            <td>
                                <div class="d-flex"> 
                                    <a href="{{route('Cate.show',$cate->id)}}">

                                        <button type="submit" class="btn btn-danger btn-sm">Xem</button>

                                    </a>
                                    @guest
                            @if (Route::has('login'))

                            @endif
                            @else

                            @if (Auth::user()->is_admin == 1)
                            <a href="{{route('Cate.edit',$cate->id)}}">

                                        <button type="submit" class="btn btn-danger btn-sm">Sửa</button>

                                    </a>

                                    <form method="post" action="{{route('Cate.destroy',$cate->id)}}">
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
@endsection