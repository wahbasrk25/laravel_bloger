@extends('layouts.app')

@section('content')


    <div class="container ">


            <div class="row">
              <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">Create Tags</h1>
                    <div class="form-group">
                        <a  href="{{route('tags')}}" class="btn btn-warning">All Tags</a>
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
                <form action="{{route('tag.store')}}" method="POST" >
                    @csrf

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Name</label>
                      <input type="text" name="tag" class="form-control" >


                    <div class="form-group">
                          <button type="submit" class="btn btn-danger">Create Tag</button>
                    </div>
                  </form>
              </div>


            </div>


    </div>



@endsection






