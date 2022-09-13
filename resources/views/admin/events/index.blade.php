@extends('admin.layouts.app')
@section("content")


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Events</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Events</li>
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
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <form id="event_search_form" action="{{ route('events.index') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control col-md-12" placeholder="Search ID, Event Name, or Slug" value="{{ $_GET['search'] ?? null }}">
                                <span class="input-group-btn">
                                    <button id="reset-btn" class="btn btn-primary" type="button">Reset</button>            
                                    <button class="btn btn-primary" type="submit">Submit</button>                          
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 text-right mt-2">
                        <div class="form-group">
                            <a class="btn btn-success text-white" href="{{ route('events.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
                        </div>
                    </div>
                </div>
                @include('admin.layouts.includes.notification')
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-bordered table-hover" id="event-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events ?? [] as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->slug }}</td>
                                    <td>{{ date_format(date_create($event->createdAt), 'Y-m-d h:i A') }}</td>
                                    <td>{{ date_format(date_create($event->updatedAt), 'Y-m-d h:i A') }}</td>
                                    <td nowrap>
                                        {{-- <a class="btn btn-primary" href="{{ route('events.show', $event) }}"><i class="fa fa-eye"></i></a> --}}
                                        <a class="btn btn-warning" href="{{ route('events.edit', $event) }}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger delete-btn" data-href="#">
                                            <i class="fa fa-trash"></i>
                                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#event-table').DataTable({
            "autoWidth": true,
        });
    })

    $('#reset-btn').click(function() {
        $('input[name="search"]').val('');
    });
</script>
@endsection