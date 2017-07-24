@extends('admin.master')

@section('content')
    <section class="content-header">
        <h1>
            Event

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Event</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tblData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Create by</th>
                                    <th>Created at</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0; ?>
                                @foreach($data as $item)
                                <?php $stt = $stt + 1; ?>
                                <tr>
                                    <td>{!! $stt !!}</td>
                                    <td>{!! $item->name !!}</td>
                                    <td>{!! $item->uname !!}</td>
                                    <td>{!! $item->created_at !!}</td>
                                    <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                        <a onclick="return confirmDelete('Are you sure Delete?')" href="{{ URL::route('admin.event.delete',$item->id) }}"> Delete</a>
                                    <i class="fa fa-pencil fa-fw"></i>
                                        <a href="{{ URL::route('admin.event.edit',$item->id) }}">Edit</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div/>
                </div>
            </div>
        </div>

    </section>

@endsection()
