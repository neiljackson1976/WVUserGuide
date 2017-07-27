<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Westgate View User Guide</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />

    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="" />

    <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
    <link href="favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet" />

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="lib/elementfonts/css/elementfonts.css" rel="stylesheet" />
    <link href="lib/animate-css/animate.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet" />


</head>
<body>
    <div id="preloader"></div>

    <!--==========================
      Hero Section
    ============================-->
    <section id="hero">
        <div class="hero-container">
            <div class="wow fadeIn">
                <div class="hero-logo">
                    <img class="" src="img/wv_logo_lg.png" alt="Westgate View">
                </div>

                <h1>...Your Element Home</h1>
                <h2>We create <span class="rotating">exciting homes, beautiful settings, functional spaces</span></h2>
                <div class="actions">
                    <a href="#about" class="btn-get-started">About this site</a>
                    <a href="#homedetails" class="btn-services">Your home</a>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Header Section
    ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="#hero"><img src="img/wv_logo.png" alt="" title="" /></img></a>
                <!-- Uncomment below if you prefer to use a text image -->
                <!--<h1><a href="#hero">Header 1</a></h1>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#yourhome">Your Home</a></li>
                    <li><a href="#homedetails">Home Details</a></li>
                    <li class="menu-has-children">
                        <a href="">Detailed Information</a>
                        <ul>
                            <li><a href="#Kitchen">Kitchen</a></li>
                            <li><a href="#Internet">Internet</a></li>
                            <li><a href="#Heating">Heating</a></li>
                            <li><a href="#Water">Water</a></li>
                            <li><a href="#Electricity">Electricity</a></li>
                            <li><a href="#FirePrevention">Fire Prevention</a></li>
                            <li><a href="#Security">Security</a></li>
                            <li><a href="#Decor">Decor</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->
    <!--==========================
      About Section
    ============================-->
    <section id="about">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">This site</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">Why have we made you a website?</p>
                </div>
            </div>
        </div>
        <div class="container about-container wow fadeInUp">
            <div class="row">
                <div class="col-md-6 col-md-push-6 about-content">
                    <h2 class="about-title">We want to make your life easier</h2>
                    <p class="about-text">
                        Moving into a new home is exciting, but it can also be a little intimidating.  Where can I turn off the water if I have to?  What colour paint is on the walls?  How do I work the heating system?
                    </p>
                    <p class="about-text">
                        This site is meant to provide you with a starting point for all of these questions.  Where possible, we also want to give you a place to record these items even if you decide to change them.
                    </p>
                    <p class="about-text">
                        Whilst we don't envisage that a site like this could ever hold all the information you'd need to know about your house, we'd be interested in your views over what we should add or omit for your site and for future sites.  Please do use the 'contact us' section to do this - we look forward to hearing from you.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
      Your home Section
    ============================-->
    <section id="yourhome">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Your Home</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">The basics</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Address:</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>[Site Address]</h5>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Telephone Number:</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>[Telephone Number]</h5>
                        </div>

                    </div>

                </div>
                <div class="col-md-8">

                    <img src="img/LocationMap.png" />
                </div>
        </div>

    </section>
    


    <!--==========================
      Home details Section
    ============================-->

        <?php
	include_once("Configure.php");
	global $wvdb;
	$sql = "Select HouseDetailText FROM HouseDetails where HouseDetailType=";
	$detailtype = "TelephoneNumber";
	$telephone_number = $wvdb->querySingle($sql.$detailtype.";");
	$detailtype = "RouterSSID";
	$router_SSID = $wvdb->querySingle($sql.$detailtype.";");
	$detailtype = "RouterAdminURL";
	$router_AdminURL = $wvdb->querySingle($sql.$detailtype.";");
	$detailtype = "RouterUser";
	$router_user = $wvdb->querySingle($sql.$detailtype.";");
	$detailtype = "RouterPassword";
	$router_pass = $wvdb->querySingle($sql.$detailtype.";");
	$detailtype = "IPAddress";
	$ip_address = $wvdb->querySingle($sql.$detailtype.";");
	$detailtype = "BroadbandUser";
	$broadband_user = $wvdb->querySingle($sql.$detailtype.";");
	$detailtype = "BroadbandPassword";
	$broadband_pass = $wvdb->querySingle($sql.$detailtype.";");
    ?>

        <section id="homedetails">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Home Details</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">Everything you need to know about your home</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 service-item">
                        <div class="homedetail-icon"><i class="icon-Kitchen_Vector"></i></div>
                        <h4 class="homedetail-title"><a href="#Kitchen">Kitchen</a></h4>
                        <p class="homedetail-description">Supplier, Spec, Appliances</p>
                    </div>
                    <div class="col-md-4 service-item">
                        <div class="homedetail-icon"><i class="icon-Internet"></i></div>
                        <h4 class="homedetail-title"><a href="#Internet">Telephones and Internet</a></h4>
                        <p class="homedetail-description">All the details to keep your home connected.</p>
                    </div>
                    <div class="col-md-4 service-item">
                        <div class="homedetail-icon"><i class="icon-Heating"></i></div>
                        <h4 class="homedetail-title"><a href="#Heating">Heating</a></h4>
                        <p class="homedetail-description">How your system works, and how to control it.</p>
                    </div>
                    <div class="col-md-4 service-item">
                        <div class="homedetail-icon"><i class="icon-Water"></i></div>
                        <h4 class="homedetail-title"><a href="#Water">Water</a></h4>
                        <p class="homedetail-description">All the details relating to your supply of water.</p>
                    </div>
                    <div class="col-md-4 service-item">
                        <div class="homedetail-icon"><i class="icon-plug"></i></div>
                        <h4 class="homedetail-title"><a href="#Electricity">Electricity</a></h4>
                        <p class="homedetail-description">Everything relating to your supply of electricity.</p>
                    </div>
                    <div class="col-md-4 service-item">
                        <div class="homedetail-icon"><i class="icon-FirePrevention"></i></div>
                        <h4 class="homedetail-title"><a href="#FirePrevention">Fire Prevention</a></h4>
                        <p class="homedetail-description">Your fire detection and protection systems.</p>
                    </div>
                    <div class="col-md-4 service-item">
                        <div class="homedetail-icon"><i class="icon-padlock"></i></div>
                        <h4 class="homedetail-title"><a href="#Security">Security</a></h4>
                        <p class="homedetail-description">The security features in your home.</p>
                    </div>
                    <div class="col-md-4 service-item">
                        <div class="homedetail-icon"><i class="icon-Paintbrush"></i></div>
                        <h4 class="homedetail-title"><a href="#Decor">Decor</a></h4>
                        <p class="homedetail-description">Everything you need to keep your home looking brand new.</p>
                    </div>

                </div>
            </div>
        </section>

        <section id="Kitchen">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Your Kitchen</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">Everything you need to know about your kitchen</p>
                    </div>
                </div>

            </div>
        </section>

        <section id="Internet">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Your Telephone and Internet</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">All you need to stay online in your house</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <h3>Telephone</h3>
                        <p>There is a single telephone line supplying the property.  It is currently supplied by Zen Internet (but using BT infrastructure).</p>
                        <p>The telephone number for the house is: </p>
                        <p>If you have a line fault, call this number (assuming you have mobile coverage): or click here:</p>

                        <h3>Broadband</h3>
                        <p>
                            You have been set up with a monthly contract for Zen Internet Broadband.  We would recommend you move to a longer contract to achieve lower prices.  We chose them based on price and broadband speeds.  At the time of writing, they use the same wires as BT, but give their customers more capacity and therefore achieve better speeds.  Please note:  You currently are running broadband over copper wires rather than fibre due to lack of availability in the area.  Should you require faster speeds in the future, do check here to see if fibre has been introduced.
                        </p>
                        <p>
                            You have been provided with a pre-configured modem router.  If you decide to get your own modem router, you will need the following information to set it up:
                        </p>
                        <ul>
                            <li>IP Address: <?php global $ip_address; echo $ip_address; ?><a href="UpdateDetail.php?DetailName=IPAddress">Update IP Address</a></li>
                            <li>Account: <?php global $broadband_user; echo $broadband_user; ?><a href="UpdateDetail.php?DetailName=BroadbandUser">Update Broadband Username</a></li>
                            <li>Password: <?php global $broadband_pass; echo $broadband_pass; ?><a href="UpdateDetail.php?DetailName=BroadbandPass">Update Broadband Password</a></li>

                        </ul>
                        <h3>Wifi</h3>
                        <p>
                            You have been set up with a monthly contract for Zen Internet Broadband.  We would recommend you move to a longer contract to achieve lower prices.  We chose them based on price and broadband speeds.  At the time of writing, they use the same wires as BT, but give their customers more capacity and therefore achieve better speeds.  Please note:  You currently are running broadband over copper wires rather than fibre due to lack of availability in the area.  Should you require faster speeds in the future, do check here to see if fibre has been introduced.
                        </p>
                        <h3>Easy set up</h3>
                        <p>
                            First things first:  You have a modem and router which are preconfigured to access the broadband.
                            Your router controls access to the internet for the house.  It looks like this:
                        </p>
                        <p>You've got to this site so you obviously know your wifi network ID, but in case this is a printout, it's: <?php global $router_SSID; echo $router_SSID; ?><a href="UpdateDetail.php?DetailName=RouterSSID">Update Wifi Network Name</a></p>

                        <p>Click <a href=<?php global $router_AdminURL; echo "'".$router_AdminURL."'";?> here</a> to configure your router.</p>

                        <p>The username and password for controlling the router are:</p>
                        <p>User: <?php global $router_user; echo $router_user; ?><a href="UpdateDetail.php?DetailName=RouterUser">Update Router Username</a></p>
                        <p>Password:</p>
                        <bl />
                        <p>We recommend you change these for your own security.</p>
                        <bl />
                        <p>You can use a standard Ethernet cable to plug a computer into one of the wall sockets.</p>
                        <bl />
                        <p>If you'd rather use wifi, the network id for the wifi router is [] and the password is [].  PLEASE NOTE: these are different to the router login details and should remain so.  We recommend you change this as soon as possible for your own security. Click [here] to configure the router with a new password (you'll need the router password above to do this).</p>
                        <p>That should be enough to get you onto the network with internet access.</p>
                        <bl />
                        <input type="checkbox" class="read-more-state" id="internet-read-more" />
                        <div class="read-more-wrap">
                            <p>Geek zone:  More information for those who want it.</p>

                            

                            <p class="read-more-target">Your broadband reaches the house in the utility cupboard next to the water cylinder.</p>
                            <p class="read-more-target">The master socket looks like this:</p>

                            <p class="read-more-target">At this point there is a filter which separates the telephone signal from the broadband.</p>

                            <p class="read-more-target">You can use any ADSL modem to access the broadband.  The login details (already configured on your modem/router) are below:</p>
                            <p class="read-more-target">User:</p>
                            <p class="read-more-target">Password:</p>
                            <p class="read-more-target">If you choose to change provider, these details will be supplied by them and will need to be updated in the modem.</p>
                            <p class="read-more-target">The internet is distributed around the house via wires attached to the back of the router.  To add more connections you will need an 'Ethernet switch' connected to the back of the router and then to the additional ports in the utility cupboard.</p>

                            <p class="read-more-target">Should the internet sockets in the house stop working, it is likely to be down to damage to the master socket, to the filter, to the router, to a cable or a failure in the Ethernet switch.</p>
                        </div>
                        <label for="internet-read-more" class="read-more-trigger"></label>
                    </div>
                </div>
            </div>
        </section>

        <section id="Heating">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Your Heating</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">How to control the heating in your home</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <h3>Boilers</h3>
                        <p>You have two new electric boilers.  They are used solely to heat the building (the water is heated by the immersion cylinder).  They are located in the <a href="">utility cupboard</a>.  Should you need any further information, a manual can be found <a href="">here</a>.  The boilers need to be serviced annually.</p>
                        <h3>Controls</h3>
                        <h3>Thermostats</h3>
                        <p>Your heating system is split into zones, each of which is individually controlled by a thermostat which looks like this.  The thermostats control the heating system via a radio signal meaning they are not reliant on any wiring or wifi connection.  Technical information is available <a href="">here</a>.</p>
                        <h3>Radiators</h3>
                        <p>The radiators are fitted with Thermostatic Radiator Valves to allow you to control the temperature of each room individually.</p>
                        <h3>Bathrooms</h3>
                        <p>You have electric underfloor heating in both bathrooms.  It is controlled via a thermostat which looks like this:. Further details are available in <a href="">the manual</a>.</p>
                    </div>

                </div>
            </div>
        </section>
        <section id="Water">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Your Water</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">The exciting details about your plumbing</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <h3>Water Supply</h3>
                        <p>You have a dedicated double capacity water supply to ensure water pressure is maintained throughout the building.  Should you need to turn off the water supply for any reason, the stopcock can be found in the <a href="">utility cupboard</a>.</p>
                        <h3>Water Meter</h3>
                        <p>Your water meter is located in the pavement to the right of your front door as you leave the building. <a href="">Click here for a location map</a>.</p>

                        <h3>Hot Water</h3>
                        <p>Your hot water is heated in a [] litre cylinder located <a href="">here</a>.  This needs to be serviced annually.</p>

                    </div>

                </div>

            </div>
        </section>

        <section id="Electricity">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Your Electricity</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">Your electrical installation</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Connection</h3>
                        <p>Your electricity comes into the building by the front door.  The emergency cut-off is in the <a href="">magnet attached cabinet</a> to the left of the corridor.</p>
                        <h3>Protection</h3>
                        <p>Your system is controlled by a consumer unit (these have replaced the olden days' fuse boards) in the <a href="">utility cupboard</a>.</p>
                        <p>There is a Residual Current Device (RCD) in the consumer unit for each circuit in your house (except the sprinkler system which needs to be hard wired to ensure operation in a fire). The RCD will cut power to the circuit should there be an overload or a fault.</p>
                        <h3>Lighting</h3>
                        <p>All spotlights are fire resistant low energy fittings.</p>
                    </div>
                </div>

            </div>
        </section>
        <section id="FirePrevention">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Your Fire Prevention</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">The fire safety features of your house</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Smoke Detection</h3>
                        <p>There are smoke detectors throughout the house.  If one of the detectors is triggered, it will sound the alarm throughout the building (including outside on the deck and also in the shop below).  Likewise, any smoke detected in the shop will sound the alarm in your house.  Whilst we understand that this will not always be convenient, this was something that building control wanted and that we believe is sensible given the risk to you should a fire break out below.</p>
                        <h3>Sprinkler System</h3>
                        <p>Your house is fitted with its own independent sprinkler system (as is the shop below).</p>
                        <p>Your system has its own tanks which feed sprinkler heads throughout the building via a pump in <a href="">the basement</a>.</p>
                        <p>The sprinklers are activated by temperature (54 degrees Celcius).  If a fire breaks out, the sprinkler head nearest the fire (NOT the whole house) will release water at a rate of about 49 litres per minute.  This will normally be enough to supress the fire before it spreads.</p>
                        <p>If a sprinkler head is activated, the smoke alarms thoughout the building will sound.</p>
                        <p>Your system was installed by <a href="http://www.firesprinklersdorset.co.uk">Dorset Fire Sprinkler Systems</a> and should be serviced annually.</p>

                    </div>
                </div>

            </div>
        </section>

        <section id="Security">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Your Security</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">The security features of your house</p>
                    </div>
                </div>

            </div>
        </section>
        <section id="Decor">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Your Decor</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">Keeping your home looking new</p>
                    </div>
                </div>

            </div>
        </section>




        <!--==========================
          Footer
        ============================-->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            &copy; Copyright <strong>Element Property Ltd</strong>. All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- Required JavaScript Libraries -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/superfish/hoverIntent.js"></script>
        <script src="lib/superfish/superfish.min.js"></script>
        <script src="lib/morphext/morphext.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/stickyjs/sticky.js"></script>
        <script src="lib/easing/easing.js"></script>

        <!-- Template Specisifc Custom Javascript File -->
        <script src="js/custom.js"></script>

        <script src="contactform/contactform.js"></script>


</body>
</html>