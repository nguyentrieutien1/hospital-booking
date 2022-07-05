<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.layouts.css.css')
</head>

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
            @include('admin.main')
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
