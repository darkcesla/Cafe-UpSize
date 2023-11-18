<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/internal.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/photo-gallery.js') }}" type="text/javascript"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115890069-7"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/method.js')}}"></script>

@yield('script')
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

    @if(session('success'))
        showToast('{{ session('success') }}');
    @endif

    function showToast(message) {

    Toastify({
        text: message,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: 'top',
        position: 'center',
        backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
        stopOnFocus: true
    }).showToast();
    }
</script>