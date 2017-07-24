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
            Employee
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
                        <h3 class="box-title">Add new employee</h3>

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
                    <form role="form" action="{!! route('admin.employee.store') !!}"  method="POST" enctype="multipart/form-data" class="dropzone" id="image-upload">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="" placeholder="First Name">
                            </div>

                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" class="form-control" id="" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <label for="">Note</label>
                                <input type="text" name="note" class="form-control" id="" placeholder="Note">
                            </div>
                            <div class="form-group">
                                <label for="">Facebook</label>
                                <input type="text" name="facebook" class="form-control" id="" placeholder="Facebook">
                            </div>
                            <div class="form-group">
                                <label for="">Twitter</label>
                                <input type="text" name="twitter" class="form-control" id="" placeholder="Twitter">
                            </div>
                            <div class="form-group">
                                <label for="">Tumblr</label>
                                <input type="text" name="tumblr" class="form-control" id="" placeholder="Tumblr">
                            </div>
                            <div class="form-group">
                                <label for="">Facebook</label>
                                <input type="text" name="facebook" class="form-control" id="" placeholder="Facebook">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Photo</label>
                                <input type="file" id="photo" name="photo">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control" name="position">
                                    <option value="">Select position</option>
                                    @foreach($positions as $item)
                                        <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                    @endforeach()
                                </select>
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
