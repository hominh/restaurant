@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Config

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
                        <h3 class="box-title">Edit config</h3>
                    </div>

                        {{ Form::open(array('route' => ['admin.config.update', $data['id']], 'class' => 'form-horizontal','files'=>true)) }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name" value="{!! old('name',isset($data) ? $data['name']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Value</label>
                                <input type="text" class="form-control" name="value" id="" placeholder="Value" value="{!! old('value',isset($data) ? $data['value']:null ) !!}">
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
