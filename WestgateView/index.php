<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Westgate View User Guide</title>
</head>
<body>
<?php
	include_once("Configure.php");
	global $wvdb;
	$sql = "Select DetailText FROM HouseDetails where DetailType=:dt";
	$detailtype = "RouterUser";

	$stmt = $wvdb->prepare($sql);
	$stmt->bindValue(':dt',$detailtype,SQLITE3_TEXT);
	
	$res = $stmt->execute();
	
?>

<h1>Westgate View User Guide</h1>

<h2>Internet connectivity<h2>

<h3>Wifi</h3> 
<p>You have been set up with a monthly contract for Zen Internet Broadband.  We would recommend you move to a longer contract to achieve lower prices.  We chose them based on price and broadband speeds.  At the time of writing, they use the same wires as BT, but give their customers more capacity and therefore achieve better speeds.  Please note:  You currently are running broadband over copper wires rather than fibre due to lack of availability in the area.  Should you require faster speeds in the future, do check here to see if fibre has been introduced.
</p>
<h3>Easy set up</h3>
<p>First things first:  You have a modem and router which are preconfigured to access the broadband.  
Your router controls access to the internet for the house.  It looks like this:</p>

<p>The username and password for controlling the router are:</p>
<p>User:</p>
<p>Password:</p>
<bl/>
<p>We recommend you change these for your own security.</p>
<bl/>
<p>You can use a standard Ethernet cable to plug a computer into one of the wall sockets.</p>
<bl/>
<p>If you'd rather use wifi, the network id for the wifi router is [] and the password is [].  PLEASE NOTE: these are different to the router login details and should remain so.  We recommend you change this as soon as possible for your own security. Click [here] to configure the router with a new password (you'll need the router password above to do this).</p>
<p>That should be enough to get you onto the network with internet access.</p>
<bl/>
<p>Geek zone:  More information for those who want it.</p>
<bl/>
<p>Your broadband reaches the house in the utility cupboard next to the water cylinder.</p>
<p>The master socket looks like this:</p>
<bl/>
<bl/>

<p>At this point there is a filter which separates the telephone signal from the broadband.</p>
<bl/>
<p>You can use any ADSL modem to access the broadband.  The login details (already configured on your modem/router) are below:</p>
<p>User:</p>
<p>Password:</p>
<p>If you choose to change provider, these details will be supplied by them and will need to be updated in the modem.</p>
<p>The internet is distributed around the house via an 'Ethernet switch' which looks like this:</p>
<bl/>
<p>Should the internet sockets in the house stop working, it is likely to be down to damage to the socket, damage to the cable or a failure in the Ethernet switch.</p>
<bl/>
<h2>Water</h2>
<p>You have a new 32mm supply which should provide more than enough pressure for the whole house.  The stopcock is in the utility cupboard and looks like this:</p>
<bl/>
<p>Your meter is outside under the pavement here:</p>
<bl/>
<bl/>


<p>Read more:</p>
<p>Here is a layout diagram for your plumbing system:</p>
<bl/>
<bl/>


<h2>Fire protection</h2>
<p>You have a modern sprinkler system in your house.  This was installed by [Dorset Fire].  The tanks in the cellar provide the water for the sprinklers which are fed by the pump down there.  These need to be inspected and maintained on an annual basis to ensure operability.</p>
<bl/>
<p>Read more:</p>
<p>The system is full of water at high pressure.  The sprinkler heads (see below) are kept in place by a layer of solder which melts at [54 oC].  In the event of a fire, the solder will melt, releasing the water. The alarms will sound at this point.</p>
<p>The fire alarms can be triggered by any of the following:</p>
<li>the smoke detectors,</li>
<li>the sprinkler system or </li>
<li>the fire protection system in the shop below.</li>  
<bl/>
<p>If the alarms sound and you are 100% sure that there is no fire in the house, you should still beware of the possibility of a fire in the shop.</p>
<bl/>

<b2>Hot Water</b2>
<p>You have an electric hot water system.  The boilers are in the utility cupboard and look like this:</p>

<b2>Heating</b2>
<p>Your heating controllers look like this:</p>
<p>Here is a link to the instructions.</p>
<p>To adjust when the heating comes on, use these timers in the utility cupboard:</p>
<bl/>
<p>The thermostat looks like this:</p>
<bl/>
<p>To adjust each room individually, use the valves on each radiator.</p>
<bl/>

<h2>Telephones</h2>
<p>The telephone number for the house is:</p>
<bl/>

<h2>Intercom</h2>
<p>You have a video intercom system for the house.  This will allow you to see and speak to visitors from these locations in the house.</p>
<bl/>

<h2>Electrical</h2>
<p>The house has been completely rewired with new fixtures, fittings and safety equipment.</p>
<p>All downlights are low energy fire resistant fittings</p>

</body>
</html>

