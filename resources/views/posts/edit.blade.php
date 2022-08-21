@extends('layouts.app')

@section('content')


    <div class="container ">


            <div class="row">
              <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Edit Post</h1>
                    <div class="form-group">
                        <a  href="{{route('posts')}}" class="btn btn-warning">All Posts</a>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
                @if (count($errors) > 0)

                <ul>
                    @foreach ($errors->all() as $item)
                          <li>
                            <div class="alert alert-danger" role="alert">
                                {{$item}}
                              </div>
                          </li>
                    @endforeach
                </ul>

                @endif
              <div class="col">
                <form action="{{route('post.update' , ['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Title</label>
                      <input type="text" name="title" value="{{$post->title}}" class="form-control" >
                    </div><br>
                    <div class="form-group">

                        @foreach ($tags as $item)
                        <input type="checkbox" name="tags[]" value="{{$item->id}}">
                         <label for="">{{$item->tag}}</label>
                        @endforeach

                    </div><br>

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Content</label>
                      <textarea class="form-control" name="content" rows="3">
                          {{$post->content}}
                      </textarea>
                    </div><br>

                    <div class="form-group">
                        <input type="file"  name="photo" class="form-control" >
                    </div><br>

                    <div class="form-group">
                          <button type="submit" class="btn btn-danger">Update Post</button>
                    </div>
                  </form>
              </div>


            </div>


    </div>











@endsection






