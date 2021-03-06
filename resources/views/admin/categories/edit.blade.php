@extends('layouts.admin')





@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">


        {!! Form::model($category , ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update' , $category->id],'files'=>true]) !!}


        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            <div class="form-group col-sm-6" >
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
        </div>
        </div>

        {!! Form::close() !!}

        {!! Form::open( ['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy' , $category->id],'files'=>true]) !!}



        <div class="form-group">

            <div class="form-group col-sm-6" >
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
        </div>

        </div>

        {!! Form::close() !!}







    </div>

    <div class="col-sm-6">










    </div>




















    @stop