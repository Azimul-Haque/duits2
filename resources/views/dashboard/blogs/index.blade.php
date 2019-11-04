@extends('adminlte::page')

@section('title', 'Blogs')

@section('css')

@stop

@section('content_header')
    <h1>
      Blogs
      <div class="pull-right">
        <a href="{{ route('blogs.create') }}" class="btn btn-success" target="_blank"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i> Write New Blog</a>
      </div>
    </h1>
@stop

@section('content')
  <div class="table-responsive">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Created At</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td><a href="{{ route('blog.single', $blog->slug) }}" target="_blank">{{ $blog->title }}</a></td>
                <td>{{ $blog->user->name }}</td>
                <td>{{ $blog->category->name }}</td>
                <td>{{ $blog->created_at }}</td>
                <td>
                    <button class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
@stop

@section('js')
  
@stop