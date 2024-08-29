<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">@lang('trans.Admin')</h3>
        </a>
        @php
        $id = Auth::user()->id;
        $data = App\Models\User::find($id);
    @endphp
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ (!empty($data->photo)) ? url('upload/admin_images/'.$data->photo):url('upload/no_image.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ $data->name }}</h6>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <div class="nav-item dropdown">
                <a href="{{ route('home') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>@lang('trans.Homepage')</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Buttons</a>
                    <a href="typography.html" class="dropdown-item">Typography</a>
                    <a href="element.html" class="dropdown-item">Other Elements</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>@lang('trans.Categories')</a>
                <div class="dropdown-menu bg-transparent border-0" style="margin-left: 30px">
                    <a href="{{ route('add.category') }}" class="dropdown-item" >@lang('trans.Add Category')</a>
                    <a href="{{ route('all.categories') }}" class="dropdown-item" >@lang('trans.All Categories')</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>@lang('trans.Shows')</a>
                <div class="dropdown-menu bg-transparent border-0" style="margin-left: 30px">
                    <a href="{{ route('add.show') }}" class="dropdown-item" >@lang('trans.Add Show')</a>
                    <a href="{{ route('all.show') }}" class="dropdown-item" >@lang('trans.All Shows')</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>@lang('trans.Episodes')</a>
                <div class="dropdown-menu bg-transparent border-0" style="margin-left: 30px">
                    <a href="{{ route('add.episode') }}" class="dropdown-item" >@lang('trans.Add Episode')</a>
                    <a href="{{ route('all.episodes') }}" class="dropdown-item" >@lang('trans.All Episodes')</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>@lang('trans.Role & Permi..')</a>
                <div class="dropdown-menu bg-transparent border-0" style="margin-left: 30px">
                    <a href="typography.html" class="dropdown-item">Add Admin</a>
                    <a href="element.html" class="dropdown-item">All Admin</a>
                </div>
            </div>
        </div>
    </nav>
</div>
