@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Information Page</h4>
                            <hr>
                            <form action="{{ route('store.profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <br>
                                    <center>
                                    <img class="rounded-circle avatar-xl" src="{{ (!empty($editData->profile))? url('upload/admin_img/'.$editData->profile):url('upload/no_image.jpg') }}" id="showImage" alt="Card image cap">
                                    </center>
                                    <br>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input name="name" id="name" class="form-control" type="text" value="{{ $editData->name }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" id="email" class="form-control" type="email" value="{{ $editData->email }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input name="username" id="username" class="form-control" type="text" value="{{ $editData->username }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input name="image" id="image" class="form-control" type="file">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3">
                                    <br>
                                    <input name="submit" class="btn waves-effects btn-info btn-rounded" value="Update Information" type="submit">
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready( function () {
        $("#image").change(function (e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#showImage").attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection('admin')