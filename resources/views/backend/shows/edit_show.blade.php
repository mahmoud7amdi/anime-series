@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="rounded h-100 p-4" style="font-weight: bolder">
                <h6 class="mb-4">Update Show</h6>
                <form id="myForm" method="post" action="{{ route('update.show') }}" enctype="multipart/form-data">
                    @method('Put')
                    @csrf
                    <input type="hidden" name="id" value="{{ $show->id }}">
                    <input type="hidden" name="old_image" value="{{ $show->image }}">
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label text-dark">Name</label>
                        <input type="name" name="name" class="form-control" value="{{ $show->name }}"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label  text-dark">Description</label>
                        <input type="text" name="description" class="form-control" value="{{ $show->description }}">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label text-dark">Type</label>
                        <input type="text" name="type" class="form-control" value="{{ $show->type }}"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label text-dark">Studios</label>
                        <input type="text" name="studios" class="form-control" value="{{ $show->studios }}" >
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label text-dark">Data Aired</label>
                        <input type="text" name="data_aired" class="form-control" value="{{ $show->data_aired }}"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label text-dark">Status</label>
                        <input type="text" name="status" class="form-control"  value="{{ $show->status }}">
                    </div>
                    <div class="mb-2">
                        <label for="category_id" class="form-label text-dark"> Category</label>
                        <select  name="category_id" class="form-select mb-3" aria-label="Default select example">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $show->category_id ? 'selected' : '' }}>{{ $category->name }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label text-dark">Duration</label>
                        <input type="text" name="duration" class="form-control"  value="{{ $show->duration }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-dark">Quality</label>
                        <input type="text" name="quality" name="name" class="form-control" value="{{ $show->quality }}">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label text-dark">Iamge</label>
                        <input class="form-control" name="image" value="{{  $show->image }}" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <img id="showImage" src=" {{  asset($show->image) }}"  alt="Admin" style="width: 100px; height: 100px;" width="110">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->



{{-- <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                banner_url: {
                    required : true,
                },
                banner_title: {
                    required : true,
                },
                banner_url: {
                    required : true,
                },
                banner_title: {
                    required : true,
                },
                banner_url: {
                    required : true,
                },
                banner_title: {
                    required : true,
                },
                banner_url: {
                    required : true,
                },
                banner_title: {
                    required : true,
                },
                banner_url: {
                    required : true,
                },
            },
            messages :{
                banner_title: {
                    required : 'Please Enter Banner Title',
                },
                banner_url: {
                    required : 'Please Enter Banner URl',
                },
                banner_title: {
                    required : 'Please Enter Banner Title',
                },
                banner_url: {
                    required : 'Please Enter Banner URl',
                },
                banner_title: {
                    required : 'Please Enter Banner Title',
                },
                banner_url: {
                    required : 'Please Enter Banner URl',
                },
                banner_title: {
                    required : 'Please Enter Banner Title',
                },
                banner_url: {
                    required : 'Please Enter Banner URl',
                },
                banner_title: {
                    required : 'Please Enter Banner Title',
                },
                banner_url: {
                    required : 'Please Enter Banner URl',
                },

            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script> --}}



 {{--    show image when change it--}}
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
