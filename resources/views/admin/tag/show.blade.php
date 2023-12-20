@extends('admin.layouts.main')
@section('title')
    Категория {{ $tag->title }}
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <a href="{{ route('tags.index') }}" class="mr-2"><i class="fas fa-arrow-left"></i></a>
                        <h1 class="m-0 mr-2">{{ $tag->title }}</h1>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="text-success mr-2"><i class="fas fa-solid fa-pen"></i></a>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-transparent border-0" type="submit" role="button" > <i class="text-danger fas fa-trash"></i></button>

                        </form>
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
                    <div class="col-6">

                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $tag->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $tag->title }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- /.content -->
    </div>
@endsection
