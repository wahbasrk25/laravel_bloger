@extends('layouts.app')

@section('content')


    <div class="container ">


            <div class="row">
              <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Create Posts</h1>
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
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Title</label>
                      <input type="text" name="title" class="form-control" >
                    </div><br>

                    <div class="form-group">

                        @foreach ($tags as $item)
                        <input type="checkbox" name="tags[]" value="{{$item->id}}">
                         <label for="">{{$item->tag}}</label>
                        @endforeach

                    </div><br>


                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Content</label>
                      <textarea class="form-control" name="content" rows="3"></textarea>
                    </div><br>

                    <div class="form-group">
                        <input type="file"  name="photo" class="form-control" >
                    </div><br>

                    <div class="form-group">
                          <button type="submit" class="btn btn-danger">Create Post</button>
                    </div>
                  </form>
              </div>


            </div>


    </div>











@endsection






