<!-- jQuery -->
<script src="{{ asset('backoffice/js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backoffice/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
{{-- <script src="{{ asset('backoffice/js/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
<!-- BS custom file input  -->
<script src="{{ asset('backoffice/js/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backoffice/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backoffice/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('backoffice/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backoffice/js/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backoffice/js/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backoffice/js/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('backoffice/js/chart.js/Chart.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('backoffice/css/select2/js/select2.full.min.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
</script>

<!-- page script -->
<script defer>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

     
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
  
  })
</script>


<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<!-- Page script -->
<script>
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    })
</script>

