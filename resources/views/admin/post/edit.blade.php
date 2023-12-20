@extends('admin.layouts.main')
@section('title')
    Edit post
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit post</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" class=" " enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group w-25">
                            <input type="text" name="title" class="form-control" placeholder="Name" value="{{ $post->title}}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Preview image</label>
                            <div class="w- mb-2">
                                <img src="{{ url('storage/' . $post->preview_image) }}" alt="" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image"  >
                                    <label class="custom-file-label"  >Preview image</label>
                                </div>

                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Feature Image </label>
                            <div class="w-100 mb-2">
                                <img src="{{ url('storage/' . $post->main_image ) }}" alt="" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" name="main_image" >
                                    <label class="custom-file-label"  >Feature Image </label>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <label>Categories</label>
                            <select name="category_id" class="custom-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}
                                    >{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}}
                                    >{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
@endsection
