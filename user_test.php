<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";
$uname=$_SESSION['uname'];

if($_REQUEST['act']=="yes")
{
$q11=mysql_query("select * from ss_result where tid=$tid && uname='$uname'");
$n11=mysql_num_rows($q11);
if($n11==0)
{

?>
<script language="javascript">
window.location.href="attend_test.php?tid=<?php echo $tid; ?>";
</script>
<?php
}
else
{
?>
<script language="javascript">
alert("Test already completed!");
</script>
<?php
}
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
      <td colspan="2"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td width="21%" align="center" valign="top" class="bgside"><p class="txt1">&nbsp;</p>
        <p class="txt1">
          <?php include("include/link_side2.php"); ?>
        </p>
      <p>&nbsp;</p>      </td>
      <td width="79%" align="center" valign="top"><p class="txt1">&nbsp;</p>
        <h3>MCQ Test </h3>
        <table width="570" border="1">
          <tr>
            <th width="45" class="bg1" scope="row">Sno</th>
            <th class="bg1" scope="row">Title</th>
            <th width="126" class="bg1" scope="row">Questions</th>
          </tr>
          <?php
		  $i=0;
		  $qry=mysql_query("select * from ss_test_mcq where status=1");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  ?>
          <tr>
            <th class="bg2"><?php echo $i; ?></th>
            <th class="bg2"><?php echo $row['title']; ?></th>
            <th class="bg2"><?php 
			
			echo '<a href="user_test.php?act=yes&tid='.$row['id'].'">Take Test</a>'; ?></th>
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
