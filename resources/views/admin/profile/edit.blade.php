@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            User profile

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
                        <h3 class="box-title">Edit profile</h3>
                    </div>

                        {{ Form::open(array('route' => ['admin.profile.update', $data['id']], 'class' => 'form-horizontal','files'=>true)) }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name" value="{!! old('name',isset($data) ? $data['name']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" id="" placeholder="Email" value="{!! old('email',isset($data) ? $data['email']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" id="" placeholder="Password" value="{!! old('password',isset($data) ? $data['password']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm password</label>
                                <input type="password" name="order" class="form-control" id="" placeholder="Confirm password" value="{!! old('password',isset($data) ? $data['password']:null ) !!}">
                            </div>
                            <div class="form-group" id="currentImage">
                                <label for="">Current Image</label>
                                <img src="{!! asset('images/post/'.$data['image'])  !!}" class="current_image_detail img-responsive" idHinh="{!! $data['id'] !!}" id="{!! $data['id'] !!}" />
                                <a href="javascript:void(0)" type="button" id="delImageUser" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                            </div>

                            <div class="form-group" id="newImage" style="display: block;">
                                    <label for="exampleInputFile">Image</label>
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

@endsection()
