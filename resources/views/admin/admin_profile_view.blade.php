@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Admin  Profile</h6>
                <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                    @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" value="{{ $adminData->name }}"  class="form-control" id="floatingInput"
                        placeholder="Enter Your Name">
                    <label for="floatingInput"></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" value="{{ $adminData->email }}" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput"></label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Your Profile Image</label>
                    <input class="form-control" name="photo" type="file" id="image">
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0"></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <img id="showImage" src=" {{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Admin" style="width: 100px; height: 100px;" width="110">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                </div>
            </form>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#image').change(function (e){
            var reader = new FileReader();
            reader.onload = function (e){
                $('#showImage').attr('src',e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
