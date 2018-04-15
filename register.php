<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
if(isset($register))
{

	$max_qry = mysql_query("select max(id) maxid from ss_register");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$rdate=date("d-m-Y");
					
		$uqry="insert into ss_register(id,name,uname,pass,rdate) values($id,'$name','$uname','$pass','$rdate')";
		$res=mysql_query($uqry);
		if($res)
		{
		?>
		<script language="javascript">
		alert("Added Successfully");
		window.location.href="register.php";
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
			  
                if (document.form1.name.value == "")
                {
                    alert("Enter the Name");
                    document.form1.name.focus();
                    return false;
                }
				 if (document.form1.uname.value == "")
                {
                    alert("Enter the Username");
                    document.form1.uname.focus();
                    return false;
                }
				 if (document.form1.pass.value == "")
                {
                    alert("Enter the Password");
                    document.form1.pass.focus();
                    return false;
                }
				
			/*	if (document.form1.gender[0].checked==false && document.form1.gender[1].checked==false)
                {
                    alert("Select the Gender");
                    return false;
                }
               
                if (document.form1.contact.value == "")
                {
                    alert("Enter the Contact No.");
                    document.form1.contact.focus();
                    return false;
                }
				if (isNaN(document.form1.contact.value))
                {
                    alert("Invalid Contact No.");
                    document.form1.contact.select();
                    return false;
                }
				if (document.form1.contact.value.length != 10)
                {
                    alert("10 digists only allowed!!");
                    document.form1.contact.select();
                    return false;
                }
				 if (document.form1.email.value == "")
                {
                    alert("Enter the E-mail");
                    document.form1.email.focus();
                    return false;
                }
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form1.email.value))  
				  {  
					//return (true)  
				  }  
				  else
				  {
					alert("You have entered an invalid email address!");
					document.form1.email.select();
					return false; 
				  }*/
				
                return true;
            }
        </script>		
</head>

<body>
<form action="" method="post" name="form1" id="form1">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td colspan="2" align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2"><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td width="22%" align="center" valign="top" class="bgside"><p>&nbsp;</p>
        <?php include("include/link_side.php"); ?>
        <p class="style1 style2">&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td width="78%" align="center"><p class="style1 style2">&nbsp;</p>
        <p class="style1 style2"><?php echo $msg; ?></p>
        <table width="409" height="250" border="0" cellpadding="5" cellspacing="0" class="bgbor">
          <tr>
            <td colspan="2" align="center"><strong>Add User </strong></td>
          </tr>
          <tr>
            <td width="162" align="left">Name</td>
            <td width="162" align="left"><input type="text" name="name"></td>
          </tr>

          <tr>
            <td align="left">Username</td>
            <td align="left"><input type="text" name="uname"></td>
          </tr>
          <tr>
            <td align="left">Password</td>
            <td align="left"><input type="password" name="pass"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="register" value="Submit" onClick="return validate()" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
