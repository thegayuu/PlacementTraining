<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";

if(isset($btn))
{

	$max_qry = mysql_query("select max(id) maxid from ss_test_mcq");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;


		$uqry="insert into ss_test_mcq(id,title,duration,status) values($id,'$title','$duration','0')";
		$res=mysql_query($uqry);
		if($res)
		{
		?>
		<script language="javascript">
		alert("Added Successfully");
		window.location.href="question.php";
		</script>
		<?php
		}
		else
		{
		$msg="Could not be stored!";
		}
	
}
if($_REQUEST['act']=="no")
{
mysql_query("update ss_test_mcq set status=0 where id=$did");
?>
<script language="javascript">
window.location.href="question.php";
</script>
<?php
}
if($_REQUEST['act']=="yes")
{
mysql_query("update ss_test_mcq set status=1 where id=$did");
?>
<script language="javascript">
window.location.href="question.php";
</script>
<?php
}

if($_REQUEST['act']=="del")
{
mysql_query("delete from ss_test_mcq where id=$did");
?>
<script language="javascript">
alert("Deleted Successfully");
window.location.href="question.php";
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
        <h3>MCQ Activation </h3>
        <table width="519" height="94" border="0" cellpadding="5" class="bgbor">
          <tr>
            <th width="78" align="left" scope="col">Title</th>
            <th width="407" align="left" scope="col"><input type="text" name="title"></th>
          </tr>
          <tr>
            <th align="left" scope="col">Duration</th>
            <th align="left" scope="col"><input type="text" name="duration"> 
            (Minutes: Eg: 10:00) </th>
          </tr>
          <tr>
            <th align="left" scope="row">&nbsp;</th>
            <td align="left"><input type="submit" name="btn" value="Submit"></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="501" border="1">
          <tr>
            <th width="45" scope="row">Sno</th>
            <th scope="row">Title</th>
            <th width="126" scope="row">Duration</th>
            <th width="126" scope="row">Questions</th>
            <th width="92">Action</th>
          </tr>
          <?php
		  $i=0;
		  $qry=mysql_query("select * from ss_test_mcq");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		  ?>
          <tr>
            <th><?php echo $i; ?></th>
            <th><?php echo $row['title']; ?></th>
            <th><?php echo $row['duration']; ?></th>
            <th><?php 
			echo '<a href="add_test.php?tid='.$row['id'].'">Add</a> / ';
			echo '<a href="view_test.php?tid='.$row['id'].'">View</a>'; ?></th>
            <td><?php
			if($row['status']=="1")
			{
			echo '<a href="question.php?act=no&did='.$row['id'].'">De-activate</a>';
			}
			else
			{
			echo '<a href="question.php?act=yes&did='.$row['id'].'">Activate</a>';
			}
			
			echo ' / <a href="question.php?act=del&did='.$row['id'].'">Delete</a>';
			
			?></td>
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
