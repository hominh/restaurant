@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Slide

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
                        <h3 class="box-title">Edit slide</h3>
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
                        {{ Form::open(array('route' => ['admin.slide.update', $data['id']], 'class' => 'form-horizontal','files'=>true,'name'=>'frmEditSlide')) }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" id="" placeholder="Title" value="{!! old('title',isset($data) ? $data['title']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control" id="" placeholder="Description" value="{!! old('description',isset($data) ? $data['description']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Text link</label>
                                <input type="text" name="textlink" class="form-control" id="" placeholder="Text link" value="{!! old('textlink',isset($data) ? $data['textlink']:null ) !!}">
                            </div>
                            <div class="form-group" id="currentImage">
                                <label for="">Current Photo</label>
                                <img src="{!! asset('images/slide/'.$data['image'])  !!}" class="current_image_detail img-responsive" idHinh="{!! $data['id'] !!}" id="{!! $data['id'] !!}" />
                                <a href="javascript:void(0)" type="button" id="delImgSlide" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                            </div>

                            <div class="form-group" id="newPhoto" style="display: block;">
                                <label for="exampleInputFile">Photo</label>
                                <input type="file" id="image" name="newphoto">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection()
