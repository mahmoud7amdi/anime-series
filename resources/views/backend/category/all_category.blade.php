@extends('admin.admin_dashboard')
@section('admin')

   <!-- Table Start -->
   <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All Categories</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th >Sl</th>
                            <th >Name</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories  as $key => $category)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="d-flex">
                                <a href="{{ route('edit.category',$category->id) }}" class="btn btn-info mx-1">Edit</a>
                                <a href="{{ route('destroy.category',$category->id) }}" id="delete" class="btn btn-danger mx-1">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->



@endsection
