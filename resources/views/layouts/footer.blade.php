</div>
 <div class="sidebar-overlay" data-reff=""></div>
 <script>
    $(document).ready(function()  
{
        // Your JavaScript code here
        console.log("jQuery is working!");
    });
</script>


    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/feather.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.waypoints.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/chart-data.js')}}"></script>


    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.js') }}"></script>

    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>


    <script>
        function startTime() {
          const today = new Date();
          let h = today.getHours();
          let m = today.getMinutes();
          let s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);
          document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
          setTimeout(startTime, 1000);
        }

        function checkTime(i) {
          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
        }
        </script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    {{-- <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="b76be323c2d9ff8fbb2037f0-|49" defer=""></script> --}}
</body>

</html>
