@extends('admin.admin_dashboard')
@section('admin')





        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">

                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">All Shows</h6>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table class="table" style="font-weight: bolder "  >
                                <thead>
                                    <tr class="text-dark">
                                        <th class="text-dark" >Name</th>
                                        <th >Image</th>
                                        <th >Description</th>
                                        <th >Type</th>
                                        <th >Data Aired</th>
                                        <th >Category</th>
                                        <th >Duration</th>
                                        <th >Quality</th>
                                        <th >Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shows as $show)
                                    <tr class="text-dark">
                                        <td>{{ $show->name }}</td>
                                        <td><img src="{{ asset($show->image) }}" style="width: 70px; height: 40px;"></td>
                                        <td>{{ $show->description }}</td>
                                        <td>{{ $show->type }}</td>
                                        <td>{{ $show->data_aired }}</td>
                                        <td>{{ $show['category']['name'] }}</td>
                                        <td>{{ $show->duration }}</td>
                                        <td>{{ $show->quality }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('edit.show',$show->id) }}" class="btn btn-info mx-1">Edit</a>
                                            <a href="{{ route('destroy.show',$show->id) }}" id="delete" class="btn btn-danger mx-1">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->




@endsection
