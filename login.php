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

<body>

<?php
include("./includes/header.html");
include ("./includes/dbcon.php");
if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from signup where email='$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if ($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];
        $pas_decode = password_verify($password, $db_pass );
        if ($pas_decode){
            ?>
            <script>
                alert("Log in successfully")
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Password incorrect")
            </script>
            <?php
        }
    }
    else
    {
            ?>
        <script>
            alert("In-valid email")
        </script>
        <?php
    }
}

?>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" style="color: black">
        <h1></h1>
        <div style="width: 250px;height: 300px;border-width: 1px;border-color: white;border-style: solid;border-radius: 10px;text-align: center;background-color: rgba(250,247,247,0.19)">

            <form method="post" action="<?php  echo htmlentities($_SERVER['PHP_SELF']);
            ?>">
                <h3 style="color: white;text-align: center;margin-top: 20px">LogIn Here</h3>
            <input type="text" name="email" placeholder="Enter your E-mail" style="border: none;background-color: rgba(255,255,255,0.34);width: 200px;height: 30px;color: white;margin-top: 30px">
            <input type="password" name="password" placeholder="Enter your Password" style="border: none;background-color: rgba(255,255,255,0.34);width: 200px;height: 30px;color: white;margin-top: 10px">
<input type="submit" value="Login Now" name="submit" style="width: 200px;height: 40px;border: none;background-color: rgba(40,195,245,0.42);margin-top: 20px;color: white">
                <p style="color: white;font-size: 12px;margin-top: 10px">Not have an Account? <a href="signin.php">SignUp here</a></p>
                <a href="logout.php" style="background-color: #0f3d81;height: 30px;width: 250px;;font-size: 14px;padding: 5px;">Logout</a>
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

