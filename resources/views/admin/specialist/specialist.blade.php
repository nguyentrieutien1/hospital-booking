<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.layouts.css.css')
</head>
<style>
    .card {
        width: 500px !important;
    }

    input {}

    form button {
        float: right
    }

    .error {
        color: red;
    }
</style>

<body>

    @include('sweetalert::alert')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        {{-- HEADER --}}
        @include('admin.layouts.header.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            {{-- SETTING LAYOUTS --}}
            @include('admin.layouts.setting.setting')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('admin.layouts.slidebar.slidebar')
            <!-- partial -->
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    @if (!$isUpdate)
                                    <form action="{{ url('specialist/create') }}" method="POST" role="form">
                                        @csrf
                                        <legend>Form Register Specialist</legend>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}" placeholder="Enter Specialist Name">
                                            @error('name')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    @else
                                    <form action="{{ url('specialist/update', [" id"=> $specialist->id]) }}"
                                        method="POST" role="form">
                                        @csrf
                                        @method('put')
                                        <legend>Form Update Specialist</legend>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $specialist->name }}" placeholder="Enter Specialist Name">
                                            @error('name')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="card">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Specialist</p>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th class="pl-0  pb-2 border-bottom">Name</th>
                                            <th class="border-bottom pb-2">Create Date</th>
                                            <th class="border-bottom pb-2" style="text-align: center">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($specialists as $specialist)
                                        <tr>
                                            <td class="pl-0
                                                pb-0">
                                                {{ $specialist->name }}</td>
                                            <td class="pb-0">
                                                <p class="mb-0"><span class="font-weight-bold mr-2">{{
                                                        $specialist->created_at }}</span>
                                                </p>
                                            </td>
                                            <td class="pb-0" style="text-align: center"><a
                                                    href="{{ url('specialist/update', ['id' => $specialist->id]) }}">
                                                    <button class="btn btn-primary">Update</button></a>

                                                <a onclick="return confirm('Are you sure?')"
                                                    href="{{ url('specialist/delete', ['id' => $specialist->id]) }}">
                                                    <button class="btn btn-warning">Delete</button>
                                                </a>

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
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('admin.layouts.jsCode.jsCode')
    <!-- End custom js for this page-->
</body>

</html>
