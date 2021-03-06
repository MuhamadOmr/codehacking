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
              <th>post link</th>
              <th>comments link</th>
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
             <td>{{str_limit($post->title,15)}}</td>
             <td>{{str_limit($post->body , 20)}}</td>
              <td><a href="{{route('home.post' , $post->slug)}}">view post</a></td>
              <td><a href="{{route('admin.comments.show' , $post->id)}}">view comments</a></td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
            @endforeach
            @endif
        </tbody>
      </table>


    @stop