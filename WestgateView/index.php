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
                    <li><a href="#homedetails">Your Home</a></li>
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
    <?php
	include_once("Configure.php");
	global $wvdb;
	$sql = "Select HouseDetailText FROM HouseDetails where HouseDetailType=:dt;";
	$detailtype = "RouterUser";
	//$stmt = $wvdb->prepare($sql);
	//$stmt->bindValue(':dt',$detailtype,SQLITE3_TEXT);
	$router_user = $wvdb->querySingle("Select HouseDetailText FROM HouseDetails where HouseDetailType=".$detailtype);
    //$resarray = $res->fetchArray(SQLITE3_ASSOC);
    //if(!$resarray){} else{$router_user=$resarray["HouseDetailText"];}
    ?>

    <section id="homedetails">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Your Home</h3>
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
                    <li>IP Address: </li>
                    <li>Account: </li>
                    <li>Password: </li>

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

                <p>The username and password for controlling the router are:</p>
                <p>User:<?php global $router_user; echo $router_user; ?><a href="UpdateDetail.php?DetailName=RouterUser">Update Router Username</a></p>
                <p>Password:</p>
                <bl />
                <p>We recommend you change these for your own security.</p>
                <bl />
                <p>You can use a standard Ethernet cable to plug a computer into one of the wall sockets.</p>
                <bl />
                <p>If you'd rather use wifi, the network id for the wifi router is [] and the password is [].  PLEASE NOTE: these are different to the router login details and should remain so.  We recommend you change this as soon as possible for your own security. Click [here] to configure the router with a new password (you'll need the router password above to do this).</p>
                <p>That should be enough to get you onto the network with internet access.</p>
                <bl />
                <p>Geek zone:  More information for those who want it.</p>
                <bl />
                <p>Your broadband reaches the house in the utility cupboard next to the water cylinder.</p>
                <p>The master socket looks like this:</p>
                <bl />
                <bl />

                <p>At this point there is a filter which separates the telephone signal from the broadband.</p>
                <bl />
                <p>You can use any ADSL modem to access the broadband.  The login details (already configured on your modem/router) are below:</p>
                <p>User:</p>
                <p>Password:</p>
                <p>If you choose to change provider, these details will be supplied by them and will need to be updated in the modem.</p>
                <p>The internet is distributed around the house via an 'Ethernet switch' which looks like this:</p>
                <bl />
                <p>Should the internet sockets in the house stop working, it is likely to be down to damage to the socket, damage to the cable or a failure in the Ethernet switch.</p>
                <bl />

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


     

            <h1>Westgate View User Guide</h1>

            <h2>Internet connectivity</h2>

            
            <h2>Water</h2>
            <p>You have a new 32mm supply which should provide more than enough pressure for the whole house.  The stopcock is in the utility cupboard and looks like this:</p>
            <bl />
            <p>Your meter is outside under the pavement here:</p>
            <bl />
            <bl />


            <p>Read more:</p>
            <p>Here is a layout diagram for your plumbing system:</p>
            <bl />
            <bl />


            <h2>Fire protection</h2>
            <p>You have a modern sprinkler system in your house.  This was installed by [Dorset Fire].  The tanks in the cellar provide the water for the sprinklers which are fed by the pump down there.  These need to be inspected and maintained on an annual basis to ensure operability.</p>
            <bl />
            <p>Read more:</p>
            <p>The system is full of water at high pressure.  The sprinkler heads (see below) are kept in place by a layer of solder which melts at [54 oC].  In the event of a fire, the solder will melt, releasing the water. The alarms will sound at this point.</p>
            <p>The fire alarms can be triggered by any of the following:</p>
            <li>the smoke detectors,</li>
            <li>the sprinkler system or </li>
            <li>the fire protection system in the shop below.</li>
            <bl />
            <p>If the alarms sound and you are 100% sure that there is no fire in the house, you should still beware of the possibility of a fire in the shop.</p>
            <bl />

            <b2>Hot Water</b2>
            <p>You have an electric hot water system.  The boilers are in the utility cupboard and look like this:</p>

            <b2>Heating</b2>
            <p>Your heating controllers look like this:</p>
            <p>Here is a link to the instructions.</p>
            <p>To adjust when the heating comes on, use these timers in the utility cupboard:</p>
            <bl />
            <p>The thermostat looks like this:</p>
            <bl />
            <p>To adjust each room individually, use the valves on each radiator.</p>
            <bl />

            <h2>Telephones</h2>
            <p>The telephone number for the house is:</p>
            <bl />

            <h2>Intercom</h2>
            <p>You have a video intercom system for the house.  This will allow you to see and speak to visitors from these locations in the house.</p>
            <bl />

            <h2>Electrical</h2>
            <p>The house has been completely rewired with new fixtures, fittings and safety equipment.</p>
            <p>All downlights are low energy fire resistant fittings</p>

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