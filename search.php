<?php

    include_once("./include/header.php");

    include_once("./include/conn.inc.php");

    if ($_SESSION == true) {

?>

<script type="text/javascript">
function do_search()
{
 var search_term=$("#search_term").val();
 $.ajax
 ({
  type:'post',
  url:'result.php',
  data:{
   search:"search",
   search_term:search_term
  },
  success:function(response) 
  {
   document.getElementById("result_div").innerHTML=response;
    // console.log(response);
  }
 });
 
 return false;
}
</script>

<!-- Search Start -->

<div id="wrapper">

<div id="search_box">
 <form method="post"action="" onsubmit="return do_search();">
  <input type="text" id="search_term" name="search_term" placeholder="Enter Search" onkeyup="do_search();">
  <input type="submit" name="search" value="SEARCH">
 </form>
</div>


</div>

<!-- Search End -->



    <!-- Team Start -->
    <div class="team" id="lawyers">
        <div class="container">
            <div class="row">
                <div id="result_div"></div>
            </div>
        </div>
    </div>

    <!-- Team End -->



<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="footer-about">
                    <h2>About Us</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu lectus a leo tristique dictum nec non quam. Suspendisse convallis, tortor eu placerat rhoncus, lorem quam iaculis felis, sed eleifend lacus neque id eros. Integer convallis volutpat neque
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-8">
                <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="footer-link">
                    <h2>Services Areas</h2>
                    <a href="#attorneys">Civil Law</a>
                    <a href="#attorneys">Family Law</a>
                    <a href="#attorneys">Business Law</a>
                    <a href="#attorneys">Education Law</a>
                    <a href="#attorneys">Immigration Law</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="footer-link">
                    <h2>Useful Pages</h2>
                    <a href="">About Us</a>
                    <a href="">Practices</a>
                    <a href="#attorneys">Attorneys</a>
                    <a href="">Case Studies</a>
                    <a href="">FAQs</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="footer-contact">
                    <h2>Get In Touch</h2>
                    <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope"></i>info@example.com</p>
                    <div class="footer-social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="container footer-menu">
        <div class="f-menu">
            <a href="">Terms of use</a>
            <a href="">Privacy policy</a>
            <a href="">Cookies</a>
            <a href="">Help</a>
            <a href="">FAQs</a>
        </div>
    </div>
    <div class="container copyright">
        <div class="row">
            <div class="col-md12">
                <p>&copy; <a href="#">Lawyer</a>, All Right Reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

</div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
<?php

}
else {
    ?>
        <script>
            window.location.assign("./user_login");
        </script>
    <?php
}
?>