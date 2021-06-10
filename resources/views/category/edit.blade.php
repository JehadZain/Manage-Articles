@extends('layouts.app')

@section('content')
<body>

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Edit your Category
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <br>
        <form method="POST" action="{{route('category.update',$category ->id )}}" >
            @csrf
            {{-- <input name="_token" value="{{csrf_token()}}"> --}}

            <div class="form-group">
                <label for="exampleInputEmail1">Category Name </label>
                <input type="text" class="form-control" name="name" value="{{$category -> name}}">
                @error('title')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>


            <br>
            <button type="submit" class="btn btn-primary">Save Category</button>
        </form>
    </div>
</div>
</body>
@endsection
