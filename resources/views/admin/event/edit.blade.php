@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Event

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
                        <h3 class="box-title">Edit event</h3>
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
                        {{ Form::open(array('route' => ['admin.event.update', $data['id']], 'class' => 'form-horizontal','files'=>true,'name'=>'frmEditEvent')) }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name" value="{!! old('name',isset($data) ? $data['name']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Intro</label>
                                <input type="text" name="intro" class="form-control" id="" placeholder="Intro" value="{!! old('intro',isset($data) ? $data['intro']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control" id="" placeholder="Website" value="{!! old('intro',isset($data) ? $data['website']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <a class="c-btn c-datepicker-btn">
                                    <span class="material-icon">Date time</span>
                                </a>
                                <input type="text" name="output" class="form-control" id="output" placeholder="" value="{!! old('datetime',isset($data) ? $data['datetime']:null ) !!}">
                                <!--<pre id="output"></pre>!-->
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea id="content" name="content" rows="10" cols="80">
                                    {!! old('description',isset($data) ? $data['content']:null ) !!}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input type="text" name="tag" class="form-control" id="" placeholder="Tag" value="{!! old('strTag',isset($strTag) ? $strTag:null ) !!}">
                            </div>
                            <div class="form-group" id="currentImage">
                                <label for="">Current Avatar</label>
                                <img src="{!! asset('images/event/'.$data['avatar'])  !!}" class="current_image_detail img-responsive" idHinh="{!! $data['id'] !!}" id="{!! $data['id'] !!}" />
                                <a href="javascript:void(0)" type="button" id="delImageEvent" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                            </div>

                            <div class="form-group" id="newImage" style="display: block;">
                                <label for="exampleInputFile">Avatar</label>
                                <input type="file" id="image" name="newimage">
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
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection()
