<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";

$q1=mysql_query("select * from ss_test_mcq where id=$tid");
$r1=mysql_fetch_array($q1);
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
      </p></td>
      <td width="79%" align="center" valign="top"><p class="txt1">&nbsp;</p>
        <h3>Questions</h3>
        <p>Title: <?php echo $r1['title']; ?></p>
        <table width="719" border="1">
          <tr>
            <th width="130" scope="row">Sno</th>
            <th scope="row">Question</th>
            <th width="130" scope="row">Option1</th>
            <th width="130" scope="row">Option2</th>
            <th width="130" scope="row">Option3</th>
            <th width="130" scope="row">Option4</th>
            <th width="130" scope="row">Answer</th>
          </tr>
          <?php
		  $i=0;
		  $qry=mysql_query("select * from ss_question where tid=$tid");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  ?>
          <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <th scope="row"><?php echo $row['question']; ?></th>
            <th scope="row"><?php echo $row['option1']; ?></th>
            <th scope="row"><?php echo $row['option2']; ?></th>
            <th scope="row"><?php echo $row['option3']; ?></th>
            <th scope="row"><?php echo $row['option4']; ?></th>
            <th scope="row"><?php echo $row['answer']; ?></th>
          </tr>
          <?php
		  }
		  ?>
        </table>
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
