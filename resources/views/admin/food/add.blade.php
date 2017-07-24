@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Food
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add new food</h3>

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
                    <form role="form" action="{!! route('admin.food.store') !!}"  method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name" value="{!! old('name') !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Keyword</label>
                                <input type="text" class="form-control" name="keyword" id="" placeholder="Keyword" value="{!! old('keyword') !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control" id="" placeholder="Description" value="{!! old('description') !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" class="form-control" id="" placeholder="Price" value="{!! old('price') !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Intro</label>
                                <textarea id="intro" name="intro" rows="10" cols="80">

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea id="content" name="content" rows="10" cols="80">

                                </textarea>
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input type="text" name="tag" class="form-control" id="" placeholder="Tag" value="{!! old('tag') !!}">
                            </div>
                            <div class="form-group">
                                <label>Food type</label>
                                <select class="form-control" name="foodtype">
                                    <option value="">Select Foodtype</option>

                                   <?php cate_parent($foodtype,0,"--",old('foodtype')); ?>
                                </select>
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
