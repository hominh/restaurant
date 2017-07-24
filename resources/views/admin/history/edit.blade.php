@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            History

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
                        <h3 class="box-title">Edit history</h3>
                    </div>

                        {{ Form::open(array('route' => ['admin.history.update', $data['id']], 'class' => 'form-horizontal','files'=>true,'name'=>'frmEditHistory')) }}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="text" name="year" class="form-control" id="" placeholder="Year" value="{!! old('year',isset($data) ? $data['year']:null ) !!}">
                            </div>

                            <div class="form-group">
                                <label for="">Content</label>
                                <br />
                                <textarea id="content" name="content" rows="10" cols="80">
                                    {!! old('content',isset($data) ? $data['content']:null ) !!}
                                </textarea>
                            </div>

                            <div class="form-group" id="currentImage">
                                <label for="">Current Image</label>
                                <img src="{!! asset('images/history/'.$data['image'])  !!}" class="current_image_detail img-responsive" idHinh="{!! $data['id'] !!}" id="{!! $data['id'] !!}" />
                                <a href="javascript:void(0)" type="button" id="delImageHistory" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                            </div>

                            <div class="form-group" id="newImage" style="display: block;">
                                <label for="newimage">New Image</label>
                                <input type="file" id="newimage" name="newimage">
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
