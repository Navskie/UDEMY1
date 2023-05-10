@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xl-3">

                    <!-- Simple card -->
                    <div class="card">
                        <br>
                        <center>
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile))? url('upload/admin_img/'.$adminData->profile):url('upload/no_image.jpg') }}" alt="Card image cap">
                        </center>
                        <hr>
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title">Username : {{ $adminData->username }}</h4>
                            <hr>
                            <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded">Edit Profile</a>
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
        </div>
    </div>

@endsection('admin')