@extends('layouts.user.master')

@section('title', 'Posts List')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2>Users List</h2>
            <div class="col-md-3">
                <a href="{{ url('/post/create') }}" class="btn btn-primary">Create Post</a>
            </div>
            <div class="col-md-9">
                <form action="{{route('posts.index')}}" method="GET">
                    <input type="text" placeholder="search here" name="search" class="form-control mt-3 mb-3" value="{{ request('search') }}"/>
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>    
            </div>
            
            <!-- Display success message -->
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{session('success')}}
                </div>
            @endif 
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $key=>$post)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>    
@endsection
