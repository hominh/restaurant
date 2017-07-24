@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Milestone
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
                        <h3 class="box-title">Add new Milestone</h3>

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
                    <form role="form" action="{!! route('admin.milestone.store') !!}"  method="POST">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Author</label>
                                <input type="text" class="form-control" name="author" id="" placeholder="Author">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
								<br />
                                <textarea id="content" name="content" rows="10" cols="80">

                                </textarea>
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
