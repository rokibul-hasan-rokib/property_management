<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/tiny-slider.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/navbar.js')}}"></script>
<script src="{{asset('js/counter.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.all.min.js"></script>
   <script>
       $('.select2').select2()

       if ('{{ session()->has('message') }}') {
           Swal.fire({
               position: "top-end",
               icon: "{{ session()->get('class') == 'success' ? 'success' : 'error' }}",
               title: "{{ session()->get('message') }}",
               showConfirmButton: false,
               timer: 3000,
               toast: true,
               timerProgressBar: true
           });
       }
   </script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
