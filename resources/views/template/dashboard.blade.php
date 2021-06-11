@include('include.header')
@include('include.body')
@include('include.navbar')
@include('include.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('include.breadcumb')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @yield('main')


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

@include('include.footer')
