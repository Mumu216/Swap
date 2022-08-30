    <!-- Plugins JS File -->
    <script src="{{asset('frontend')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/superfish.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap-input-spinner.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.plugin.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="{{asset('frontend')}}/assets/js/main.js"></script>
    <script src="{{asset('frontend')}}/assets/js/demos/demo-4.js"></script>






      {{-- SSL Commerz  Sandbox Script --}}

      <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
      {{-- SSL Commerz  Sandbox Script --}}
