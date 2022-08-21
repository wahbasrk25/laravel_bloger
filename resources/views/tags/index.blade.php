@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
      <div class="col">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">All Tags</h1>
                <div class="form-group">

                    <a  href="{{route('tag.create')}}" class="btn btn-warning">Create tag</a>


                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="row">

         @if ($tags->count() > 0)

      <div class="col">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>

                 @php
                     $i = 1;
                 @endphp

                  @foreach ($tags as $item)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->tag}}</td>

                  
                    <td>
                         <a class="text-success" href="{{ route('tag.edit' , ['id' => $item->id]) }}"><i class="fa-solid fa-2x fa-pen"></i></a>&numsp;&numsp;
                         <a class="text-danger" href="{{ route('tag.destroy' , ['id' => $item->id]) }}"><i class="fa-regular fa-2x fa-trash-can"></i></a>

                    </td>

                  </tr>
                  @endforeach

            </tbody>
          </table>

      </div>


         @else

            <div class="col"><br>
                <div class="alert alert-danger" role="alert">
                    No Tags
                </div>
            </div>

         @endif

    </div>
  </div>













@endsection
