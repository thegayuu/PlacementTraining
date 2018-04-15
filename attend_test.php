<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$msg="";

$uname=$_SESSION['uname'];

/////////////////

include("../social_relation_face/face_detect.php");

$cnt=count($output);
if($cnt>=3)
{
$max_qry1 = mysql_query("select max(id) maxid from ss_mal");
	$max_row1 = mysql_fetch_array($max_qry1);
	$id=$max_row1['maxid']+1;
	mysql_query("insert into ss_mal(id,uname) values($id,'$uname')");
}

//////////////
$q12=mysql_query("select * from ss_question where tid=$tid");
$n1=mysql_num_rows($q12);
$num=ceil($n1/5);
echo $num2=$num-1;
$q1=mysql_query("select * from ss_test_mcq where id=$tid");
$r1=mysql_fetch_array($q1);


$q11=mysql_query("select * from ss_result where tid=$tid && uname='$uname'");
$n11=mysql_num_rows($q11);
if($n11>0)
{
$r11=mysql_fetch_array($q11);
$clock=$r11['clock'];
}
else
{
$clock=$r1['duration'];
}


if($_REQUEST['page']=="")
{
$page="0";
$pg=1;
}
else
{
$pg=$page+1;
}
if(isset($btn))
{
	for($j=0;$j<count($gid);$j++)
	{
	$max_qry = mysql_query("select max(id) from ss_temp");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['max(id)']+1;
	
	$k=$j+1;
	$op=$_POST['p'.$k];
	$q3=mysql_query("select * from ss_question where id=".$gid[$j]."");
	$r3=mysql_fetch_array($q3);
	$cans=$r3['answer'];
		if($cans==$op)
		{
		$m++;
		}
	mysql_query("insert into ss_temp(id,uid,tid,qid,uans,cans) values($id,'$uname','$tid','$gid[$j]','$op','$cans')");
	}
	
	
	if($page<$num2)
	{
		if($page=="0")
		{
		$max_qry2 = mysql_query("select max(id) from ss_result");
		$max_row2 = mysql_fetch_array($max_qry2);
		$id2=$max_row2['max(id)']+1;
		mysql_query("insert into ss_result(id,uname,tid,total,correct,clock) values($id2,'$uname','$tid','$n1','$m','$disp')");
		
		
		?>
		<script language="javascript">
		//alert("Test Completed");
		window.location.href="attend_test.php?page=<?php echo $pg; ?>&tid=<?php echo $tid; ?>&rid=<?php echo $id2; ?>";
		</script>
		<?php
		}
		else
		{
		mysql_query("update ss_result set clock='$disp',correct=correct+$k where id=$rid");
		
		
		?>
		<script language="javascript">
		//alert("Test Completed");
		window.location.href="attend_test.php?page=<?php echo $pg; ?>&tid=<?php echo $tid; ?>&rid=<?php echo $id2; ?>";
		</script>
		<?php
		}
	}
	else
	{
	mysql_query("update ss_result set clock='$disp',correct=correct+$k where id=$rid");
	
	
	?>
	<script language="javascript">
	alert("Test Completed");
	window.location.href="user_report.php";
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
<script language="javascript">
var n=3;
timedouturl="logout.php?time=1";
function Minutes(data)
{
	for(var i=0; i<data.length; i++)
	if(data.substring(i,i+1)==":")
	break;
	return(data.substring(0,i));
}
function Seconds(data)
{
	for(var i=0; i<data.length; i++)
	if(data.substring(i,i+1)==":")
	break;
	return(data.substring(i+1,data.length));
}
function Display(min,sec)
{
	var disp;
	if(min<=9) disp="0";
	else disp="";
	disp+=min+":";
	if(sec<=9) disp+="0"+sec;
	else disp+=sec;
	return(disp);
}
function Down()
{
	sec--;
	if(sec==-1) { sec=59; min--; }
	document.form1.disp.value=Display(min,sec);
	window.status="Remaining Time is :"+Display(min,sec)+" seconds";
	
	if(min==0 && sec==0)
	{
		document.questions.submit();
	alert("Your session has timed out");
	window.location.href=timedouturl;
	}
	else down=setTimeout("Down()",1000);
}
function timeIt()
{
	min=1*Minutes(document.form1.disp.value);
	sec=0+Seconds(document.form1.disp.value);
	Down();
}

</script>
</head>

<body onLoad="timeIt();redirect();">
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
      <td width="79%" align="center" valign="top"><p align="right" class="txt1"><span class="header">
        <input id="disp" readonly="true" type="text" value="<?php echo $clock; ?>" border="0" name="disp" />
      </span></p>
        <h3 class="txt3">MCQ Test </h3>
        <p>Title: <?php echo $r1['title']; ?></p>
        <table width="956" border="1">
          <tr>
            <th width="83" class="bg1" scope="row">Sno</th>
            <th width="313" class="bg1" scope="row">Question</th>
            <th width="130" class="bg1" scope="row">Option1</th>
            <th width="130" class="bg1" scope="row">Option2</th>
            <th width="130" class="bg1" scope="row">Option3</th>
            <th width="130" class="bg1" scope="row">Option4</th>
          </tr>
          <?php
		  $i=0;
		  
		  $j=$page*5;;
		  $qry=mysql_query("select * from ss_question where tid=$tid limit $page,5");
		  while($row=mysql_fetch_array($qry))
		  {
		  $i++;
		   $j++;
		  ?>
          <tr>
            <th align="left" class="bg2" scope="row"><?php echo $j; ?></th>
            <th align="left" class="bg2" scope="row"><?php echo $row['question']; ?></th>
            <th align="left" class="bg2" scope="row"><input name="p<?php echo $i; ?>" type="radio" value="1">
                <?php echo $row['option1']; ?></th>
            <th align="left" class="bg2" scope="row"><input name="p<?php echo $i; ?>" type="radio" value="2">
                <?php echo $row['option2']; ?></th>
            <th align="left" class="bg2" scope="row"><input name="p<?php echo $i; ?>" type="radio" value="3">
                <?php echo $row['option3']; ?></th>
            <th align="left" class="bg2" scope="row"><input name="p<?php echo $i; ?>" type="radio" value="4">
                <?php echo $row['option4']; ?>
              <input type="hidden" name="gid[]" value="<?php echo $row['id']; ?>"></th>
          </tr>
          <?php
		 
		  }
		  ?>
        </table>
        <p class="style1">
          <input type="submit" name="btn" value="Submit">
        </p>
        <p><iframe src="img.php" width="150" height="150"></iframe></p>
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
