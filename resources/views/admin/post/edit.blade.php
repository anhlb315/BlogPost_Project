@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">

            <div class="card-header">
                <h4>
                    Edit Post
                    <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">
                        Back
                    </a>
                </h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('admin/update-post/' . $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id }}"
                                    {{ $cateitem->id == $post->category_id ? 'selected' : '' }}>
                                    {{ $cateitem->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $post->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ $post->slug }}">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="mySummernote" class="form-control" rows="4">{!! $post->description !!}</textarea>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="">Youtube Iframe Link</label>
                        <input type="text" name="yt_iframe" class="form-control" value="{{ $post->yt_iframe }}">
                    </div> --}}

                    <div class="mb-3">
                        <label for="">Cover image</label>
                        <input type="file" name="cover" class="form-control" value="$post->cover">
                    </div>

                    {{-- <h4>SEO Tags</h4> --}}

                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $post->meta_title }}">
                    </div>

                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{!! $post->meta_description !!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3">{!! $post->meta_keyword !!}</textarea>
                    </div>
                    <h4>Status</h4>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
