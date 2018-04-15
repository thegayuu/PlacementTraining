<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";
$q1=mysql_query("select * from topic where id=$tid");
$r1=mysql_fetch_array($q1);
if(isset($register))
{

	$max_qry = mysql_query("select max(id) maxid from upload");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$rdate=date("d-m-Y");
				$fname="T".$id.$_FILES['file']['name'];
				move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$fname);	
		$uqry="insert into upload(id,tid,fname,description) values($id,'$tid','$fname','$desc')";
		$res=mysql_query($uqry);
		if($res)
		{
		?>
		<script language="javascript">
		alert("Added Successfully");
		window.location.href="view_topics.php";
		</script>
		<?php
		}
		else
		{
		$msg="Could not be stored!";
		}
	
}

?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {
	color: #990000
}
-->
</style>

 <script language="javascript">
           function validate()
            {
			  
                if (document.form1.topic.value == "")
                {
                    alert("Enter the Topic Name");
                    document.form1.topic.focus();
                    return false;
                }
				
				
                return true;
            }
        </script>		
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td align="center"><p>&nbsp;</p>
        <p class="style1 style2"><?php echo $msg; ?></p>
        <table width="402" height="189" border="0" cellpadding="0" cellspacing="0" class="bg11">
          <tr>
            <td colspan="2" align="center"><strong>Learning Topic </strong></td>
          </tr>
          <tr>
            <td width="162">Topic Name </td>
            <td width="162"><?php echo $r1['topic']; ?></td>
          </tr>
          <tr>
            <td>Image</td>
            <td><input type="file" name="file"></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><textarea name="desc"></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="register" value="Submit" onClick="return validate()" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
