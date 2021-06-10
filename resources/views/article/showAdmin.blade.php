@extends('layouts.app')

@section('content')
    <body>


    @if(Session::has('success'))
        <div class="alert alert-success ">
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger ">
            {{Session::get('error')}}
        </div>
    @endif
    <div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Photo</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{$article -> id}}</th>
                <td>{{$article -> title}}</td>
                <td>{{$article -> content_art}}</td>
                <td><img style="" width="100px" height="100px" src="{{asset('images/article/'.$article->photo )}}"></td>
                <td>
                    <a href="{{route('article.edit',$article -> id)}}" class="btn btn-success"> Update </a>
                    <a href="{{route('article.delete',$article -> id)}}" class="btn btn-danger"> Delete </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="d-flex justify-content-center">
        {!! $articles ->links() !!}
    </div>
    </body>
@endsection
