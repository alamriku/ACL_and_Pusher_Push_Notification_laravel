<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('public')}}/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{asset('public')}}/assets/node_modules/popper/popper.min.js"></script>
<script src="{{asset('public')}}/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('public')}}/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="{{asset('public')}}/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{asset('public')}}/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{asset('public')}}/dist/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{asset('public')}}/assets/node_modules/raphael/raphael-min.js"></script>
<script src="{{asset('public')}}/assets/node_modules/morrisjs/morris.min.js"></script>
<script src="{{asset('public')}}/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Popup message jquery -->
<script src="{{asset('public')}}/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="{{asset('public')}}/dist/js/dashboard1.js"></script>
<script src="{{asset('public')}}/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<!--Custom JavaScript -->
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });


    // Enable pusher logging -  No need to add in Production
     Pusher.logToConsole = true;
    // Initialization the Pusher JS library
    var pusher = new Pusher('82474607f46df8e685c0', {
        cluster: 'ap1',
        forceTLS: true
    });
    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('post-liked');
    // Bind a function to an Event (the full Laravel class)
    //var PostLiked="{{'App\Events\PostLiked'}}";
    channel.bind('PostLiked', function(data) {
        // this is called when the event notification is received...
        $('.notify').css('display','block');
        $('.riku-notification').html(data);
       // alert(pusher(data));
    });

</script>