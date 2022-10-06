@extends('admin.layouts.app')
@section("content")


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Question Two</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Question Two</li>
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
                        <h5>Recommend movies to a user based on the frequency it has been watched by the user’s social network (friends and also friends of friends).
                        <ul>
                            <li>Assumes that the social network has provided the following apis to call:
                                <ol>Get friends - GET /mysocianetwork/user/{userid}/friends</ol>
                                <ol>Get movies watched - GET /mysocianetwork/user{userid}/movies</ol>
                            </li>
                            <li>Please complete the implementation using the User Interface below. You may add in any additional classes.<br>
                                < ?php<br>
                                Interface IUser{<br>
                                    //Return a list of users who are the current user direct friends<br>
                                    public function getFriends();<br><br>
                                    //Return a list of movies that the current’s user has watched.<br>
                                    public function getMoviesWatched();<br><br>
                                    //Return a list of recommended movies.<br>
                                    Public function recommendMovie();<br>
                                    }<br>
                                ? ><br>
                            </li>
                            Or you may achieve the above result by using abstraction method.
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ route('user-interface') }}" target="_blank" class="btn btn-info text-white">
                            <i class="fa fa-eye" aria-hidden="true"></i> 
                            Link Here
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
</script>
@endsection