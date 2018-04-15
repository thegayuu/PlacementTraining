<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";



?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style5 {font-size: 18px}
-->
</style>

</head>

<body>
<form action="" method="post"  name="form1" id="form1">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td colspan="2" align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2"><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td width="21%" align="center" valign="top" class="bgside"><p class="txt1">&nbsp;</p>
        <p class="txt1">
          <?php include("include/link_side.php"); ?>
        </p>
      <p>&nbsp;</p>      </td>
      <td width="79%" align="center" valign="top"><p class="txt1">&nbsp;</p>
        <h3>&nbsp;</h3>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p class="style1"></p></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="subhead"><a href="logout.php">Logout</a></td>
    </tr>
  </table>
</form>
</body>
</html>
