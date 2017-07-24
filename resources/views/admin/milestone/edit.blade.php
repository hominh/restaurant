@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            FootType

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
                        <h3 class="box-title">Edit food type</h3>
                    </div>

                        {{ Form::open(array('route' => ['admin.milestone.update', $data['id']], 'class' => 'form-horizontal','files'=>true)) }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name" value="{!! old('name',isset($data) ? $data['name']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Author</label>
                                <input type="text" class="form-control" name="author" id="" placeholder="Author" value="{!! old('author',isset($data) ? $data['author']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
								<br />
                                <textarea id="content" name="content" rows="10" cols="80">
                                    {!! old('content',isset($data) ? $data['content']:null ) !!}
                                </textarea>
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
