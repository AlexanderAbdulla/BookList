@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit your class</h1>
            <form action="/update" method="post">

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="AUTHOR" value="{{ old('author') }}">
                    @if($errors->has('author'))
                        <span class="help-block">{{ $errors->first('author') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <input type="hidden" id="id" name="id" value="{{$id}}"> 
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection