<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>HOME</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- Google Fonts -->
    <!-- Vendor CSS Files -->
    @include('client.layouts.css.css')

    <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    .table-container {

        margin: 150px auto !important;
    }

    tbody button {

        color: white !important;
    }

</style>
<body>
    @include('sweetalert::alert')

    <!-- ======= Top Bar ======= -->
    <!-- ======= Header ======= -->
    @include('client.layouts.header.header')
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <div class="row ">
        <div class="col-8 table-container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Doctor</th>
                        <th>Room</th>
                        <th>Time</th>
                        <th>Specialist</th>
                        <th>Status</th>
                    </tr>
                    </th>
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
                            <button id="{{$appointment->appointment_id  }}" class="{{ $appointment->status != 1 ? " btn btn-warning"
                                                            : "btn btn-success" }}">{{
                                                            $appointment-> status != 1 ? "Pedding" : "Approved"

                                                            }}</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('client.layouts.jsCode.code')

</body>

</html>
