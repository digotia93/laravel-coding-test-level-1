@if(Session::has('success'))
<div class="card card-success alert-div">
    <div class="card-header">
        <b class="card-title"><i class="fas fa-info-circle"></i> {!! Session::get('success') !!}</b>
        <div class="card-tools">
            <button type="button" class="btn btn-tool">
                <i class="fa fa-times float-right btn-close-alert"></i>
            </button>
        </div>
    </div>
</div>
@elseif(Session::has('error'))
<div class="card card-danger alert-div">
    <div class="card-header">
        <b class="card-title"><i class="fas fa-info-circle"></i> {!! Session::get('error') !!}</b>
        <div class="card-tools">
            <button type="button" class="btn btn-tool">
                <i class="fa fa-times float-right btn-close-alert"></i>
            </button>
        </div>
    </div>
</div>
@endif
@if ($errors->any())
<div class="card card-danger alert-div">
    <div class="card-header">
        <span class="card-title">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}<br/>
                @endforeach
            </ul>    
        </span>
        <div class="card-tools">
            <button type="button" class="btn btn-tool">
                <i class="fa fa-times float-right btn-close-alert"></i>
            </button>
        </div>
    </div>
</div>
@endif