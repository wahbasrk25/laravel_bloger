
@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="col">
            <div class="card" >
                <img src="{{URL::asset($post->photo)}}" class="card-img-top" alt="{{$post->photo}}">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{{$post->content}}</p>
                  <p  style="color: rgb(245, 17, 66)"> Created at : {{$post->created_at->diffForhumans()}}</p>
                  <p  style="color: rgb(245, 17, 66)"> Updated at : {{$post->updated_at->diffForhumans()}}</p>
                  <a href="{{route('posts')}}" class="btn btn-primary">All Posts</a>
                </div>
            </div>
        </div>
    </div>

@endsection
