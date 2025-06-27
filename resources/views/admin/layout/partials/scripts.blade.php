 <!-- Bootstrap bundle JS -->
    <script src="{{ url('public/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ url('public/admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/pace.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <!--app-->
    <script src="{{ url('public/admin/assets/js/app.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/index.js') }}"></script>

    <script>
        new PerfectScrollbar(".best-product")
        new PerfectScrollbar(".top-sellers-list")
    </script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthChange: true,
                ordering: true,
                info: true,
                autoWidth: false
            });
        });


    </script>
