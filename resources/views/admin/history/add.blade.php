@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            History
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
                        <h3 class="box-title">Add new history</h3>

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
                    <form role="form" action="{!! route('admin.history.store') !!}"  method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="text" name="year" class="form-control" id="" placeholder="Year">
                            </div>

                            <div class="form-group">
                                <label for="">Content</label>
                                <br />
                                <textarea id="content" name="content" rows="10" cols="80">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="Image">Imagess</label>
                                <input type="file" id="image" name="image">
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
