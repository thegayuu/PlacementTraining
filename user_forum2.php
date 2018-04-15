<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";
if(isset($btn))
{
  $q=mysql_query("select max(id) from ss_forum_reply");
			$r=mysql_fetch_array($q);
			$id=$r['max(id)']+1;
	
$ins= mysql_query("insert into ss_forum_reply(id,fid,uname,reply,rdate) values ($id,'$fid','$uname','$content','$rdate')");
header("location:user_forum.php");					 
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
      <td width="79%" align="center" valign="top"><p class="txt3">Forum Reply </p>
        <table width="526" height="129" border="0">
          <tr>
            <th align="left" scope="col">Your Reply </th>
            <th align="left" scope="col"><textarea name="content" cols="60" rows="4"></textarea></th>
          </tr>
          <tr>
            <th align="left" scope="row">&nbsp;</th>
            <td align="left"><input type="submit" name="btn" value="Submit" /></td>
          </tr>
        </table>
        <p class="txt1">&nbsp;</p>
        <h3>&nbsp;</h3>
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
s