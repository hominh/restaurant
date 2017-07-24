@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Employee

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
                        <h3 class="box-title">Edit employee</h3>
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
                        {{ Form::open(array('route' => ['admin.employee.update', $data['id']], 'class' => 'form-horizontal','files'=>true,'name'=>'frmEditEmployee')) }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="" placeholder="First Name" value="{!! old('firstname',isset($data) ? $data['firstname']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" class="form-control" id="" placeholder="Last Name" value="{!! old('lastname',isset($data) ? $data['lastname']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Note</label>
                                <input type="text" name="note" class="form-control" id="" placeholder="Note" value="{!! old('note',isset($data) ? $data['note']:null ) !!}">
                            </div>

                            <div class="form-group">
                                <label for="">Facebook</label>
                                <input type="text" name="facebook" class="form-control" id="" placeholder="Facebook" value="{!! old('facebook_url',isset($data) ? $data['facebook_url']:null ) !!}">
                            </div>

                            <div class="form-group">
                                <label for="">Twitter</label>
                                <input type="text" name="twitter" class="form-control" id="" placeholder="Twitter" value="{!! old('twitter_url',isset($data) ? $data['twitter_url']:null ) !!}">
                            </div>

                            <div class="form-group">
                                <label for="">Tumblr</label>
                                <input type="text" name="tumblr" class="form-control" id="" placeholder="Tumblr" value="{!! old('tumblr_url',isset($data) ? $data['tumblr_url']:null ) !!}">
                            </div>

                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control" name="position">
                                    <option value="{!! $currentPosition[0]->idpt !!}" selected>
                                        {!! $currentPosition[0]->namept !!}
                                    </option>
                                   @foreach($otherPositionobj as $item)
                                       <option value="{!! $item->idpt !!}">
                                           {!! $item->namept !!}
                                       </option>

                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="currentImage">
                                <label for="">Current Photo</label>
                                <img src="{!! asset('images/employee/'.$data['photo'])  !!}" class="current_image_detail img-responsive" idHinh="{!! $data['id'] !!}" id="{!! $data['id'] !!}" />
                                <a href="javascript:void(0)" type="button" id="delPhotoEmployee" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
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
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection()
