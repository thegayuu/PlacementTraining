<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";

if(isset($btn))
	{
			if($uname=="admin")
			{
			$qry=mysql_query("select * from admin where username='$uname' && password='$pass'");
			$num=mysql_num_rows($qry);
				if($num==1)
				{
				$_SESSION['uname']=$uname;
				header("location:admin.php");
				}
				else
				{
				$msg="Invalid User!";
				}
			}
			else
			{
			$qry=mysql_query("select * from register where username='$uname' && password='$pass'");
			$num=mysql_num_rows($qry);
				if($num==1)
				{
				$_SESSION['uname']=$uname;
				header("location:userhome.php");
				}
				else
				{
				$msg="Invalid User!";
				}
			}
	}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {color: #003399}
-->
</style>

		<script language="javascript">
            function validate()
            {
                if (document.form1.uname.value == "")
                {
                    alert("Enter the Username..");
                    document.form1.uname.focus();
                    return false;
                }
                if (document.form1.pwd.value == "")
                {
                    alert("Enter the Password..");
                    document.form1.pwd.focus();
                    return false;
                }

                return true;
            }
        </script>
		
</head>

<body onLoad="getLocation()">
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_home.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <h2 class="style6">KNOCK TRACK</h2>
        <div id="link"><a href="index2.php">ADMIN</a> 
		<a href="index1.php" class="link">STUDENT</a>
		</div>
        <p>&nbsp;</p>
        <p><img src="images/imm.jpg" width="225" height="225">
        </p>
        <p class="style1">&nbsp;</p>
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
