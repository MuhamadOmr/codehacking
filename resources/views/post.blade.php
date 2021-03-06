@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>
    <hr>

    @if(Session::has('comment_message'))

            {{session('comment_message')}}

            @endif

    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

              {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store','files'=>true]) !!}

                        <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                           {!! Form::label('body', 'Body:') !!}
                           {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3 ])!!}
                     </div>

                       <div class="form-group">
                          {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
                       </div>

                     {!! Form::close() !!}


    </div>

    <hr>

@endif

    <!-- Posted Comments -->

@if (count($comments) > 0)

    @foreach($comments as $comment)

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p>{{$comment->body}}</p>

            <button class="toggle-reply btn btn-primary pull-right">reply</button>



            @if(count($comment->replies)> 0)

            @foreach($comment->replies as $reply)

                    <!-- Nested Comment -->

            <div class="media">

                <a class="pull-left" href="#">
                    <img height="30" class="media-object" src="{{$reply->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$reply->author}}
                        <small>{{$reply->created_at->diffForHumans()}}</small>
                    </h4>
                    <p>{{$reply->body}}</p>
                </div>

            </div>
            <!-- End Nested Comment -->
            @endforeach
            @endif


            <div class="comment-reply" style="display: none">



                    {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply','files'=>true]) !!}

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                    <div class="form-group">
                        {!! Form::label('body', 'Reply:') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control' , 'rows'=>1])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit Reply', ['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}





            </div>


        </div>
    </div>

    @endforeach
@endif




@stop

@section('scripts')
    <script type ="text/javascript" >


        $(document).ready(function(){
            $(".toggle-reply").click(function(){
                $(".comment-reply").slideToggle("slow");
            });
        });

    </script>


    @endsection