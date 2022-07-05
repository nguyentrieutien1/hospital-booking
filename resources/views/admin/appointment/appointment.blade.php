<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    @include('admin.layouts.css.css')
</head>
<style>
    .row {
        width: 100%;
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
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Appointment Table</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="example" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Doctor</th>
                                                    <th>Room</th>
                                                    <th>Time</th>
                                                    <th>Specialist</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($appointments as $appointment)
                                                <tr>
                                                    <td>{{ $appointment->username }}</td>
                                                    <td>{{ $appointment->email }}</td>
                                                    <td>{{ $appointment->phone }}</td>
                                                    <td>{{ $appointment->name}}</td>
                                                    <td>{{ $appointment->room }}</td>
                                                    <td>{{ $appointment->time }}</td>
                                                    <td>{{ $appointment->specialist }}</td>
                                                    <td>
                                                        <button id="{{$appointment->appointment_id  }}"
                                                            class="{{ $appointment->status != 1 ? " btn btn-warning"
                                                            : "btn btn-success" }}">{{
                                                            $appointment-> status != 1 ? "Pedding" : "Completed"
                                                            }}</button>
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
<script>
    const buttons = document.querySelectorAll(".btn");
    buttons.forEach(btn => {
        btn.onclick = async() => {
            const id = btn.id;
            const response = await fetch(`http://localhost:8000/appointments/update/${id}`, {
            method: 'PUT', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
            'Content-Type': 'application/json',
            'X-CSSRF-TOKEN': document.querySelector("meta").getAttribute('content')
            },
            body: JSON.stringify({
            _token: document.querySelector("meta").getAttribute('content').trim()
            })
            });
            const result = await response.json();
            if(result.statusCode === 201) {
                window.location.reload()
            }
        }
    })
</script>

</html>
