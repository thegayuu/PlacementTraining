<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";

if(isset($btn))
	{
			
			$qry=mysql_query("select * from register where id='$uname'");
			$num=mysql_num_rows($qry);
				if($num==1)
				{
				$_SESSION['uname']=$uname;
				mysql_query("delete from temp where uid='$uname'");
				header("location:view_topics2.php");
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
                    alert("Enter the Login ID..");
                    document.form1.uname.focus();
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
            <td align="center" valign="top">&nbsp;</td>
            <td valign="top"><p class="style1"><?php echo $msg; ?></p>
              <table width="618" height="252" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="2" align="center" class="txt1"><h2><strong>Login</strong></h2></td>
                  <td width="90" rowspan="4" align="center" class="txt1"><img src="images/logid.jpg" width="274" height="184"></td>
                </tr>
                <tr>
                  <td width="94" height="90" class="txt1"><h3>Your ID </h3></td>
                  <td width="90" class="txt1"><input type="text" name="uname" /></td>
                </tr>
                <tr>
                  <td width="94" class="txt1">&nbsp;</td>
                  <td width="90" class="txt1">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" align="center" class="txt1">
				  
				  <input type="submit" name="btn" value="Login" onClick="return validate()" /></td>
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
