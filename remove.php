<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";

if($_REQUEST['act']=="del")
{
mysql_query("delete from ss_register where id=$did");
?>
<script language="javascript">
alert("Removed Successfully");
window.location.href="remove.php";
</script>
<?php
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
        <h3>User Details </h3>
        <p>
          <input type="text" name="name">
          <input type="submit" name="btn" value="Search">
        </p>
		<?php
		if(isset($btn))
		{
		$qry=mysql_query("select * from ss_register where name like '%$name%' || uname like '%$name%'");
		$num=mysql_num_rows($qry);
		if($num>0)
		{
		?>
        <table width="600" border="1">
          <tr>
            <th width="45" scope="row">Sno</th>
            <th width="117" scope="row">Username</th>
            <th width="126" scope="row">Name</th>
            <th width="92">Action</th>
          </tr>
          <?php
		  $i=0;
		  
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  ?>
          <tr>
            <th><?php echo $i; ?></th>
            <th><?php echo $row['uname']; ?></th>
            <th><?php echo $row['name']; ?></th>
            <td><?php echo '<a href="remove.php?act=del&did='.$row['id'].'">Remove</a>'; ?></td>
          </tr>
          <?php
		  }
		  ?>
        </table>
		<?php
		}
		else
		{
		echo "No Details Found!";
		}
		}
		?>
      <p class="style1"></p></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="subhead"><a href="logout.php">Logout</a></td>
    </tr>
  </table>
</form>
</body>
</html>
