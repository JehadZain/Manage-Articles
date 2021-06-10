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
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorys as $category)
                <tr>
                    <th scope="row">{{$category -> id}}</th>
                    <td>{{$category -> name}}</td>
                    <td>
                        <a href="{{route('category.edit',$category -> id)}}" class="btn btn-success"> Update </a>
                        <a href="{{route('category.delete',$category -> id)}}" class="btn btn-danger"> Delete </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    </body>
@endsection
