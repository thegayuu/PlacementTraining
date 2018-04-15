<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";
$q1=mysql_query("select * from ss_test_mcq where id=$tid");
$r1=mysql_fetch_array($q1);
if(isset($register))
{

	$max_qry = mysql_query("select max(id) maxid from ss_question");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;


		$uqry="insert into ss_question(id,tid,question,option1,option2,option3,option4,answer) values($id,'$tid','$question','$option1','$option2','$option3','$option4','$answer')";
		$res=mysql_query($uqry);
		if($res)
		{
		header("location:view_test.php?tid=".$tid);
		}
		else
		{
		$msg="Could not be stored!";
		}
	
}
////////////////////////////////////
if(isset($btn))
{
/*	for($k=0;$k<$num;$k++)
	{
$mq=mysql_query("select max(id) from subject");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;
	$qry=mysql_query("insert into subject(id,dept,semester,scode,subject) values($id,'$dept','$semester','$scode[$k]','$subject[$k]')");
	}
if($qry)
{
header("location:view_subject.php");
}*/

$fname="excel/questions.xlsx";
move_uploaded_file($_FILES['file']['tmp_name'],$fname);

set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = $fname; //'discussdesk.xlsx'; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


	for($i=1;$i<=$arrayCount;$i++)
	{
	//$userName = trim($allDataInSheet[$i]["A"]);
	//$userMobile = trim($allDataInSheet[$i]["B"]);
	$question = trim($allDataInSheet[$i]["A"]);
	$option1 = trim($allDataInSheet[$i]["B"]);
	$option2 = trim($allDataInSheet[$i]["C"]);
	$option3 = trim($allDataInSheet[$i]["D"]);
	$option4 = trim($allDataInSheet[$i]["E"]);
	$answer = trim($allDataInSheet[$i]["F"]);
	
	
	//$query = "SELECT name FROM test WHERE name = '".$userName."' and email = '".$userMobile."'";
//	$sql = mysql_query($query);
//	$recResult = mysql_fetch_array($sql);
//	$existName = $recResult["name"];
		//if($existName=="") 
		//{
		$mq=mysql_query("select max(id) from ss_question");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;
		//$insertTable= mysql_query("insert into test (name, email) values('".$userName."', '".$userMobile."');");
		if($question!="")
		{
		$uqry=mysql_query("insert into ss_question(id,tid,question,option1,option2,option3,option4,answer) values($id,'$tid','$question','$option1','$option2','$option3','$option4','$answer')");
		}
		//$msg = 'Record has been added. <div style="Padding:20px 0 0 0;"><a href="">Go Back to tutorial</a></div>';
		//} 
		//else 
		//{
		//$msg = 'Record already exist. <div style="Padding:20px 0 0 0;"><a href="">Go Back to tutorial</a></div>';
		//}
	}
	//echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>".$msg."</div>";
	?>
	<script language="javascript">
	alert("Uploaded Successfully");
	window.location.href="view_test.php?tid=<?php echo $tid; ?>";
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
.style2 {
	color: #990000
}
-->
</style>

 <script language="javascript">
           function validate()
            {
			  
                if (document.form1.question.value == "")
                {
                    alert("Enter the Question");
                    document.form1.question.focus();
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
      <td colspan="2" align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2"><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td width="22%" align="center" valign="top" class="bgside"><p>&nbsp;</p>
        <p><span class="txt1">
        <?php include("include/link_side.php"); ?>
        </span></p>
        <p class="style1 style2">&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td width="78%" align="center"><p class="style1 style2">&nbsp;</p>
        <p class="style1 style2"><?php echo $msg; ?></p>
        <table width="449" height="322" border="0" cellpadding="5" cellspacing="0" class="bg11">
          <tr>
            <td colspan="2" align="center"><strong>Questions</strong></td>
          </tr>
          <tr>
            <td>Title</td>
            <td><?php echo $r1['topic']; ?></td>
          </tr>
          <tr>
            <td width="162">Question</td>
            <td width="162"><input type="text" name="question"></td>
          </tr>
          <tr>
            <td>Option1</td>
            <td><input type="text" name="option1"></td>
          </tr>
          <tr>
            <td>Option2</td>
            <td><input type="text" name="option2"></td>
          </tr>
          <tr>
            <td>Option3</td>
            <td><input type="text" name="option3"></td>
          </tr>
          <tr>
            <td>Option4</td>
            <td><input type="text" name="option4"></td>
          </tr>
          <tr>
            <td>Answer</td>
            <td><select name="answer">
                <option value="1">option1</option>
                <option value="2">option2</option>
                <option value="3">option3</option>
                <option value="4">option4</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="register" value="Submit" onClick="return validate()" /></td>
          </tr>
        </table>
      <p>Upload Excel File </p>
      <p>
        <input type="file" name="file">
        <input type="submit" name="btn" value="Upload">
      </p>
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
