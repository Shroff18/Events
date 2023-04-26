<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

if ($conn) {
    // echo "Connection success.";
} else {
    echo "Connection failed.";
}
error_reporting(0);
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Prem-Shroff</title>

    <!-- FOr log in model -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/newStyle.css">
    <style>
        .serviceHover:hover {
            color: #ff3e00;

        }

        input[type=date]:required:invalid::-webkit-datetime-edit {
            color: transparent;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <nav>
            <input type="checkbox" id="show-search">
            <input type="checkbox" id="show-menu">
            <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
            <div class="content">
                <div class="logo"><a href="#"><span>I</span>ndiGo <span> Events</span></a></div>
                <ul class="links">
                    <li><a href="#">Home</a></li>

                    <li>
                        <a href="#About-page" class="desktop-link">About </a>
                        <input type="checkbox" id="show-features">
                        <label for="show-features">About </label>
                        <ul>
                            <li><a href="#ABout-services">Our Services</a></li>
                            <li><a href="#About-page">About Us</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#Event-List" class="desktop-link">Events</a>
                        <input type="checkbox" id="show-events">
                        <label for="show-events">Events</label>
                        <ul>
                            <li><a href="#Event-List">Event List</a></li>
                            <!-- <li><a href="#">Event details</a></li> -->
                            <li><a href="#reg_form">Event Booking</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Gallary</a></li>
                    <li>
                        <a href="#" class="desktop-link">Blogs +</a>
                        <input type="checkbox" id="show-blogs">
                        <label for="show-blogs">Blogs +</label>
                        <ul>
                            <li><a href="#Event-List">Blogs</a></li>
                            <!-- <li><a href="#">Blog details</a></li>   -->
                        </ul>
                    </li>
                    <li><a href="#reg_form">Contact</a></li>
                </ul>

            </div>
            <div>
                <label for="show-search" class="search-icon search-user "><i class="fas fa-search"></i></label>
                <label for="show-Sigin-form" class="user-icon search-user" data-target="#mymodal" data-toggle="modal"><i class="fas fa-user"></i></label>
            </div>
            <form action="#" class="search-box">
                <input type="text" placeholder="Type Something to Search..." required>
                <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>

            </form>
        </nav>
    </div>


    <!-- LOgin form MOdal -->

    <div class="modal fade" id="mymodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2><u>Admin Signin !!</u></h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form method="POST" autocomplete="off">
                    <div class="modal-body">

                        <div class="form-group">
                            <i class="fas fa-user"></i> <label class="text">Email</label>
                            <input type="email" name="username" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-lock"></i> <label class="text">password</label>
                            <input type="password" name="pass" class="form-control" required="required">
                        </div>

                    </div>
                    <div class="forgot">
                        <p>
                            <label for="show-Sigin-form" class="user-icon search-user" data-target="#forgot-pass" data-toggle="modal" data-dismiss="modal">Forgot your password ?</label>
                        </p>

                        <p class="create-acc">Don't have any account
                            <label for="show-Sigin-form" class="user-icon search-user" data-target="#create-modal" data-toggle="modal" data-dismiss="modal">create one<i class="fas fa-user"></i></label>
                        </p>
                    </div>


                    <div class="modal-footer justify-content-center">
                        <a href=""><input type="submit" class="btn " VALUE="login" name="LOGINE"></a>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <?php
    if ($_POST['LOGINE']) {

        $NAME = $_POST['username'];
        $PASSWORD = $_POST['pass'];
        $HASH_PASSWORD = md5($PASSWORD);

        $qurey = "SELECT * FROM admin WHERE EMAIL='$NAME' && PASSWORD='$HASH_PASSWORD'";

        $data = mysqli_query($conn, $qurey);
        $total = mysqli_num_rows($data);

        if ($total == 1) {

            $_SESSION['user_name'] = $username;
            // header('location:user_list.php');
            echo "<script>alert('login successfully')</script>";
            // echo "login done";
        } else {
            echo "login failed";
        }
    }
    ?>


    <!-- foRGOT PASS -->
    <div class="modal fade forgot-pass" id="forgot-pass">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2><u>Forgot Password</u></h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="EVENTP/forgot_password.php" method="POST" autocomplete="on">
                    <div class="modal-body">

                        <div class="form-group">
                            <i class="fas fa-user"></i> <label class="text">Email</label>
                            <input type="email" name="EMAIL" class="form-control" required="required">
                        </div>

                    </div>

                    <div class="modal-footer justify-content-center">
                        <input type="submit" data-target="#update-pass" class="btn " value="Sent Email" name="send">
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- foRGOT PASS -->
    <div class="modal fade new-pass" id="update-pass">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2><u>Enter New Password</u></h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form method="POST" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="PASSWORD" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <input type="submit" class="btn " VALUE="Update" name="update-pass">
                    </div>
                </form>
            </div>

        </div>
    </div>



    <!-- Modal 2 for create a new account -->

    <form action="#" method="POST">

        <div class="modal fade" id="create-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><u>Create an Admin account !!</u></h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <form>
                            <div class="form-group">
                                <i class="fas fa-user"></i> <label class="text">Full Name</label>
                                <input type="text" name="NAME" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <i class="fas fa-envolope"></i> <label class="text">Email</label>
                                <input type="email" name="EMAIL" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock"></i> <label class="text"> creat password</label>
                                <input type="password" name="PASSWORD" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock"></i> <label class="text"> confirm password</label>
                                <input type="password" name="CPASSWORD" class="form-control" required="required">
                            </div>

                    </div>
    </form>
    <div class="modal-footer justify-content-center">
        <a href="#"><input type="submit" class="btn " value="Create" name="LOGIN"></a>
    </div>
    </div>

    </div>
    </div>
    </form>
    <?php

    if ($_POST['LOGIN']) {
        error_reporting(0);
        $NAME = $_POST['NAME'];
        $EMAIL = $_POST['EMAIL'];
        $PASSWORD = $_POST['PASSWORD'];
        $CPASSWORD = $_POST['CPASSWORD'];
        // $HASH_PASSWORD = md5($PASSWORD,$CPASSWORD);
        $HASH_PASSWORD = md5($PASSWORD);
        $HASH_CPASSWORD = md5($CPASSWORD);

        $email_find = "SELECT * FROM admin where EMAIL='$EMAIL'";
        $email_query = mysqli_query($conn, $email_find);
        $email_checked = mysqli_num_rows($email_query);

        if (!$email_checked > 0) {

            if ($PASSWORD == $CPASSWORD) {

                $user_query = "INSERT INTO admin(NAME,EMAIL,PASSWORD,CPASSWORD) VALUES('$NAME','$EMAIL','$HASH_PASSWORD','$HASH_CPASSWORD')";
                $user_data = mysqli_query($conn, $user_query);

                if ($user_data) {
                    echo "<script>alert('Data saved successfully')</script>";
                } else {
                    echo "please try again later";
                }
            } else {
                echo "<script>alert('email is already exit')</script>";
            }
        } else {
            echo "<script>alert('Dont match password')</script>";
        }
    }
    ?>

    <!-- slider -->
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">One Stop Event Planner</h6>
                        <h1 class="display-3 my-4">WE Create<br />Memories</h1>
                        <a href="#About-page" class="btn btn-brand">About us</a>
                        <a href="#About-page" class="btn btn-outline-light ms-3">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">One Stop Event Planner</h6>
                        <h1 class="display-3 my-4">WE Create<br />Memories</h1>
                        <a href="#About-page" class="btn btn-brand">About us</a>
                        <a href="#About-page" class="btn btn-outline-light ms-3">Get Started</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="slide slide3">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">One Stop Event Planner</h6>
                        <h1 class="display-3 my-4">WE Create<br />Memories</h1>
                        <a href="#About-page" class="btn btn-brand">About us</a>
                        <a href="#About-page" class="btn btn-outline-light ms-3">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ABOUT PAGE -->

    <section id="About-page">
        <div class="cont">
            <div class="intro">
                <h6>Want to Know</h6>
                <h1>About-Us</h1>
            </div>
            <div class="uper-container">

                <div class="box">

                    <h2 class="one-stop">One-STop</h2>
                    <h1 class="main-heading"><span>No.1</span>Event <br> Managment</h1>

                    <!-- <button> <a href="#" class="about-btn"> 
            Get Started!</a></button> -->
                </div>
                <div class="box">

                    <h2 class="box-heading">Our Mission</h2>
                    <p class="para1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis repellat impedit magnam libero, molestias nihil. Sapiente assumenda modi quae ipsum dolores fugiat soluta reiciendis sunt. At, in. Eos, adipisci!</p>
                    <p class="para2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis labore consectetur, pariatur velit vel mollitia veniam. Nostrum optio iusto officiis obcaecati tempora! Vitae beatae sapiente, qui quis voluptate aut consequuntur!</p>
                </div>
                <div class="box">

                    <h2 class="box-heading">Our Vission</h2>
                    <p class="para1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis laudantium nesciunt officia magni. Minima dolore blanditiis volup Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <p class="para2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi esse odit alias, libero hic dolores quas ratione distinctio qui, aliquam sint sequi.</p>
                </div>

            </div>
        </div>
        </div>
    </section>

    <section>
        <div class="container2">
            <h2 class="one-stop">Why Choose Us</h2>

            <h1 class="heading">Firewall Advantages</h1>

            <div class="box-container">

                <div class="box">
                    <img src="images/svg1.png" alt="">
                    <h3>Friendly Team</h3>
                    <p>More THan 200 Teams.</p>
                </div>
                <div class="box">
                    <img src="images/whatsapp.png" alt="">
                    <h3>Unique Scenario</h3>
                    <p>We Do out of the Box.</p>
                </div>
                <div class="box">
                    <img src="images/brand.png" alt="">
                    <h3>Perfect Venue</h3>
                    <p>We have Perfect venues.</p>
                </div>
                <div class="box">
                    <img src="images/hrs.png" alt="">
                    <h3>24/7 Support</h3>
                    <p>Anytime Anywhere</p>
                </div>
                <div class="box">
                    <img src="images/memories.png" alt="">
                    <h3>Unforgetable Times</h3>
                    <p>We Create Best Memories.</p>
                </div>
                <div class="box">
                    <img src="images/bulb.png" alt="">
                    <h3>Brilliant Ideas</h3>
                    <p>We Think out of the box.</p>
                </div>
                <div class="box">
                    <img src="images/svg2.png" alt="">
                    <h3>Best Managment</h3>
                    <p>We have Best Managment.</p>
                </div>
                <div class="box">
                    <img src="images/hexagon.png" alt="">
                    <h3>Unique Scenario</h3>
                    <p>We have Perfect venues.</p>
                </div>

            </div>
        </div>
    </section>


    <!-- EVent List -->
    <section id="Event-List" style="margin:0vw 4vw">
        <div class="intro">
            <h6>Our Popular Works</h6>
            <h1>Master-STrokes</h1>
        </div>
        </div>

        </div>
        </div>
        <div class="section-container">
            <div class="columns content">
                <div class="content-container">
                    <h5> The malhotras Wedding- <span>2018</span></h5>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                        infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                        (injected humour and the like).

                        Many desktop <span id="dots">...</span><span id="more">publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                            infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                            (injected humour and the like).</span>
                    </p>
                    <button onclick="myFunction()" id="myBtn" class="button" style=" width:40%;">Read more</button>
                </div>
            </div>
            <div class="columns image" style="background-image:url('images/h1.jpg')">
                &nbsp;
            </div>
        </div>
        <div class="section-container">
            <div class="columns image" style="background-image:url('images/Bday1.jpg')">
                &nbsp;
            </div>
            <div class="columns content">
                <div class="content-container">
                    <h5>Birthday Event <span>2020</span></h5>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        Many desktop <span id="dots">...</span><span id="more">publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                            infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                            (injected humour and the like).</span>
                    </p>
                    <button onclick="myFunction()" id="myBtn" class="button" style=" width:40%;">Read more</button>
                </div>
            </div>
        </div>
        <div class="section-container">
            <div class="columns content">
                <div class="content-container">
                    <h5>PotDar Engagement<span></span></h5>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making Many desktop <span id="dots">...</span><span id="more">publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                            infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                            (injected humour and the like).</span>
                    </p>
                    <button onclick="myFunction()" id="myBtn" class="button" style=" width:40%;">Read more</button>
                </div>
            </div>
            <div class="columns image" style="background-image:url('images/Engadege1.jpg')">
                &nbsp;
            </div>
        </div>
        <div class="section-container">
            <div class="columns image" style="background-image:url('images/Disco.jpg')">
                &nbsp;
            </div>

            <div class="columns content">
                <div class="content-container">
                    <h5>The Disco Night-- <span>Mumbai</span></h5>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many Many desktop <span id="dots">...</span><span id="more">publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                            infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                            (injected humour and the like).</span>
                    </p>
                    <button onclick="myFunction()" id="myBtn" class="button" style=" width:40%;">Read more</button>
                </div>
            </div>
        </div>
        <div class="section-container">
            <div class="columns content">
                <div class="content-container">
                    <h5>Business Event <span>2022</span></h5>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many desktop <span id="dots">...</span><span id="more">publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                            infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                            (injected humour and the like).</span>
                    </p>
                    <button onclick="myFunction()" id="myBtn" class="button" style=" width:40%;">Read more</button>

                </div>
            </div>
            <div class="columns image" style="background-image:url('images/Business.jpg')">
                &nbsp;
            </div>
        </div>
        <div class="section-container">
            <div class="columns image" style="background-image:url('images/Holi.jpg')">
                &nbsp;
            </div>
            <div class="columns content">
                <div class="content-container">
                    <h5>Great Indian Festival <span>Burhanpur</span></h5>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        re Many desktop <span id="dots">...</span><span id="more">publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                            infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                            (injected humour and the like).</span>
                        (injected humour and the like).
                    </p>
                    <button onclick="myFunction()" id="myBtn" class="button" style=" width:40%;">Read more</button>
                    <script>
                        function myFunction() {
                            var dots = document.getElementById("dots");
                            var moreText = document.getElementById("more");
                            var btnText = document.getElementById("myBtn");

                            if (dots.style.display === "none") {
                                dots.style.display = "inline";
                                btnText.innerHTML = "Read more";
                                moreText.style.display = "none";
                            } else {
                                dots.style.display = "none";
                                btnText.innerHTML = "Read less";
                                moreText.style.display = "inline";
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>



    <!-- Gallary  -->
    <section class="gallary">
        <div class="gallary_header">
            <h1>Unforgettable MOments</h1>
        </div>

        <!-- Photo Grid -->
        <div class="gallary_row">

            <div class="gallary_column">
                <div class="img-hover-zoom">
                    <img src="images/h1.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/Bday1.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/20.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/h3.jpg" style="width:100%" alt="">
                </div>
            </div>

            <div class="gallary_column">
                <div class="img-hover-zoom">
                    <img src="images/g3.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/Engadege1.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/h2.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/Holi.jpg" style="width:100%" alt="">
                </div>


            </div>

            <div class="gallary_column">
                <div class="img-hover-zoom">
                    <img src="images/g2.jpg" style="width:100%" alt="">
                </div>

                <div class="img-hover-zoom">
                    <img src="images/Disco.jpg" style="width:100%" alt="">
                </div>

                <div class="img-hover-zoom">
                    <img src="images/g1.jpg" style="width:100%" alt="">
                </div>
            </div>

            <div class="gallary_column">
                <div class="img-hover-zoom">

                    <img src="images/4.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/h3.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/3.jpg" style="width:100%" alt="">
                </div>
                <div class="img-hover-zoom">
                    <img src="images/2.jpg" style="width:100%" alt="">
                </div>
            </div>

        </div>
    </section>
    <!--Our Experties-->


    <section class="bg-light" id="ABout-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h6>Our services</h6>
                        <h1>Claim TO Fame</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="projects-slider" class="owl-theme owl-carousel">
            <div class="project">
                <div class="overlay"></div>
                <img src="images/h1.jpg" alt="">
                <div class="content">
                    <h2><a href="#contactus" class="serviceHover">Wedding Events</a></h2>
                    <h6>Start Form <span> Rs 2k-5lacs</span></h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="images/Disco.jpg" alt="">
                <div class="content">
                    <h2><a href="#contactus" class="serviceHover">Music Events</a></a></h2>
                    <h6>Start Form <span> Rs 5k-4 lacs</span></h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="images/h2.jpg" alt="">
                <div class="content">
                    <h2><a href="#contactus" class="serviceHover">Engadgement Ceremonies</a></h2>
                    <h6>Start Form <span> Rs 2k-5lacs</span></h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="images/Bday1.jpg" alt="">
                <div class="content">
                    <h2><a href="#contactus" class="serviceHover">Birthday Events</a></h2>
                    <h6>Start Form <span> Rs 2k-5lacs</span> /-only</h6>
                </div>
            </div>

        </div>
    </section>



    <!-- REgister section -->
    <section class="form_body" id="reg_form">
        <div class="form_container">

            <form action="#" method="POST" enctype="multipart/form-data">
                <h2 id="contactus">Get In Touch</h2>
                <div class="row100">
                    <div class="form_col">
                        <div class="inputbox">
                            <input type="text" name="NAME" required />
                            <span class="text">FULL NAME</span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <div class="form_col">
                        <div class="inputbox">
                            <input type="text" name="PHONE" required />
                            <span class="text">Mobile</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row100">
                    <div class="form_col">
                        <div class="inputbox">
                            <input type="email" name="EMAIL" required>
                            <span class="text">Email</span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <div class="form_col">
                        <div class="inputbox">
                            <input type="text" name="ADDRESS" required>
                            <span class="text">City & State</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>

                <div class="row100">
                    <div class="form_col">
                        <div class="inputbox">
                            <input type="text" name="EVENT_TYPE" required>
                            <span class="text">Kind of Event</span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <div class="form_col">
                        <div class="inputbox">
                            <input type="date" name="EVENT_DATE" placeholder=" " required>
                            <span class="text">Event date</span>
                            <span class="line"></span>
                        </div>
                    </div>

                    <div class="form_col">
                        <div class="inputbox">
                            <input type="text" name="PEOPLES" required>
                            <span class="text">Number Of People</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>

                <div class="row100">
                    <div class="form_col">
                        <div class="inputbox textarea">
                            <textarea required="required" name="MESSEGE"></textarea>
                            <span class="text">Type your Messege...</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row100">
                    <div class="form_col">
                        <input type="submit" name="REGISTER">
                    </div>
                </div>
            </form>
        </div>

    </section>
    <?php

    if ($_POST['REGISTER']) {

        // $NAME = $_POST['NMAE'];
        $NAME = $_POST['NAME'];
        $PHONE = $_POST['PHONE'];
        $EMAIL = $_POST['EMAIL'];
        $ADDRESS = $_POST['ADDRESS'];
        $EVENT_TYPE = $_POST['EVENT_TYPE'];
        $EVENT_DATE = $_POST['EVENT_DATE'];
        $PEOPLES = $_POST['PEOPLES'];
        $MESSEGE = $_POST['MESSEGE'];
        $DATE_TIME = $_POST['DATE_TIME'];

        $email_find = "SELECT * FROM contact where EMAIL='$EMAIL'";
        $email_query = mysqli_query($conn, $email_find);
        $email_checked = mysqli_num_rows($email_query);

        if (!$email_checked > 0) {

            $user_query = "INSERT INTO contact(NAME,PHONE,EMAIL,ADDRESS,EVENT_TYPE,EVENT_DATE,PEOPLES,MESSEGE,DATE_TIME) VALUES('$NAME','$PHONE','$EMAIL','$ADDRESS','$EVENT_TYPE','$EVENT_DATE','$PEOPLES','$MESSEGE','$DATE_TIME')";

            $user_data = mysqli_query($conn, $user_query);

            if ($user_data) {
                // echo "Data saved successfully.";
                echo "<script>alert('Data saved successfully')</script>";
    ?>
                <meta http-equiv="refresh" content="0;url=http://localhost/final%20MINOR/index.php">
            <?php
            } else {
                echo "<script>alert('try again later')</script>";
            }
        } else {
            // echo "email is already exit";
            echo "<script>alert('email is already exit')</script>";
            ?>
            <meta http-equiv="refresh" content="0;url=http://localhost/final%20MINOR/index.php">
    <?php
        }
    }
    // else {
    //     echo "connection is secure";
    // }
    ?>


    <!-- REviews -->
    <section class="bg-light" id="reviews">

        <div class="owl-theme owl-carousel reviews-slider container">
            <div class="review">
                <div class="person">
                    <img src="images/team_1.jpg" alt="">
                    <h5>Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    ullam! In, nostrum. Dicta, vero nihil. Delectus minus vitae rerum voluptatum, excepturi incidunt ut,
                    enim nam exercitationem optio ducimus!</h3>
                <div class="stars">
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star-half'></i>
                </div>

            </div>
            <div class="review">
                <div class="person">
                    <img src="images/team_2.jpg" alt="">
                    <h5>Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    ullam! In, nostrum. Dicta, vero nihil. Delectus minus vitae rerum voluptatum, excepturi incidunt ut,
                    enim nam exercitationem optio ducimus!</h3>
                <div class="stars">
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star-half'></i>
                </div>

            </div>
            <div class="review">
                <div class="person">
                    <img src="images/team_2.jpg" alt="">
                    <h5>Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    ullam! In, nosio ducimus!</h3>
                <div class="stars">
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star-half'></i>
                </div>

            </div>
            <div class="review">
                <div class="person">
                    <img src="images/team_2.jpg" alt="">
                    <h5>Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    Delectus minus vitae rerum voluptatum, excepturi incidunt ut,
                    enim nam exercitationem optio ducimus!</h3>
                <div class="stars">
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star-half'></i>
                </div>

            </div>
            <div class="review">
                <div class="person">
                    <img src="images/team_2.jpg" alt="">
                    <h5>Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                </h3>
                <div class="stars">
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star-half'></i>
                </div>

            </div>
            <div class="review">
                <div class="person">
                    <img src="images/team_2.jpg" alt="">
                    <h5>Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    ullam! In, nostrum. Dicta, vero nihil. Delectus minus vitae rerum voluptatum, excepturi incidunt ut,
                    enim nam exercitationem optio ducimus!</h3>
                <div class="stars">
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star-half'></i>
                </div>

            </div>
            <div class="review">
                <div class="person">
                    <img src="images/team_3.jpg" alt="">
                    <h5>Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    ullam! In, nostrum. Dicta, vero nihil. Delectus minus vitae rerum voluptatum, excepturi incidunt ut,
                    enim nam exercitationem optio ducimus!</h3>
                <div class="stars">
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star'></i>
                    <i class='fa fas-star-half'></i>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->


    <footer class="footer-section">
        <div class="container">
            <div class="footer-cta py-5">
                <div class="row">
                    <div class="col-sm-6 col-xl-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Meet us</h4>
                                <span>South Delhi, New Delhi-110019</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call US</h4>
                                <span>939-864-9605</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>premshroff@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widget follow-us">
                            <div class="footer-logo">
                                <div class="logo"><a href="#"><span>F</span>irewall<br><span> Events</span></a></div>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>

                                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fab fa-instagram instagram-bg"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 useful-link">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">portfolio</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="footer-widget useful-link2">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Expert Team</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Latest News</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Our Insipiration </h3>
                            </div>
                            <!-- <div class="footer-text">
                  <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                </div>
                <div class="subscribe-form">
                  <form action="#">
                    <input type="text" placeholder="Email Address">
                    <button><i class="fab fa-telegram-plane"></i></button>
                  </form>
                </div> -->
                            <ul class="link-area images list-inline">
                                <li style="margin-left: 20px;">
                                    <a href="#"> <img src="images/ganeshji.png" style="height:25%;" alt="no images"></a>
                                </li>
                                <!-- <li>
                                    <a href="#"><img src="2.jpg" alt="no images"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="11.jpg" alt="no images"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="22.jpg" alt="no images"></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright © 2022, All Right Reserved <a href="#">Firwall-events</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 text-right d-none d-lg-block">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">services</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Gallary</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- FOOTER CLose -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
	</script> 
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js">
	</script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js">
	</script> -->

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    


</body>

</html>