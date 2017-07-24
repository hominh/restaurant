@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Slide
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add new Slide</h3>

                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div> <!-- end .flash-message -->
                    <form role="form" action="{!! route('admin.slide.store') !!}"  method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" id="" placeholder="Title" value="{!! old('title') !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description" id="" placeholder="Description" value="{!! old('description') !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Textlink</label>
                                <input type="text" name="textlink" class="form-control" id="" placeholder="Textlink" value="{!! old('textlink') !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type="text" name="link" class="form-control" id="" placeholder="Link" value="{!! old('link') !!}">
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" id="image" name="image">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'intro' );
        CKEDITOR.replace( 'content' );

    </script>
@endsection()
