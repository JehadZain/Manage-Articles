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
    <div class="container fa-angle-down">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Photo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <th scope="row">{{$article -> id}}</th>
                    <td>{{$article -> title}}</td>
                    <td>{{$article -> content_art}}</td>
                    <td><img style="" width="100px" height="100px" src="{{asset('images/article/'.$article->photo )}}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $articles ->links() !!}
        </div>
    </div>
    </body>
@endsection
