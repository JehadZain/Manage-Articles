@extends('layouts.app')

@section('content')
<body>

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Edit your Article
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <br>
        <form method="POST" action="{{route('article.update',$article ->id )}}" enctype="multipart/form-data">
            @csrf
            {{-- <input name="_token" value="{{csrf_token()}}"> --}}

            <div class="form-group">
                <label for="exampleInputEmail1">Title for Article </label>
                <input type="text" class="form-control" name="title" value="{{$article -> title}}">
                @error('title')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Article Content </label>
                <input type="text" class="form-control" name="content_art" value="{{$article -> content_art}}">
                @error('content_art')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Chose Your Photo for Article </label><br>
                <input type="file" class="flex-center" name="photo">
                @error('photo')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save Article</button>
        </form>
    </div>
</div>
</body>
@endsection

