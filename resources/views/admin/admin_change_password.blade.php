@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password Page</h4>
                            <hr>

                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $error }}</div>
                                @endforeach
                            @endif

                            <form action="{{ route('update.password') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input name="oldpassword" id="oldpassword" class="form-control" type="password" value="">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input name="newpassword" id="newpassword" class="form-control" type="password" value="">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Re-type New Password</label>
                                    <div class="col-sm-10">
                                        <input name="confirmpassword" id="confirmpassword" class="form-control" type="password" value="">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3">
                                    <br>
                                    <input name="submit" class="btn waves-effects btn-info btn-rounded" value="Change Password" type="submit">
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection('admin')