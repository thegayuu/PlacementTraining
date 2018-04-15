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
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <h3>Learning Topics </h3>
        <table width="500" border="1">
          <tr>
            <th width="130" scope="row">ID</th>
            <th width="130" scope="row">Topic</th>
            <th width="218" scope="row">Action</th>
            <th width="218" scope="row">Questions</th>
          </tr>
		  <?php
		  $i=0;
		  $qry=mysql_query("select * from topic");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  ?>
          <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <th scope="row"><?php echo $row['topic']; ?></th>
            <th scope="row"><a href="upload.php?tid=<?php echo $row['id']; ?>">Add</a> | <a href="view_upload.php?tid=<?php echo $row['id']; ?>">View</a> </th>
            <th scope="row"><a href="add_test.php?tid=<?php echo $row['id']; ?>">Add</a> | <a href="view_test.php?tid=<?php echo $row['id']; ?>">View</a></th>
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
