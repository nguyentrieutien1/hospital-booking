<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.layouts.css.css')
</head>
<style>
    .card {
        width: 400px !important;
    }

    input {}

    form button {
        float: right
    }

    .error {
        color: red;
    }

    .row {
        width: 100%
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
                                    @if (!$update)
                                    <form method="POST" action="{{ route('register') }}">
                                        @method('POST')
                                        @csrf
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example1">Username</label>
                                                    <input type="text" id="form3Example1" class="form-control"
                                                        name="username" placeholder="Enter Username"
                                                        value="{{ old('username') }}" />
                                                    @error('username')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example2">Address</label>
                                                    <input type="text" id="form3Example2" class="form-control"
                                                        placeholder="Enter Address" name="address"
                                                        value="{{ old('address') }}" />
                                                    @error('address')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3">Email</label>
                                            <input type="email" id="form3Example3" class="form-control"
                                                placeholder="Enter Email" name="email" value="{{ old('email') }}" />
                                            @error('email')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div><!-- Role input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3">Role</label>
                                            <select name="role" id="input" class="form-control" required="required">

                                                @foreach ($roles as $role)
                                                <option @selected($role->id == 2) value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">Password</label>
                                            <input type="password" id="form3Example4" class="form-control"
                                                placeholder="Enter Password" name="password"
                                                value="{{ old('password') }}" />
                                            @error('password')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Password Comfirm -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">Password Comfirm</label>
                                            <input type="password" id="form3Example4" class="form-control"
                                                placeholder="Enter Password Comfirm" name="repassword"
                                                value="{{ old('repassword') }}" />
                                            @error('repassword')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Checkbox -->
                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Sign up
                                        </button>
                                        <!-- Register buttons -->
                                    </form>
                                    @else<form method="POST" action="{{ url("account/update", ["id"=> $account->id])
                                        }}">
                                        @method('put')
                                        @csrf
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example1">Username</label>
                                                    <input type="text" id="form3Example1" class="form-control"
                                                        name="username" placeholder="Enter Username"
                                                        value="{{ $account->username }}" />
                                                    @error('username')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example2">Address</label>
                                                    <input type="text" id="form3Example2" class="form-control"
                                                        placeholder="Enter Address" name="address"
                                                        value="{{ $account->address }}" />
                                                    @error('address')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3">Email</label>
                                            <input type="email" id="form3Example3" class="form-control"
                                                placeholder="Enter Email" name="email" value="{{ $account->email }}" />
                                            @error('email')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div><!-- Role input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3">Role</label>
                                            <select name="role" id="input" class="form-control" required="required"
                                                value={{ $account->roleId }}>

                                                @foreach ($roles as $role)
                                                <option @selected($role->id == $account->roleId) value="{{
                                                    $role->id}}">
                                                    {{ $role->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">Password</label>
                                            <input type="password" id="form3Example4" class="form-control"
                                                placeholder="Enter Password" name="password"
                                                value="{{ old('password') }}" />
                                            @error('password')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Password Comfirm -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">Password Comfirm</label>
                                            <input type="password" id="form3Example4" class="form-control"
                                                placeholder="Enter Password Comfirm" name="repassword"
                                                value="{{ old('repassword') }}" />
                                            @error('repassword')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Checkbox -->

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Update
                                        </button>
                                        <!-- Register buttons -->
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
                            <p class="card-title mb-0">Accounts</p>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th class="pl-0  pb-2 border-bottom">Username</th>
                                            <th class="border-bottom pb-2">Address</th>
                                            <th class="border-bottom pb-2">Email</th>
                                            <th class="border-bottom pb-2" style="text-align: center">
                                                Role</th>
                                            <th class="border-bottom pb-2" style="text-align: center">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account)
                                        <tr>
                                            <td class="pl-0
                                                pb-0">
                                                {{ $account->username }}</td>
                                            <td class="pb-0">
                                                <p class="mb-0"><span class="font-weight-bold mr-2">{{ $account->address
                                                        }}</span>
                                                </p>
                                            </td>
                                            <td class="pb-0">{{ $account->email }}</td>
                                            <td class="pb-0">
                                                {{ $account->roleId == 1 ? 'ADMIN' : 'CUSTOMER' }}</td>
                                            <td class="pb-0" style="text-align: center">
                                                <a href="{{ url('account/update', ['id' => $account->id]) }}">
                                                    <button class="btn btn-primary">Update</button></a>
                                                <a onclick="return confirm('Are you sure?')"
                                                    href="{{ url('account/delete', ['id' => $account->id]) }}">
                                                    <button class="btn btn-warning">Delete</button></a>
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
<script></script>

</html>
