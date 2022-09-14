@extends('admin.layouts.app')
@section("content")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Show Event</h1>
                    </div>
                    <div class="col-sm-6">          
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('events.index')}}">Events</a></li>
                            <li class="breadcrumb-item active">Show</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-right">
                                <div class="form-group">
                                    <a class="btn btn-primary text-white" href="{{ route('events.index') }}"><i class="fa fa-list" aria-hidden="true"></i> Index</a>
                                    @guest
                                    @else
                                    <a class="btn btn-warning text-white" href="{{ route('events.edit', $event->id) }}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                    <a class="btn btn-danger text-white delete-btn">
                                        <i class="fa fa-trash" aria-hidden="true"></i> 
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        Delete
                                    </a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                        @include('admin.layouts.includes.notification')
                        <div class="card card-primary">
                            <div class="card-header">
                                <b class="card-title"><i class="fas fa-calendar"></i> Event Information</b>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 mt-1">
                                        <div class="form-group">
                                            <label class="control-label">Name :</label>
                                            <p class="form-control-static">{{ $event->name ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-1">
                                        <div class="form-group">
                                            <label class="control-label">Slug :</label>
                                            <p class="form-control-static">{{ $event->slug ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-1">
                                        <div class="form-group">
                                            <label class="control-label">Created At :</label>
                                            <p class="form-control-static">{{ date_format(date_create($event->createdAt), 'Y-m-d h:i A') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-1">
                                        <div class="form-group">
                                            <label class="control-label">Updated At :</label>
                                            <p class="form-control-static">{{ date_format(date_create($event->updatedAt), 'Y-m-d h:i A') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
