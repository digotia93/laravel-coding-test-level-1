@extends('admin.layouts.app')
@section("content")


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Question One</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Question One</li>
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
                    <div class="col-12 my-3">
                        <h5>Please provide solutions for the questions below by using PHP with any framework you’re familiar with.</h5>
                        Provide restful APIs with the following requirements:
                        <ul>
                            <li>Basic mathematical operations (addition, subtraction, multiplication, and division).</li>
                            <li>Memory add feature. Allow adding calculated results into memory (or cache). </li>
                            <li>Allows performing mathematical operations on the value in memory. <br>
                                E.g. If you have “100” in memory, then you perform “plus 10” operation, the value in the memory will be “110”.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id="operation_form" action="{{ route('question-one') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">First Number</label>
                                        <input type="number" id="first_number" class="form-control" value="{{ $cachedOutputNumber }}" disabled>
                                        <button type="button" class="btn btn-primary clear-btn mt-2 px-2">Clear</button>
                                    </div>
                                </div>
                                <div class="col-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="second_number">Operator</label>
                                        <select name="operator" class="form-control">
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                            <option value="*">×</option>
                                            <option value="/">÷</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="second_number">Second Number</label>
                                        <input type="number" name="second_number" class="form-control" step="0.01" required>&nbsp;
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label><br>
                                        <button type="submit" class="btn btn-success submit-btn px-2">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('.clear-btn').click(function() {
        $.ajax({
            url: "{{ route('clear-output-number-cache') }}",
            type: "POST",
            data: ({
                _token: "{{ csrf_token() }}",
            }),
            dataType : "json",
            async: true,
            success: function(data){
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cache cleared!',
                    timer: 2000,
                    showConfirmButton: false
                })
            },
            error: function(data){
                console.log( "No service available" );
            }
        }).responseText;
        $('#first_number').val(0);
    });

    @if(Session::has('error'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ Session::get("error") }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif
</script>
@endsection