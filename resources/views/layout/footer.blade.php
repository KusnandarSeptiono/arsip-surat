<!-- page-body-wrapper ends -->
<!-- container-scroller -->
<!-- base:js -->
<script src="{{('asset_baru/vendors/js/vendor.bundle.base.js')}}"></script>

<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{('asset_baru/js/off-canvas.js')}}"></script>
<script src="{{('asset_baru/js/hoverable-collapse.js')}}"></script>
<script src="{{('asset_baru/js/template.js')}}"></script>
<script src="{{('asset_baru/js/settings.js')}}"></script>
<script src="{{('asset_baru/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{('asset_baru/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{('asset_baru/vendors/chart.js/Chart.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{('asset_baru/js/dashboard.js')}}"></script>

<script src="{{('asset_baru/vendors/js/vendor.bundle.base.js')}}"></script>

<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{('asset_baru/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{('asset_baru/vendors/select2/select2.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{('asset_baru/js/file-upload.js')}}"></script>
<script src="{{('asset_baru/js/typeahead.js')}}"></script>
<script src="{{('asset_baru/js/select2.js')}}"></script>
@stack('script')
<!-- SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- End custom js for this page-->
</body>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @elseif(Session::has('error'))
    toastr.error("{{ Session::get('error') }}")
    @endif
</script>

</html>