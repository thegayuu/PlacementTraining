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
<form id="form1" name="form1" method="post" action="">
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
        <h3>MCQ Test - Result</h3>
        <table width="570" border="1">
          <tr>
            <th width="45" class="bg1" scope="row">Sno</th>
            <th class="bg1" scope="row">Username</th>
            <th class="bg1" scope="row">Title</th>
            <th width="126" class="bg1" scope="row">Total Question </th>
            <th width="126" class="bg1" scope="row">Correct</th>
          </tr>
          <?php
		  $i=0;
		  $qry=mysql_query("select * from ss_result");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  $qry1=mysql_query("select * from ss_test_mcq where id='".$row['tid']."'");
		  $row1=mysql_fetch_array($qry1);
		  ?>
          <tr>
            <th class="bg2"><?php echo $i; ?></th>
            <th class="bg2"><?php echo $row['uname']; ?></th>
            <th class="bg2"><?php echo $row1['title']; ?></th>
            <th class="bg2"><?php echo $row['total']; ?></th>
            <th class="bg2"><?php echo $row['correct']; ?></th>
          </tr>
          <?php
		  }
		  ?>
        </table>
        <p>&nbsp;</p>
        <h3>Code Test - Result</h3>
        <table width="570" border="1">
          <tr>
            <th width="45" class="bg1" scope="row">Sno</th>
            <th width="289" class="bg1" scope="row">Username</th>
            <th width="214" class="bg1" scope="row">Score</th>
          </tr>
          <?php
		 /* $i=0;
		  $qry=mysql_query("select * from ss_result");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  $qry1=mysql_query("select * from ss_test_mcq where id='".$row['tid']."'");
		  $row1=mysql_fetch_array($qry1);*/
		  ?>
          <tr>
            <th class="bg2"><?php echo $i; ?></th>
            <th class="bg2">&nbsp;</th>
            <th class="bg2">&nbsp;</th>
          </tr>
          <?php
		 // }
		  ?>
        </table>
        <p>&nbsp;</p>
        <h3>Malpractice Deduction</h3>
        <table width="570" border="1">
          <tr>
            <th width="45" class="bg1" scope="row">Sno</th>
            <th class="bg1" scope="row">Username</th>
            <th class="bg1" scope="row">Date/Time</th>
          </tr>
          <?php
		  $i=0;
		  $qry3=mysql_query("select * from ss_mal order by id desc");
		  while($row3=mysql_fetch_array($qry3))
		  {
		  $i++;
		 
		  ?>
          <tr>
            <th class="bg2"><?php echo $i; ?></th>
            <th class="bg2"><?php echo $row3['uname']; ?></th>
            <th class="bg2"><?php echo $row3['dtime']; ?></th>
          </tr>
          <?php
		  }
		  ?>
        </table>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
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
