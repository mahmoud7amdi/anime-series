@extends('admin.admin_dashboard')
@section('admin')
<!-- Sale & Revenue Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <h5 class="mb-2">@lang('trans.Number Of Categories')</h5>
                    <h6 class="mb-0">{{ $category }} </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">@lang('trans.Number Of Shows')</p>
                    <h6 class="mb-0">{{ $show }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">@lang('trans.Number Of Episodes')</p>
                    <h6 class="mb-0">{{ $episode }}</h6>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Sale & Revenue End -->



@endsection
