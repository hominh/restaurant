@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Food

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
                        <h3 class="box-title">Edit food</h3>
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
                        {{ Form::open(array('route' => ['admin.food.update', $data['id']], 'class' => 'form-horizontal','files'=>true,'name'=>'frmEditFood')) }}

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
                                <label for="">Price</label>
                                <input type="text" name="price" class="form-control" id="" placeholder="Price" value="{!! old('price',isset($data) ? $data['price']:null ) !!}">
                            </div>
                            <div class="form-group">
                                <label for="">Intro</label>
                                <textarea id="intro" name="intro" rows="10" cols="80">
                                    {!! old('description',isset($data) ? $data['intro']:null ) !!}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea id="content" name="content" rows="10" cols="80">
                                    {!! old('description',isset($data) ? $data['content']:null ) !!}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input type="text" name="tag" class="form-control" id="" placeholder="Tag" value="{!! old('description',isset($data) ? $strTag:null ) !!}">
                            </div>
                            <div class="form-group" id="currentImage">
                                <label for="">Current Image</label>
                                <img src="{!! asset('images/food/'.$data['image'])  !!}" class="current_image_detail img-responsive" idHinh="{!! $data['id'] !!}" id="{!! $data['id'] !!}" />
                                <a href="javascript:void(0)" type="button" id="delImageFood" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                            </div>

                            <div class="form-group" id="newImage" style="display: block;">
                                    <label for="exampleInputFile">New Image</label>
                                    <input type="file" id="image" name="newimage">
                            </div>

                            <div class="form-group">
                                <label>Food type</label>
                                <select class="form-control" name="foodtype">
                                    <option value="">Select Foodtype</option>

                                    <option value="{!! $currentFoodtypeobj[0]->idft !!}" selected>
                                        {!! $currentFoodtypeobj[0]->nameft !!}
                                    </option>
                                   @foreach($otherFoodtypeobj as $item)
                                       <option value="{!! $item->idft !!}">
                                           {!! $item->nameft !!}
                                       </option>

                                   @endforeach
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
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'intro' );
        CKEDITOR.replace( 'content' );

    </script>

@endsection()
