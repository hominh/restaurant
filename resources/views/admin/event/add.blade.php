@extends('admin.master')

@section('content')
<style>
body {
  font-family: 'Roboto', sans-serif;
  -webkit-font-smoothing: antialiased;
}

.c-btn {
  font-size: 14px;
  text-transform: capitalize;
  font-weight: 600;
  display: inline-block;
  line-height: 36px;
  cursor: pointer;
  text-align: center;
  text-transform: uppercase;
  min-width: 88px;
  height: 36px;
  margin: 10px 8px;
  padding: 0 8px;
  text-align: center;
  letter-spacing: .5px;
  border-radius: 2px;
  background: #F1F1F1;
  color: #393939;
  transition: background 200ms ease-in-out;
  box-shadow: 0 3.08696px 5.82609px 0 rgba(0, 0, 0, 0.16174), 0 3.65217px 12.91304px 0 rgba(0, 0, 0, 0.12435);
}

.c-btn--flat {
  background: transparent;
  margin: 10px 8px;
  min-width: 52px;
}

.c-btn:hover {
  background: rgba(153, 153, 153, 0.2);
  color: #393939;
}

.c-btn:active {
  box-shadow: 0 9.6087px 10.78261px 0 rgba(0, 0, 0, 0.17217), 0 13.56522px 30.3913px 0 rgba(0, 0, 0, 0.15043);
}

.c-btn--flat, .c-btn--flat:hover, .c-btn--flat:active {
  box-shadow: none;
}

</style>
    <section class="content-header">
        <h1>
            Event
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
                        <h3 class="box-title">Add new event</h3>

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
                    <form role="form" action="{!! route('admin.event.store') !!}"  method="POST" enctype="multipart/form-data" class="dropzone" id="image-upload">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Intro</label>
                                <input type="text" name="intro" class="form-control" id="" placeholder="Intro">
                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control" id="" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <a class="c-btn c-datepicker-btn">
                                    <span class="material-icon">Date time</span>
                                </a>
                                <input type="text" name="output" class="form-control" id="output" placeholder="">
                                <!--<pre id="output"></pre>!-->
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea id="content" name="content" rows="10" cols="80">

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input type="text" name="tag" class="form-control" id="" placeholder="Tag" value="{!! old('tag') !!}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Avatar</label>
                                <input type="file" id="avatar" name="avatar">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" id="image" name="image[]" multiple>
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
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        //CKEDITOR.replace( 'intro' );
        CKEDITOR.replace( 'content' );
    </script>
@endsection()
