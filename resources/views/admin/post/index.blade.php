@extends('layouts.admin')


@section('content')


    <h1>Posts</h1>

    <table class="table">
        <thead>
          <tr>
              <th>ID</th>
              <th>User</th>
              <th>Category</th>
              <th>Photo</th>
              <th>Title</th>
              <th>body</th>
              <th>created</th>
              <th>updated</th>

          </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td><a href="{{route('admin.posts.edit' , $post->id )}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : "UNCATEGORIZED"}}</td>
             <td><img height="50" src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400"}}" alt=""></td>
             <td>{{$post->title}}</td>
             <td>{{$post->body}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
            @endforeach
            @endif
        </tbody>
      </table>


    @stop