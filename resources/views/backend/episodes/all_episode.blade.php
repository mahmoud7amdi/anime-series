@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">All Episodes</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Show Name</th>
                                <th>Thumbnail</th>
                                <th >Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($episodes as $key => $episode)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $episode->episode_name }}</td>
                                <td>{{ $episode['show']['name'] }}</td>
                                <td><img src="{{ asset($episode->thumbnail) }}" style="width: 70px; height: 40px;"></td>
                                <td class="d-flex">
                                    <a href="{{ route('edit.episode',$episode->id) }}" class="btn btn-info mx-1">Edit</a>
                                    <a href="{{ route('destroy.episode',$episode->id) }}" id="delete" class="btn btn-danger mx-1">Delete</a>
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



@endsection
