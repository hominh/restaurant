@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Contact

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
                        <h3 class="box-title">Edit contact</h3>
                    </div>

                        {{ Form::open(array('route' => ['admin.contact.update', $data['id']], 'class' => 'form-horizontal','files'=>true)) }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Location 1</label>
                                <input type="text" name="location1" class="form-control" id="" placeholder="Location 1" value="{!! old('location1',isset($data) ? $data['location1']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Location 2</label>
                                <input type="text" name="location2" class="form-control" id="" placeholder="Location 2" value="{!! old('location1',isset($data) ? $data['location2']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Support phone</label>
                                <input type="text" name="support_phone" class="form-control" id="" placeholder="Support phone" value="{!! old('support_phone',isset($data) ? $data['support_phone']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" id="" placeholder="Address" value="{!! old('address',isset($data) ? $data['address']:null ) !!}">
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
