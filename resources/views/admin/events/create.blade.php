@extends('admin.layouts.app')

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Event</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('events.index')}}">Event</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-12 text-right">
                        <div class="form-group">
                            <a class="btn btn-primary text-white" href="{{ route('events.index') }}"><i class="fa fa-list"></i> Index</a>
                        </div>
                    </div>
                    @include('admin.layouts.includes.notification')
                    <form action="{{ route('events.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
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
                                    <div class="col-md-4 mt-1">
                                        <div class="form-group">
                                            <label class="control-label">Event Name* :</label>
                                            <input type="text" class="form-control @error('event_name') is-invalid @enderror" name="event_name" placeholder="Enter event name..." value="{{ old('event_name') }}" required>
                                            @error('event_name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right"><i class="fa fa-plus"></i> Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

