<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";
$uname=$_SESSION['uname'];
$qry=mysql_query("select * from ss_register where uname='$uname'");
$row=mysql_fetch_array($qry);

if(isset($btn))
{
mysql_query("update ss_register set name='$name',dob='$dob',dept='$dept',contact='$mobile',email='$email' where uname='$uname'");
header("location:userhome.php");
}

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
      <td colspan="2"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td width="21%" align="center" valign="top" class="bgside"><p class="txt1">&nbsp;</p>
        <p class="txt1">
          <?php include("include/link_side2.php"); ?>
        </p>
      <p>&nbsp;</p>      </td>
      <td width="79%" align="center" valign="top"><p class="txt3">&nbsp;</p>
        <p class="txt3">Update</p>
        <table width="369" height="227" border="1" align="center">
          <tr>
            <th align="left" scope="col">Regno</th>
            <th align="left" scope="col"><?php echo $row['uname']; ?></th>
          </tr>
          <tr>
            <th width="105" align="left" scope="col">Name</th>
            <th width="168" align="left" scope="col"><input type="text" name="name" value="<?php echo $row['name']; ?>" /></th>
          </tr>
          <tr>
            <th align="left" scope="row">Date of Birth </th>
            <td align="left"><input type="text" name="dob" value="<?php echo $row['dob']; ?>" /></td>
          </tr>
          <tr>
            <th align="left" scope="row">Department</th>
            <td align="left"><input type="text" name="dept" value="<?php echo $row['dept']; ?>" /></td>
          </tr>
          <tr>
            <th align="left" scope="row">Mobile No. </th>
            <td align="left"><input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" /></td>
          </tr>
          <tr>
            <th align="left" scope="row">E-mail</th>
            <td align="left"><input type="text" name="email" value="<?php echo $row['email']; ?>" /></td>
          </tr>
          <tr>
            <th align="left" scope="row">&nbsp;</th>
            <td align="left"><input type="submit" name="btn" value="Submit" /></td>
          </tr>
        </table>
        <p class="txt3">&nbsp;</p>
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
