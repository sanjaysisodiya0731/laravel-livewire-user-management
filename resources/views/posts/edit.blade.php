@extends('layouts.user.master')

@section('title','Edit Post')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('post.update', $post->id) }}" method="POST" class="form-inline">
                @csrf
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Post Content</label>
                    <input type="text" id="content" name="content" class="form-control" placeholder="Content" value="{{$post->content}}">
                </div>
               
                <div class="form-group mt-3">
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <a href="{{route('posts.index')}}" class="btn btn-danger">Cancle</a>
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection