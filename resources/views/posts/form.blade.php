@extends('layouts.user.master')
@section('title',isset($post) ? 'Edit Post' : 'Create Post')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <!-- Display errors message -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                @csrf
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ old('title', $post->title ?? '') }}">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Post Content</label>
                    <input type="text" id="content" name="content" class="form-control" placeholder="Content" value="{{ old('title', $post->content ?? '') }}">
                    @error('content')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Post Image</label>
                    <input type="file" id="image_name" name="image_name" class="form-control">

                    @error('image')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                @if(!empty($post->image_name))
                <div class="form-group">
                    <img src="{{ asset('uploads/posts/'.$post->image_name) }}" alt="Image" width="100px"/>
                </div>
               @endif
                <div class="form-group mt-3">
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <a href="{{ route('posts.index') }}" class="btn btn-danger">Cancle</a>
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection
