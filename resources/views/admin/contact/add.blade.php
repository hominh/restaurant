@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            <small>advanced tables</small>
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
                        <h3 class="box-title">Add new contact</h3>

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
                    @if(session('message'))
                        {{session('message')}}
                    @endif
                    <form role="form" action="{!! route('admin.contact.store') !!}"  method="POST">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Location 1</label>
                                <input type="text" name="location1" class="form-control" id="" placeholder="Location 1">
                            </div>
                            <div class="form-group">
                                <label for="">Location 2</label>
                                <input type="text" name="location2" class="form-control" id="" placeholder="Location 2">
                            </div>
                            <div class="form-group">
                                <label for="">Support phone</label>
                                <input type="text" name="support_phone" class="form-control" id="" placeholder="Support phone">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" id="" placeholder="Address">
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

@endsection()
