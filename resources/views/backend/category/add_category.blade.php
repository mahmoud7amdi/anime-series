@extends('admin.admin_dashboard')
@section('admin')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Category</h6>
                <form id="myForm" method="post" action="{{ route('store.category') }}">
                    @csrf
                    <div>
                        @if($errors->has('name'))
                        <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control"  id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn btn-primary">Store</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
