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
        <p class="txt3">Forum</p>
        <h3>
          <?php
		$qry=mysql_query("select * from ss_forum order by id desc");
		while($row=mysql_fetch_array($qry))
		{
		?>
</h3>
        <table width="689" border="0" align="center">
          <tr>
            <th align="left" class="bg1" scope="col">User: <?php echo $row['uname']; ?></th>
          </tr>
          <tr>
            <th align="left" scope="row"><?php echo $row['forum']; ?></th>
          </tr>
          <?php
		  $qry2=mysql_query("select * from ss_forum_reply where fid='".$row['id']."'");
		  $num2=mysql_num_rows($qry2);
		  if($num2>0)
		  {
		  ?>
          <tr>
            <th align="left" class="bg2" scope="row"><?php
			echo "<h3>Replies..</h3>";
			while($row2=mysql_fetch_array($qry2))
			{
			echo $row2['uname'].": ".$row2['reply']."<br>";
			echo $row2['rdate']."<br>";
			}
			?></th>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th align="right" scope="row">Date on <?php echo $row['rdate']; ?>&nbsp;&nbsp;&nbsp; <a href="forum2.php?fid=<?php echo $row['id']; ?>">Reply</a> | <a href="forum.php?act=del&did=<?php echo $row['id']; ?>">Delete Forum</a> </th>
          </tr>
        </table>
        <?php
		}
		?>
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
