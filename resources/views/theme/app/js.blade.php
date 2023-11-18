<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="{{ asset ('admin-assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset ('admin-assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('admin-assets/plugins/sidemenu/sidemenu.js') }}"></script>
<script src="{{ asset ('admin-assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset ('admin-assets/js/circle-progress.min.js') }}"></script>
<script src="{{ asset ('admin-assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('admin-assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset ('admin-assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset ('admin-assets/js/sticky.js') }}"></script>
<script src="{{ asset ('admin-assets/js/themeColors.js') }}"></script>
<script src="{{ asset ('admin-assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('js/method.js')}}"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(session()->has('success'))
    toastr.options = {
        "closeButton": true
    }
    toastr.success("{{ session()->get('success') }}")
    @endif
    
    @if(session()->has('error'))
    toastr.options = {
        "closeButton": true
    }
    toastr.error("{{ session()->get('error') }}")
    @endif

</script>
@yield('custom_js')