@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slider Page</h4>
                            <hr>
                            <form action="{{ route('update.slide', $homeslide->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $homeslide->id }}">

                                <div class="mb-3">
                                    <br>
                                    <center>
                                    <img class="rounded-circle avatar-xl" src="{{ (!empty($homeslide->home_slide))? url('upload/home_slide/'.$homeslide->home_slide):url('upload/no_image.jpg') }}" id="showImage" alt="Card image cap">
                                    </center>
                                    <br>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" id="title" class="form-control" type="text" value="{{ $homeslide->title }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input name="short_title" id="short_title" class="form-control" type="text" value="{{ $homeslide->short_title }}">
                                    </div>
                                </div>
                                <!-- end row -->  
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input name="video_url" id="video_url" class="form-control" type="text" value="{{ $homeslide->video_url }}">
                                    </div>
                                </div>
                                <!-- end row -->  
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Slider</label>
                                    <div class="col-sm-10">
                                        <input name="home_slide" id="home_slide" class="form-control" type="file">
                                    </div>
                                </div>
                                <!-- end row --> 
                                <div class="mb-3">
                                    <br>
                                    <input name="submit" class="btn waves-effects btn-info btn-rounded" value="Update Slide" type="submit">
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