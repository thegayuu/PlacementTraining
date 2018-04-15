<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";

if(isset($btn))
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
        <table width="89%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top"><img src="images/imagesxzx.jpg" width="275" height="183"></td>
            <td valign="top"><table width="318" height="169" border="0" cellpadding="5" cellspacing="0" class="bgbor">
                <tr>
                  <td colspan="2" align="center" class="txt1"><strong>Admin Login</strong></td>
                </tr>
                <tr>
                  <td width="94" class="txt1">Username</td>
                  <td width="90" class="txt1"><input type="text" name="uname" /></td>
                </tr>
                <tr>
                  <td class="txt1">Password</td>
                  <td class="txt1"><input type="password" name="pass" />				  </td>
                </tr>
                <tr>
                  <td width="94" class="txt1">&nbsp;</td>
                  <td width="90" class="txt1">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="txt1">
				  
				  <input type="submit" name="btn" value="Login" onClick="return validate()" />
                    &nbsp;
                    <input type="reset" name="Reset" value="Clear"></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="txt1"><span class="style1"><?php echo $msg; ?></span></td>
                </tr>
              </table>
              
              <p></p></td>
          </tr>
        </table>
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
