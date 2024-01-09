<?php
require_once('../partials/head.php');
?>

<body>
    <div class="page-wraper">

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- Preloader end-->

        <!-- Page Content -->
        <div class="page-content">
            <!-- Banner -->
            <div class="banner-wrapper shape-1">
                <div class="container inner-wrapper">
                    <h2 class="dz-title">Collaborative Road Rescue Ready</h2>
                    <br>
                </div>
            </div>
            <!-- Banner End -->
            <br><br><br><br><br><br>
            <div class="container">
                <h2 class="dz-title">Sign Up</h2>
                <p class="mb-0">Please sign up to your account</p><br><br>
                <div class="account-area">
                    <form class="">
                        <div class="input-group">
                            <input type="text" placeholder="User Name" class="form-control">
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" id="dz-password" class="form-control be-0">
                            <span class="input-group-text show-pass">
                                <i class="fa fa-eye-slash"></i>
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <button type="submit" name="register" class="btn mt-2 btn-primary w-100 btn-rounded">Register</button>
                        </div>
                        <div class="input-group">
                            <p class="text-center mb-0">Already have account? <a href="login">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Page Content End -->
    </div>
    <!--**********************************
    Scripts
    ***********************************-->
    <?php require_once('../partials/scripts.php'); ?>
</body>


</html>