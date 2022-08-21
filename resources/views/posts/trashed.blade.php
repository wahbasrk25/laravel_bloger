@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
      <div class="col">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">Trashed Posts</h1>
                <div class="form-group">

                    <a  href="{{route('posts')}}" class="btn btn-warning">All posts</a>
                    <a  href="{{route('posts.trashed')}}" class="btn btn-danger">Trashed <i class="fa-solid fa-trash-can"></i></a>


                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="row">

         @if ($post->count() > 0)

      <div class="col">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">User</th>
                <th scope="col">Photo</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

                 @php
                     $i = 1;
                 @endphp

                  @foreach ($post as $item)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>

                          <img src="{{ URL::asset($item->photo)}}" alt="{{ $item->photo}}"
                           class="img-tumbnail" width="100" height="100">

                    </td>
                    <td>
                         <a href="{{ route('post.restore' , ['id' => $item->id]) }}"><i class="fa-solid fa-2x fa-circle-arrow-left"></i></a>&numsp;&numsp;
                         <a class="text-danger" href="{{ route('post.hdelete' , ['id' => $item->id]) }}"><i class="fa-regular fa-2x fa-trash-can"></i></a>

                    </td>

                  </tr>
                  @endforeach

            </tbody>
          </table>

      </div>


         @else

            <div class="col"><br>
                <div class="alert alert-danger" role="alert">
                   Empty
                </div>
            </div>

         @endif

    </div>
  </div>




@endsection
