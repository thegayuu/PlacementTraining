<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
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
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td colspan="2" align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2"><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td width="17%" align="center" valign="top" class="bgside"><p class="txt1">&nbsp;</p>
        <p class="txt1">
          <?php include("include/link_side.php"); ?>
        </p>
      <p>&nbsp;</p>      </td>
      <td width="83%" align="center" valign="top"><p class="txt1">&nbsp;</p>
        <h3>User Details </h3>
        <table width="780" border="1">
          <tr>
            <th width="45" scope="row">Sno</th>
            <th width="117" scope="row">Username</th>
            <th width="126" scope="row">Name</th>
            <th width="100" scope="row">Department</th>
            <th width="128" scope="row">Mobile No. </th>
            <th width="156">E-mail</th>
            <th width="92">Date</th>
          </tr>
          <?php
		  $i=0;
		  $qry=mysql_query("select * from ss_register");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  ?>
          <tr>
            <th><?php echo $i; ?></th>
            <th><?php echo $row['uname']; ?></th>
            <th><?php echo $row['name']; ?></th>
            <th><?php echo $row['dept']; ?></th>
            <th><?php echo $row['contact']; ?></th>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['rdate']; ?></td>
          </tr>
          <?php
		  }
		  ?>
        </table>
      <p class="style1"></p></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="subhead"><a href="logout.php">Logout</a></td>
    </tr>
  </table>
</form>
</body>
</html>
