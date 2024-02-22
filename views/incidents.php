<?php
/*
 * Created on Jan 9th Jan 2023
 *
 * Devlan Solutions LTD - www.devlan.co.ke 
 *
 * hello@devlan.co.ke
 *
 *
 * The Devlan Solutions LTD End User License Agreement
 *
 * Copyright (c) 2022 Devlan Solutions LTD
 *
 * 1. GRANT OF LICENSE
 * Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 * install and activate this system on two separated computers solely for your personal and non-commercial use,
 * unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 * or allowing other individuals to view the contents of this Software, is in violation of this license.
 * You may not make the Software available on a network, or in any way provide the Software to multiple users
 * unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 * 2. COPYRIGHT 
 * The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 * You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 * 3. RESTRICTIONS ON USE
 * You may not, and you may not permit others to
 * (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 * (b) modify, distribute, or create derivative works of the Software;
 * (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 * otherwise exploit the Software.  
 *
 * 4. TERM
 * This License is effective until terminated. 
 * You may terminate it at any time by destroying the Software, together with all copies thereof.
 * This License will also terminate if you fail to comply with any term or condition of this Agreement.
 * Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 * 5. NO OTHER WARRANTIES. 
 * DEVLAN SOLUTIONS LTD DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 * DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 * EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 * SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 * ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 * INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 * SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 * THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 * HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 * 6. SEVERABILITY
 * In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 * affect the validity of the remaining portions of this license.
 *
 * 7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD  OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 * CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 * USE OF THE SOFTWARE, EVEN IF DEVLAN HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 * IN NO EVENT WILL DEVLAN  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 * TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 */
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../helpers/incidents.php');
require_once('../partials/head.php');
?>


<body>
    <div class="page-wraper">

        <!-- Header -->
        <header class="header">
            <div class="main-bar">
                <div class="container">
                    <div class="header-content">
                        <div class="left-content">
                            <a href="javascript:void(0);" class="back-btn">
                                <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z" fill="#a19fa8" />
                                </svg>
                            </a>
                        </div>
                        <div class="mid-content">
                            <h5 class="mb-0">Reported Incidents</h5>
                        </div>
                        <div class="right-content">
                            <a href="javascript:void(0);" class="menu-toggler">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M16.0755 2H19.4615C20.8637 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8637 10.5345 19.4615 10.5345H16.0755C14.6732 10.5345 13.537 9.38864 13.537 7.97452V4.55996C13.537 3.14585 14.6732 2 16.0755 2Z" fill="#a19fa8" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="#a19fa8" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- Preloader end-->

        <!-- Sidebar -->
        <?php require_once('../partials/sidebar.php'); ?>

        <!-- Sidebar End -->


        <!-- Page Content -->
        <div class="page-content">

            <div class="content-inner pt-0">
                <div class="container fb">
                    <!-- Search -->
                    <form class="m-b30">
                        <div class="input-group">
                            <span class="input-group-text">
                                <a href="javascript:void(0);" class="search-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z" fill="#B9B9B9" />
                                    </svg>
                                </a>
                            </span>
                            <input type="text" placeholder="Search..." id="search" onkeyup="FilterFunction()" name="field_name" class="form-control ps-0 bs-0">
                        </div>
                    </form>
                    <?php if ($_SESSION['login_rank'] == 'Road User' || $_SESSION['login_rank'] == 'Admin') { ?>
                        <div class="d-flex flex-row-reverse">
                            <button type="button" class="btn w-10 btn-primary mb-2 text-center" data-bs-toggle="modal" data-bs-target="#AddModal">Report Incident</button>
                        </div>
                    <?php } ?>
                    <!-- Add Modal -->
                    <div class="modal fade" id="AddModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Report Incident</h5>
                                    <button class="btn-close" data-bs-dismiss="modal">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <?php
                                                $users_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM road_users u
                                                    INNER JOIN login l ON u.user_login_id = l.login_id
                                                    WHERE l.login_id = '{$_SESSION['login_id']}'"
                                                );
                                                if (mysqli_num_rows($users_sql) > 0) {
                                                    while ($user = mysqli_fetch_array($users_sql)) {
                                                ?>
                                                        <input type="hidden" name="road_incident_user_id" value="<?php echo $user['user_id']; ?>">
                                                <?php }
                                                } ?>
                                                <label class="text-center">Type <span class="text-danger">*</span></label>
                                                <select type="text" name="road_incident_type" required class="form-control">
                                                    <option value="">Select type</option>
                                                    <option value="Road Accident">Road Accident</option>
                                                    <option value="Fire Accident">Fire Accident</option>
                                                    <option value="Medical Emergency">Medical Emergency</option>
                                                    <option value="Towing">Towing</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div> <br>
                                            <div class="form-group col-md-12">
                                                <label class="text-center">Incident location</label>
                                                <select type="text" name="road_incident_location_id" class="form-control select2">
                                                    <option >Search location</option>
                                                    <?php
                                                    /* Pull List Of Locations */
                                                    $locations_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM locations"
                                                    );
                                                    if (mysqli_num_rows($locations_sql) > 0) {
                                                        while ($locations = mysqli_fetch_array($locations_sql)) {
                                                    ?>
                                                            <option>
                                                                <?php echo $locations['location_name']; ?>
                                                            </option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div><br>
                                            <p class="text-center">Or Pin Location</p>
                                            <div class="form-group col-md-12">
                                                <label>Pin Incident Location </label>
                                                <div id="map" style="height: 300px;"></div>
                                                <input type='hidden' name='incident_lat' id='lat'>
                                                <input type='hidden' name='incident_lng' id='lng'>
                                            </div>
                                            <br>
                                            <div class="form-group col-md-12">
                                                <label>Incident description <span class="text-danger">*</span></label>
                                                <textarea name="road_incident_description" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-center">
                                            <button name="ReportIncident" class="btn btn-primary" type="submit">
                                                <em class="icon ni ni-save"></em> Report Incident
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <!-- Dashboard Area -->
                    <div class="dashboard-area">

                        <div class="list item-list recent-jobs-list">

                            <div class="list item-list recent-jobs-list">
                                <ul>
                                    <?php
                                    /* Show Incidents As Per Access Level */
                                    if ($_SESSION['login_rank'] != 'Road User') {
                                        $incidents_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT * FROM road_incidents i"
                                        );
                                    } else {
                                        $incidents_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT * FROM road_incidents i
                                            INNER JOIN road_users u ON u.user_id = i.road_incident_user_id
                                            WHERE u.user_login_id = '{$_SESSION['login_id']}'"
                                        );
                                    }
                                    if (mysqli_num_rows($incidents_sql) > 0) {
                                        while ($incidents = mysqli_fetch_array($incidents_sql)) {
                                    ?>
                                            <li class="filter">
                                                <div class="item-content">
                                                    <a href="incident?view=<?php echo $incidents['road_incident_id']; ?>" class="item-media"><img src="../assets/images/welcome/incident.png" width="80" alt="logo"></a>
                                                    <div class="item-inner">
                                                        <div class="item-title-row">
                                                            <div class="item-subtitle text-danger"><?php echo date('d M Y g:ia', strtotime($incidents['road_incident_date_reported'])); ?></div>
                                                            <h6 class="item-title">
                                                                <a href="incident?view=<?php echo $incidents['road_incident_id']; ?>"><?php echo $incidents['road_incident_type']; ?></a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sortable-handler"></div>
                                            </li>
                                        <?php }
                                    } else { ?>
                                        <li class="filter">
                                            <div class="item-content">
                                                <a href="incident" class="item-media"><img src="../assets/images/welcome/incident.png" width="80" alt="logo"></a>
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-subtitle text-danger"><?php echo date('d M Y g:ia'); ?></div>
                                                        <h6 class="item-title text-danger">No reported incidents</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sortable-handler"></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                        </div>
                        <!-- Recent Jobs End -->

                    </div>
                </div>
            </div>

        </div>
        <!-- Page Content End-->
    </div>
    <!--**********************************
    Scripts
***********************************-->
    <?php require_once('../partials/scripts.php'); ?>
    <script>
        function initMap() {
            var myLatlng = new google.maps.LatLng(-0.43124, 36.93599);
            var mapProp = {
                center: myLatlng,
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP

            };
            var map = new google.maps.Map(document.getElementById("map"), mapProp);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Incident Location',
                draggable: true
            });
            document.getElementById('lat').value = -0.43124
            document.getElementById('lng').value = 36.93599
            document.getElementById('Location').value = "Nyeri, Kenya"
            // marker drag event
            google.maps.event.addListener(marker, 'drag', function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
                document.getElementById('Location').value = event.
            });

            //marker drag event end
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
                /* alert("lat=>" + event.latLng.lat());
                alert("long=>" + event.latLng.lng()); */
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</body>


</html>