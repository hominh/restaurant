@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Post Type
            <small>advanced tables</small>
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
                        <h3 class="box-title">Add new post type</h3>

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
                    <form role="form" action="{!! route('admin.posttype.store') !!}"  method="POST">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Keyword</label>
                                <input type="text" class="form-control" name="keyword" id="" placeholder="Keyword">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control" id="" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="">Order</label>
                                <input type="text" name="order" class="form-control" id="" placeholder="Order">
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
