@extends('admin.admin_dashboard')
@section('admin')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Update Category</h6>
                <form id="myForm" method="post" action="{{ route('update.category') }}">
                    @csrf
                   @method('PUT')
                   <input type="hidden" name="id" value="{{ $categories->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputEmail1" value="{{  $categories->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
