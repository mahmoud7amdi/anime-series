@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"> Add Episode</h6>
                <form id="myForm" method="post" action="{{ route('store.episode') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="episode_name">Name</label>
                        <input type="name" name="episode_name" class="form-control"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="show_id" class="form-label text-dark"> Show</label>
                        <select name="show_id" class="form-select mb-3" aria-label="Default select example">
                            @foreach($shows as $show)
                            <option value="{{ $show->id }}">{{ $show->name }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="video" class="form-label text-dark">Vedio</label>
                        <input class="form-control" name="video" type="file" id="formFile">
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label text-dark">Iamge</label>
                        <input class="form-control" name="thumbnail" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <img id="showImage" src=" {{  url('upload/no_image.jpg') }}" alt="eps" style="width: 100px; height: 100px;" width="110">
                    </div>

                    <button type="submit" class="btn btn-primary">Store</button>
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


