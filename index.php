<?php require_once('Connections/infox_db.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_infox_db, $infox_db);
$query_EventDay1 = "SELECT * FROM event WHERE eventday = 1";
$EventDay1 = mysql_query($query_EventDay1, $infox_db) or die(mysql_error());
$row_EventDay1 = mysql_fetch_assoc($EventDay1);
$totalRows_EventDay1 = mysql_num_rows($EventDay1);

mysql_select_db($database_infox_db, $infox_db);
$query_EventDay2 = "SELECT * FROM event WHERE eventday = 2";
$EventDay2 = mysql_query($query_EventDay2, $infox_db) or die(mysql_error());
$row_EventDay2 = mysql_fetch_assoc($EventDay2);
$totalRows_EventDay2 = mysql_num_rows($EventDay2);

mysql_select_db($database_infox_db, $infox_db);
$query_EventDay3 = "SELECT * FROM event WHERE eventday = 3";
$EventDay3 = mysql_query($query_EventDay3, $infox_db) or die(mysql_error());
$row_EventDay3 = mysql_fetch_assoc($EventDay3);
$totalRows_EventDay3 = mysql_num_rows($EventDay3);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome to Infoxpression</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-family: "Trebuchet MS";
	font-size: 24em;
}
#apDiv1 {
	position:absolute;
	left:11px;
	top:115px;
	width:491px;
	height:39px;
	z-index:1;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
//-->
</script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function(){
    
	
        $("#content").hide();
     $("#content").show("2000");
	 $(".CollapsiblePanel").hide();
	 $(".CollapsiblePanel").slideDown("slow");

  });
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
  <div id="header">
   <!--This is the inserted object tag code that contains the flash animation.-->
   <!--begin-->
   <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','900','height','176','title','header','src','infoX','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','infoX' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="900" height="176" title="header">
     <param name="movie" value="infoX.swf" />
     <param name="quality" value="high" />
     <embed src="infoX.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="900" height="176"></embed>
   </object>
</noscript>
  
  </div>
   <!--end-->  
  <div id="menu">
    <ul>
      <li><a href="photos.php">Photos</a></li>
      <li><a href="comments.php">Comments</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="Others/Others.php">Others</a></li>
      <li><a href="Cultural/Cultural.php">Cultural</a></li>
      <li><a href="Technical/Technical.php">Technical</a></li>
      <li><a href="Literary/Literary.php">Literary</a></li>
      <li><a href="index.php"> Home</a></li>
    </ul>
  </div>
  <div id="page">
    <div id="ads">
    <!--This is the code for the sponsors scroll-->
    <!--begin-->
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','160','height','600','title','sponsors','src','sponsers','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','sponsers' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="160" height="600" title="sponsors">
        <param name="movie" value="sponsers.swf" />
        <param name="quality" value="high" />
        <embed src="sponsers.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="160" height="600"></embed>
      </object>
    </noscript>
    <!--end-->
    </div>
    <div id="content">
      <div class="post">
        <div class="title">
          <h2>Welcome to Infox '09</h2>
        </div>
        <div class="entry">
          <p><img src="images/img06.jpg" alt="" width="120" height="120" class="left" />This is <strong>Embouteillage</strong>, a free, fully standards-compliant CSS template designed by Free CSS Templates. This free template is released under a Creative Commons Attributions 2.5 license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you keep the links in the footer intact. Aside from that, have fun with it :)</p>
          <p>This template is also available as a WordPress theme at Free WordPress Themes.</p>
        </div>
       
      </div>
      <!--New Post-->
      
    </div>
    <div id="sidebar">
      <ul>
        <li id="dayone">
          <div class="CollapsiblePanel" id="CollapsiblePanel1" onMouseOver = "CollapsiblePanel1.open()">
            <div class="CollapsiblePanelTabHover" tabindex="0"> 
            <h2>Day One</h2></div>
            <div class="CollapsiblePanelContent">
            <ul>
              <?php do { ?>
                <li><a href="<?php echo $row_EventDay1['eventtype']."/".$row_EventDay1['eventtype'].".php?id=".$row_EventDay1['eventid']; ?>"><?php echo $row_EventDay1['eventname']; ?></a></li>
              <?php } while ($row_EventDay1 = mysql_fetch_assoc($EventDay1)); ?></ul>
          </div>
          </div>
        </li>
        <li id="daytwo">        
          <div id="CollapsiblePanel2" class="CollapsiblePanel" onMouseOver = "CollapsiblePanel2.open()">
            <div class="CollapsiblePanelTabHover" tabindex="0"><h2>Day Two</h2></div>
            <div class="CollapsiblePanelContent">
            <ul>
              <?php do { ?>
                <li><a href="<?php echo $row_EventDay2['eventtype']."/".$row_EventDay2['eventtype'].".php?id=".$row_EventDay2['eventid']; ?>"><?php echo $row_EventDay2['eventname']; ?></a></li>
              <?php } while ($row_EventDay2 = mysql_fetch_assoc($EventDay2)); ?></ul>
            </div>
          </div>
        </li>
        
        <li id="daythree">        
          <div id="CollapsiblePanel3" class="CollapsiblePanel" onMouseOver = "CollapsiblePanel3.open()">
            <div class="CollapsiblePanelTabHover" tabindex="0">
            <h2>Day Three</h2></div>
            <div class="CollapsiblePanelContent">
             <ul>
               <?php do { ?>
                 <li><a href="<?php echo $row_EventDay3['eventtype']."/".$row_EventDay3['eventtype'].".php?id=".$row_EventDay3['eventid']; ?>"><?php echo $row_EventDay3['eventname']; ?></a></li>
                 <?php } while ($row_EventDay3 = mysql_fetch_assoc($EventDay3)); ?></ul>
            </div>
          </div>
        </li>
        <li id="calendar">
          <h2>Calendar</h2>
          <div id="calendar_wrap">
            <table width="184%" id="wp-calendar" summary="Calendar">
              <caption>
              October 2009
              </caption>
              <thead>
                <tr>
                  <th width="13%" title="Monday" scope="col" abbr="Monday">M</th>
                  <th width="13%" title="Tuesday" scope="col" abbr="Tuesday">T</th>
                  <th width="17%" title="Wednesday" scope="col" abbr="Wednesday">W</th>
                  <th width="11%" title="Thursday" scope="col" abbr="Thursday">T</th>
                  <th width="15%" title="Friday" scope="col" abbr="Friday">F</th>
                  <th width="15%" title="Saturday" scope="col" abbr="Saturday">S</th>
                  <th width="16%" title="Sunday" scope="col" abbr="Sunday">S</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <td abbr="July" colspan="3" id="prev">&nbsp;</td>
                  <td class="pad">&nbsp;</td>
                  <td abbr="September" colspan="3" id="next" class="pad">&nbsp;</td>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td colspan="2" class="pad">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>1</td>
                  <td>2</td>
                  <td>3</td>
                  <td>4</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>6</td>
                  <td>7</td>
                  <td>8</td>
                  <td>9</td>
                  <td>10</td>
                  <td>11</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>13</td>
                  <td>14</td>
                  <td>15</td>
                  <td>16</td>
                  <td>17</td>
                  <td>18</td>
                </tr>
                <tr>
                  <td>19</td>
                  <td>20</td>
                  <td>21</td>
                  <td id="today">22</td>
                  <td id="today">23</td>
                  <td id="today">24</td>
                  <td>25</td>
                </tr>
                <tr>
                  <td>26</td>
                  <td>27</td>
                  <td>28</td>
                  <td>29</td>
                  <td>30</td>
                  <td>31</td>
                  <td class="pad" colspan="2">&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
        <li></li>
        <li></li>
      </ul>
    </div>
  </div>
  <div id="footer">
    <p class="legal"> &copy;2009 SAInT, USIT, GGSIPU. All Rights Reserved. &nbsp;&nbsp;</p>
    <p class="legal">&nbsp;&nbsp;Web Designing &amp; Development Team  &nbsp;&nbsp;&bull;<a href="addy1injoy@gmail.com">&nbsp;&nbsp;Aditya Rastogi&nbsp;</a>&bull; &nbsp;<a href="ankitarora1990@gmail.com">Ankit Arora</a> &bull;<a href="nikita.rath@gmail.com"> Nikita Rath </a>&bull; <a href="tusharriat@gmail.com">Tushar Riat</a></p>
  </div>
</div>
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", {contentIsOpen:false});
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2", {contentIsOpen:false});
var CollapsiblePanel3 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel3", {contentIsOpen:false});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($EventDay1);

mysql_free_result($EventDay2);

mysql_free_result($EventDay3);
?>
