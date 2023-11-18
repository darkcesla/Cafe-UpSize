<link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/icofont/css/icofont.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/js/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style1.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    /* Styling h1 and links
    ––––––––––––––––––––––––––––––––– */
    h1[alt="Simple"] {color: white;}
    a[href], a[href]:hover {text-decoration: none}

    .starrating > input {display: none;}  /* Remove radio buttons */

    .starrating > label:before { 
      content: "\f005"; /* Star */
      margin: 2px;
      font-size: 2em;
      font-family: FontAwesome;
      display: inline-block; 
    }

    .starrating > label
    {
      color: #222222; /* Start color when not clicked */
    }

    .starrating > input:checked ~ label
    { color: #ffca08 ; } /* Set yellow color when star checked */

    .starrating > input:hover ~ label
    { color: #ffca08 ;  } /* Set yellow color when star hover */

</style>
@yield('css')