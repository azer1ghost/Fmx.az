
<!-- footerBottomSection -->
<div  class="footerBottomSection">
    <div class="center">
        Copyright &copy; 2017-<?php echo date("Y")?> FMX MMC | Design By : <a href="http://www.adesings.com/" target="_blank">Adesing.com</a>
</div>
    
</div>

<!-- JS Global Compulsory -->
<script type="text/javascript" src="assets/custom/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="assets/custom/js/modernizr.custom.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script type="text/javascript" src="assets/custom/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/custom/js/modernizr.js"></script>
<script type="text/javascript" src="assets/custom/js/jquery.cslider.js"></script>
<script type="text/javascript" src="assets/custom/js/jquery.sticky.js"></script>

<!-- JS Page Level -->
<script type="text/javascript" src="assets/custom/js/app.js"></script>
<script type="text/javascript" src="assets/custom/js/index.js"></script>


<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initSliders();
        Index.initParallaxSlider();
    });
</script>
<script>
    $(document).ready(function() {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>

<script type="text/javascript">
$(document).ready(function () {
        var url = window.location;
    // Will only work if string in href matches with location
        $('ul.nav a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
        $('ul.nav a').filter(function () {
            return this.href == url;
        }).parent().addClass('active').parent().parent().addClass('active');
    });
</script>

</body>

</html>