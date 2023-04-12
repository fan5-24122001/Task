@extends('layouts.app')
   
@section('content')
<div class="container">
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($errors->any())
                <div class="alert alert-danger">
                    There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session()->has('success'))
                        
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                <div class="container">
                    <form action="{{ route('Cate.update', $cate ->id) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <label for="fname"> Name</label>
                        <input type="text" id="fname" value="{{$cate->name}}" name="name" placeholder="Your name..">

                       
                      

                      
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection