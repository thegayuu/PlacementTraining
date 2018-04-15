<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";

$q1=mysql_query("select * from topic where id=$tid");
$r1=mysql_fetch_array($q1);
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <h3>Learning Topics </h3>
        <p><strong>Topic <?php echo $r1['topic']; ?></strong></p>
        <table width="412" border="1">
          <tr>
            <th width="130" scope="row">ID</th>
            <th width="130" scope="row">Topic</th>
            <th width="130" scope="row">Description</th>
          </tr>
		  <?php
		  $i=0;
		  $qry=mysql_query("select * from upload where tid=$tid");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  ?>
          <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <th scope="row"><?php echo '<img src="upload/'.$row['fname'].'" width="150" height="150">'; ?></th>
            <th scope="row"><?php echo $row['description']; ?></th>
          </tr>
		  <?php
		  }
		  ?>
        </table>
        <p class="style1">&nbsp;</p>
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td align="center" class="subhead"><a href="logout.php">Logout</a></td>
    </tr>
  </table>
</form>
</body>
</html>
