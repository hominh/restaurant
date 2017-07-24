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
                    
                        {{ Form::open(array('route' => ['admin.foodtype.update', $data['id']], 'class' => 'form-horizontal','files'=>true)) }}
                        
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name" value="{!! old('name',isset($data) ? $data['name']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Keyword</label>
                                <input type="text" class="form-control" name="keyword" id="" placeholder="Keyword" value="{!! old('keyword',isset($data) ? $data['keyword']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control" id="" placeholder="Description" value="{!! old('description',isset($data) ? $data['description']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Order</label>
                                <input type="text" name="order" class="form-control" id="" placeholder="Order" value="{!! old('order',isset($data) ? $data['order']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label>Parent type</label>
                                <select class="form-control" name="parent">
                                    <option value="0">Not select</option>
                                    <option value="1">option 1</option>
                                    <option value="2">option 2</option>
                                    <option value="3">option 3</option>
                                </select>
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