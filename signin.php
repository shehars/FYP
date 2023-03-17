<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mountrails</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<?php
include("./includes/header.html");
include ("./includes/dbcon.php");

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);


    $pass = password_hash($password,PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "select  * from signup where email='$email' ";
    $query = mysqli_query($con, $emailquery);


    $emailcount = mysqli_num_rows($query);

    if ($emailcount>0){
        echo "email already exits";
    }
    else{
        if($password === $cpassword){
            $insertquery = "insert into signup(username, email, mobile, password, cpassword) values ('$username','$email','$phone','$pass','$cpass')";
            $iquery = mysqli_query($con, $insertquery);
            if ($iquery){
                      ?>
                         <script>
                          alert("connection successful")
                         </script>
                      <?php
                         }
                      else{
                      ?>
                       <script>
                          alert("No connection")
                        </script>
                      <?php
            }
        }
        else{
                      ?>
            <script>
                alert("password are not matching")
            </script>
            <?php
        }
    }

}

?>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <div style="width: 250px;height: 380px;border-width: 1px;border-color: white;border-style: solid;border-radius: 10px;text-align: center;background-color: rgba(250,247,247,0.19)">

            <form method="post" action="<?php  echo htmlentities($_SERVER['PHP_SELF']);
            ?>">
                <h3 style="color: white;text-align: center;margin-top: 10px">Creat Account</h3>
                <input type="text" name="username" placeholder="Enter Your Username" required style="border: none;background-color: rgba(255,255,255,0.34);width: 220px;height: 30px;color: white;margin-top: 30px">
                <input type="email" name="email" placeholder="Enter your E-mail"  required style="border: none;background-color: rgba(255,255,255,0.34);width: 220px;height: 30px;color: white;margin-top: 10px">
                <input type="number" name="phone" placeholder="Enter your Phone Number" required style="border: none;background-color: rgba(255,255,255,0.34);width: 220px;height: 30px;color: white;margin-top: 10px">
                <input type="password" name="password" placeholder="Enter your Password" required style="border: none;background-color: rgba(255,255,255,0.34);width: 220px;height: 30px;color: white;margin-top: 10px">
                <input type="password" name="cpassword" placeholder="Confirm your Password" required style="border: none;background-color: rgba(255,255,255,0.34);width: 220px;height: 30px;color: white;margin-top: 10px">
                <input type="submit" value="Create Account" name="submit" style="width: 220px;height: 30px;border: none;background-color: rgba(40,195,245,0.42);margin-top: 20px;color: white">
                <p style="color: white;font-size: 12px;margin-top: 10px">Have an Account? <a href="login.php">login</a></p>
            </form>
        </div>
    </div>
</section><!-- End Hero -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>

