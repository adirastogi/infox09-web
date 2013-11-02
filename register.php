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

//ACTION FOR THE FORM
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//CHECKING IF FORM HAS BEEN SUBMITTED
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {


//SETTING THE ERROR DISPLAY OFF
ini_set('display_errors','0');
//VALIDATION BEFORE SUBMISSION
                       $username=GetSQLValueString($_POST['username'], "text");
                       $password=GetSQLValueString($_POST['password'], "text");
                       $emailid=GetSQLValueString($_POST['emailid'], "text");
                       $phoneno=GetSQLValueString($_POST['phoneno'], "int");
 if (($username == "NULL")){
     $error .= "Username must not be null.<br />";
 }
 if ($password == "NULL"){
     $error .= "Password must not be null.<br />";
 }
 if ($emailid == "NULL"){
     $error .= "Email must not be null.<br />";
 }
 
 
//CHECKING IF USERNAME IS AVAILABLE
$query = "SELECT * FROM users WHERE username = $username";
    // Execute the database query
    mysql_select_db($database_infox_db, $infox_db);
  $result = mysql_query($query, $infox_db);
    if (!$result){
        die("Could not query the database: <br /> ".mysql_error());
	
    }
    $user_count = mysql_num_rows($result);
    if ($user_count > 0) {
        $error .= "Error: Username $username is taken already. Please select another.
<br />";
    }
	if ($error){
        ;
    }
//INSERTION AFTER VALIDATION
else {
       
//INSERTING INTO USERS      

  $insertSQL = sprintf("INSERT INTO users (username, password, fullname, college, emailid, phoneno) VALUES (%s, MD5(%s), %s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['fullname'], "text"),
                       GetSQLValueString($_POST['college'], "text"),
                       GetSQLValueString($_POST['emailid'], "text"),
                       GetSQLValueString($_POST['phoneno'], "int"));

  mysql_select_db($database_infox_db, $infox_db);
  $Result1 = mysql_query($insertSQL, $infox_db) or die("could not connect to the database:".mysql_error());
  
//INSERTING INTO USEREVENT  
$technical= $_POST['technical'];
$cultural= $_POST['cultural'];
$literary= $_POST['literary'];
$others= $_POST['others'];

if($technical)
{
          foreach($technical as $t){
		  
		  $insert = sprintf("INSERT INTO userevent(username,eventid) VALUES (%s,%s)",GetSQLValueString($_POST['username'], "text"),GetSQLValueString($t, "int"));
		   $Result1 = mysql_query($insert, $infox_db) or die("could not connect to the database:".mysql_error());
		  }
}
if($cultural)
{
         foreach($cultural as $t){
		  
		  $insert = sprintf("INSERT INTO userevent(username,eventid) VALUES (%s,%s)",GetSQLValueString($_POST['username'], "text"),GetSQLValueString($t, "int"));
		   $Result = mysql_query($insert, $infox_db) or die("could not connect to the database:".mysql_error());
		  }
}
if($literary)
{
         foreach($literary as $t){
		  
		  $insert = sprintf("INSERT INTO userevent(username,eventid) VALUES (%s,%s)",GetSQLValueString($_POST['username'], "text"),GetSQLValueString($t, "int"));
		   $Result = mysql_query($insert, $infox_db) or die("could not connect to the database:".mysql_error());
		  }

}    
if($others)
{
         foreach($others as $t){
		  
		  $insert = sprintf("INSERT INTO userevent(username,eventid) VALUES (%s,%s)",GetSQLValueString($_POST['username'], "text"),GetSQLValueString($t, "int"));
		   $Result = mysql_query($insert, $infox_db) or die("could not connect to the database:".mysql_error());
		  }

}    

//AFTER INSERTION GOTO
 $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));

}//INSERTION COMPLETED


}//FORM SUBMITTED

mysql_select_db($database_infox_db, $infox_db);
$query_Display1 = "SELECT * FROM event WHERE eventtype = 'Technical' ORDER BY eventid ASC";
$Display1 = mysql_query($query_Display1, $infox_db) or die(mysql_error());
$row_Display1 = mysql_fetch_assoc($Display1);
$totalRows_Display1 = mysql_num_rows($Display1);

mysql_select_db($database_infox_db, $infox_db);
$query_Display2 = "SELECT * FROM event WHERE eventtype = 'Literary' ORDER BY eventid ASC";
$Display2 = mysql_query($query_Display2, $infox_db) or die(mysql_error());
$row_Display2 = mysql_fetch_assoc($Display2);
$totalRows_Display2 = mysql_num_rows($Display2);

mysql_select_db($database_infox_db, $infox_db);
$query_Display3 = "SELECT * FROM event WHERE eventtype = 'Cultural' ORDER BY eventid ASC";
$Display3 = mysql_query($query_Display3, $infox_db) or die(mysql_error());
$row_Display3 = mysql_fetch_assoc($Display3);
$totalRows_Display3 = mysql_num_rows($Display3);

mysql_select_db($database_infox_db, $infox_db);
$query_Display4 = "SELECT * FROM event WHERE eventtype = 'Others' ORDER BY eventid ASC";
$Display4 = mysql_query($query_Display4, $infox_db) or die(mysql_error());
$row_Display4 = mysql_fetch_assoc($Display4);
$totalRows_Display4 = mysql_num_rows($Display4);


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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Register</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:11px;
	top:115px;
	width:491px;
	height:39px;
	z-index:1;
}
.style2 {color: #FFFFFF}
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

<script language="JavaScript" >
function verify_username (strng) {
var error = "";
if (strng == "") {
    error = "You didn't enter a username.\n";
}
    var illegalChars = /\W/; // allow letters, numbers, and underscores
    if ((strng.length < 6) || (strng.length > 10)) {
        error = "The username is the wrong length. It must be 6-10 characters.\n";
    }
    else if (illegalChars.test(strng)) {
        error = "The username contains illegal characters.\n";
    }
    return error;
}

// Verify password - between 6–8 chars, uppercase, lowercase, and numeral
function verify_password (strng) {
    var error = "";
    if (strng == "") {
        error = "You didn't enter a password.\n";
    }
    var illegalChars = /[\W_]/; // allow only letters and numbers
    if ((strng.length <= 6) || (strng.length >= 10)) {
        error = "The password is the wrong length. It must be 6–10 characters.\n";
    }
    else if (illegalChars.test(strng)) {
        error = "The password contains illegal characters.\n";
    }
    else if (!((strng.search(/(a-z)+/)) && (strng.search(/(A-Z)+/)) &&
(strng.search(/(0-9)+/)))) {
        error = "The password must contain at least one uppercase letter, one lowercase letter, and one numeral.\n";
    }
    return error;
}

// Verify email
function verify_email (strng) {
    var error="";
    if (strng == "") {
        error = "You didn't enter an email address.\n";
    }
    var emailFilter=/^.+@.+\..{2,3}$/;
    if (!(emailFilter.test(strng))) {
        error = "Please enter a valid email address.\n";
    }
    else {
        //test email for illegal characters
        var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/;
        if (strng.match(illegalChars)) {
            error = "The email address contains illegal characters.\n";
        }
    }
    return error;
}

// Verify phone number - strip out delimiters and verify for 10 digits

    function check_valid(form) {
    var error = "";
    error += verify_username(form.username.value);
    error += verify_password(form.password.value);
    error += verify_email(form.emailid.value);
    if (error != "") {
       alert(error);
       return false;
    }
return true;
}
    
</script>

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
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','160','height','600','title','sponsors','src','sponsers','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','sponsers' ); //end AC code
      </script>
      <noscript>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="160" height="600" title="sponsors">
        <param name="movie" value="sponsers.swf" />
        <param name="quality" value="high" />
        <embed src="sponsers.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="160" height="600"></embed>
      </object>
      </noscript>
    </div>
    <div id="content">
      <div class="post">
        <div class="title">
          <h2 align="left">Register Yourself</h2>
          
        </div>
        <div class="entry">
        <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onsubmit="return check_valid(this);" >
        <fieldset>
          <table align="center">
              <tr valign="baseline">
                <td width="66" height="36" align="right" nowrap="nowrap">Username:</td>
                <td width="192"><input type="text" name="username" value="" size="32" /></td>
              </tr>
              <tr valign="baseline">
                <td width="66" height="36" align="right" nowrap="nowrap">Password:</td>
                <td width="192"><input type="password" name="password" value="" size="32" /></td>
              </tr>
              <tr valign="baseline">
                <td width="66" height="36" align="right" nowrap="nowrap">Full Name:</td>
                <td width="192"><input type="text" name="fullname" value="" size="32" /></td>
              </tr>
              <tr valign="baseline">
                <td width="66" height="36" align="right" nowrap="nowrap">College:</td>
                <td width="192"><input type="text" name="college" value="" size="32" /></td>
              </tr>
              <tr valign="baseline">
                <td width="66" height="36" align="right" nowrap="nowrap">E-mail:</td>
                <td width="192"><input type="text" name="emailid" value="" size="32" /></td>
              </tr>
              <tr valign="baseline">
                <td width="66" height="36" align="right" nowrap="nowrap">Phone No.:</td>
                <td width="192"><input type="text" name="phoneno" value="" size="32" /></td>
              </tr>  
          </table>
          <p class="style2">
            <?php if($error){echo $error;} ?>
&nbsp;           </p>
          </fieldset>
                   
       
        <div class="title">
          <h2 align="left">Select the events you would like to participate in</h2>
          <p align="center">&nbsp;</p>
        </div>
       <table>
              <tr>
      <td width="220"><fieldset>
      <legend>Technical Events</legend><select name="technical[]" size="4" multiple="multiple"  id="technical">
        <?php
do {  
?>
        <option value="<?php echo $row_Display1['eventid']?>"<?php //if (!(strcmp($row_Display1['eventid'], //$row_Display1['eventid']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Display1['eventname']?></option>
        <?php
} while ($row_Display1 = mysql_fetch_assoc($Display1));
  $rows = mysql_num_rows($Display1);
  if($rows > 0) {
      mysql_data_seek($Display1, 0);
	  $row_Display1 = mysql_fetch_assoc($Display1);
  }
?>
      </select>
      </fieldset>
      </td>
      <td width="221"><fieldset>
      <legend>Literary Events</legend>
      <label>
      <select name="literary[]" size="4" multiple="multiple" id="literary">
        <?php
do {  
?>
        <option value="<?php echo $row_Display2['eventid']?>"<?php /* if (!(strcmp($row_Display2['eventid'], $row_Display2['eventid']))) {echo "selected=\"selected\"";} */?>><?php echo $row_Display2['eventname']?></option>
        <?php
} while ($row_Display2 = mysql_fetch_assoc($Display2));
  $rows = mysql_num_rows($Display2);
  if($rows > 0) {
      mysql_data_seek($Display2, 0);
	  $row_Display2 = mysql_fetch_assoc($Display2);
  }
?>
      </select>
      </label>
      </fieldset>
      </td>
      </tr>
      <tr>
      <td width="220"><fieldset>
      <legend>Cultural Events</legend><select name="cultural[]" size="4" multiple="multiple" id="cultural">
        <?php
do {  
?>
        <option value="<?php echo $row_Display3['eventid']?>"<?php /*if (!(strcmp($row_Display3['eventid'], $row_Display3['eventid']))) {echo "selected=\"selected\"";} */?>><?php echo $row_Display3['eventname']?></option>
        <?php
} while ($row_Display3 = mysql_fetch_assoc($Display3));
  $rows = mysql_num_rows($Display3);
  if($rows > 0) {
      mysql_data_seek($Display3, 0);
	  $row_Display3 = mysql_fetch_assoc($Display3);
  }
?>
      </select>
      </fieldset>
      </td>
      <td width="221"><fieldset>
      <legend>Other Events</legend>
      <label>
      <select name="others[]" size="4" multiple="multiple" id="others">
        <?php
do {  
?>
        <option value="<?php echo $row_Display4['eventid']?>"<?php /*if (!(strcmp($row_Display4['eventid'], $row_Display4['eventid']))) {echo "selected=\"selected\"";} */?>><?php echo $row_Display4['eventname']?></option>
        <?php
} while ($row_Display4 = mysql_fetch_assoc($Display4));
  $rows = mysql_num_rows($Display4);
  if($rows > 0) {
      mysql_data_seek($Display4, 0);
	  $row_Display4 = mysql_fetch_assoc($Display4);
  }
?>
      </select>
      </label>
      </fieldset>
      </td>
      </tr> 
      <tr>
      <td> <input type="submit" value="submit" name="submit" /></td>
      <td>&nbsp;</td>
      </tr>
          </table>
                    <input type="hidden" name="MM_insert" value="form1" />
</form>

        </div>
      </div>
    </div>
 <!--content ends--> 
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
                <?php } while ($row_EventDay1 = mysql_fetch_assoc($EventDay1)); ?>
          </ul>
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
              <?php } while ($row_EventDay2 = mysql_fetch_assoc($EventDay2)); ?>
          </ul>
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
                 <?php } while ($row_EventDay3 = mysql_fetch_assoc($EventDay3)); ?>
          </ul>
            </div>
          </div>
        </li>
        <li id="calendar">
          <h2>Calendar</h2>
          <div id="calendar_wrap">
            <table id="wp-calendar" summary="Calendar">
              <caption>
                October 2009
              </caption>
              <thead>
                <tr>
                  <th abbr="Monday" scope="col" title="Monday">M</th>
                  <th abbr="Tuesday" scope="col" title="Tuesday">T</th>
                  <th abbr="Wednesday" scope="col" title="Wednesday">W</th>
                  <th abbr="Thursday" scope="col" title="Thursday">T</th>
                  <th abbr="Friday" scope="col" title="Friday">F</th>
                  <th abbr="Saturday" scope="col" title="Saturday">S</th>
                  <th abbr="Sunday" scope="col" title="Sunday">S</th>
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
      </ul>
    </div>
  </div>
  <div id="footer">
    <p class="legal">&copy;2009 SAInT, USIT, GGSIPU. All Rights Reserved. &nbsp;&nbsp;</p>
    <p class="legal">&nbsp;&nbsp;Web Designing &amp; Development Team  &nbsp;&nbsp;&bull;<a href="addy1injoy@gmail.com">&nbsp;&nbsp;Aditya Rastogi&nbsp;</a>&bull; &nbsp;<a href="ankitarora1990@gmail.com">Ankit Arora</a> &bull; <a href="nikita.rath@gmail.com">Nikita Rath</a> &bull; <a href="tusharriat@gmail.com">Tushar Riat</a></p>
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
mysql_free_result($Display1);

mysql_free_result($Display2);

mysql_free_result($Display3);

mysql_free_result($Display4);

mysql_free_result($EventDay1);

mysql_free_result($EventDay2);

mysql_free_result($EventDay3);
?>
