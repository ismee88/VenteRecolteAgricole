<!-- Javascript -->
<script src="{{asset('backend/assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{asset('backend/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('backend/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('backend/assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{asset('backend/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob-->

{{--summernote--}}
<script src="{{asset('backend/assets/summernote/summernote.js')}}"></script>

{{--switch-button-bootstrap--}}
<script src="{{asset('backend/assets/vendor/switch-button-bootstrap/dist/bootstrap-switch-button.min.js')}}"></script>


<script src="{{asset('backend/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

<script src="{{asset('backend/assets/vendor/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js --> 
<script src="{{asset('backend/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/bundles/jquery-datatable.js')}}"></script>
<script src="{{asset('backend/assets/js/index.js')}}"></script>

@yield('scripts')

<script>
    setTimeout(function(){
        $('#alert').slideUp();
    },4000)
</script>