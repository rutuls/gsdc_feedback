<?php

include('session.php');
#include ('C:\xampp\htdocs\phplot-6.2.0\phplot.php');
require 'C:\xampp\htdocs\phplot-6.2.0\phplot.php';
require_once 'C:\xampp\htdocs\phplot-6.2.0\data_table.php';
#$conntosurveyprd = new mysqli("10.216.12.134", "gsdc_survey", "netapp123!", "TracGSDC");
$conntosurveyprd = new mysqli("localhost", "root", "", "survey_prd");
	// Check connection
		if ($conntosurveyprd->connect_error) {
    	die("Connection failed: " . $conntosurveyprd->connect_error);
		} else {echo "";}


?>

<?php
ini_set('display_errors','off');
?>
<!DOCTYPE html>
<html>
<head>
<script src="jquery.min.js"></script>
<style type="text/css">
html
{background: url(C:/xampp/htdocs/feedback/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

</style>



<style>
	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
	}
	th { 
		background: #556BAC; 
		color: white; 
		font-weight: bold; 
	}
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
	}
	</style>


<script type="text/javascript">
function ChangeOption(val)
{

var ele1=document.getElementById('datesuboptiondiv')
var ele5=document.getElementById('datesuboptiondiv1')
var ele9=document.getElementById('dynamicdep')
var ele10=document.getElementById('dynamicdep1')
var ele11=document.getElementById('dynamicemp')
var ele12=document.getElementById('dynamicemp1')
var ele13=document.getElementById('dynamiceng')
var ele14=document.getElementById('dynamiceng1')
if(val=='alldate')
{
	ele1.style.display='block';
}
else
{
	ele1.style.display='none';
}
if(val=='stenddate')
{
	ele5.style.display='block';
}
else
{
	ele5.style.display='none';
}
if(val=='spengid1')
{
	ele5.style.display='block';
	ele14.style.display='block';
}
else
	ele14.style.display='none';

if(val=='dept1')
{
	ele5.style.display='block';
	ele10.style.display='block';
	//ele7.style.display='block';
}
else
{
	//ele7.style.display='none';
	ele10.style.display='none';
}
if(val=='employee1')
{
	ele5.style.display='block';
	ele12.style.display='block';
	//ele8.style.display='block';
}
else
{
	//ele8.style.display='none';
	ele12.style.display='none';	
}
if(val=='allengid1')
{
	ele5.style.display='block';
	

}
else
{

}
if(val=='multi1')
{
	ele5.style.display='block';
}
else
{

}
if(val=='feedback1')
{
	ele5.style.display='block';
}
else
{

}
if(val=='spengid')
{
	ele1.style.display='block';
	ele13.style.display='block';
}
else
	ele13.style.display='none';

if(val=='dept')
{
	ele1.style.display='block';
	ele9.style.display='block';
	//ele3.style.display='block';
}
else
{
	//ele3.style.display='none';
	ele9.style.display='none';
}
if(val=='employee')
{
	ele1.style.display='block';
	ele11.style.display='block';
	//ele4.style.display='block';
}
else
{
	ele11.style.display='none';	
	//ele4.style.display='none';	
}
if(val=='allengid')
{
	ele1.style.display='block';
	

}
else
{

}
if(val=='multi')
{
	ele1.style.display='block'
}	
else
{

}
if(val=='feedback')
{
ele1.style.display='block'
}
else
{

}
}

</script>

<title>Portal</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body background="bg.jpg" class="background" onload="showDiv()">

<div align="center">
<img src="horizontal-logo.png" align="middle"> <br><br>
<h2 id="top">GSDC ENGAGEMENT FEEDBACK PORTAL</h2><br>

</div>

<b id="logout"><a href="logout.php">&nbsp;Log Out&nbsp;</a></b>
<br><br>
<b id="portal2"><a href="profile.php"> &nbsp;Approve/Disapprove Users &nbsp;</a></b>

			<b id="portal2"><a href="createlink.php"> &nbsp;Link creation for new Eng Id&nbsp; </a></b>
			<!-- <b id="portal2"><a href="portal.php">Portal</a></b> -->
			
			<br><br>
<div align="center">
<h2>Report Generation For The Feedback Survey</h2>
</div>

<?php

$error="";
$total=$allavg=0;
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
function getename($engid)
{
	$namelist=array();
	$deplist=array();
	#$conntosurveyprd = new mysqli("10.216.12.134", "gsdc_survey", "netapp123!", "TracGSDC");
	$conntosurveyprd = new mysqli("localhost", "root", "", "survey_prd");
	// Check connection
		if ($conntosurveyprd->connect_error) {
    	die("Connection failed: " . $conntosurveyprd->connect_error);
		} else {echo "";}


		 for($i=0;$i<count($engid);$i++)
		 {
		 		$surveyprdquery="select ename,dep from category where engid='".$engid[$i]."' ";
		 		$sql = mysqli_query($conntosurveyprd,$surveyprdquery);
		 		while($row=mysqli_fetch_assoc($sql))
		 		{
		 			array_push($namelist,$row['ename'] );
		 			array_push($deplist,$row['dep']);
		 		}
		 		

		 }

return array($namelist,$deplist);
}

function getquestlist()
{
	$qno=array();
	$questdesc=array();
	$connection= new mysqli("localhost", "root", "", "shradb");
	if ($connection->connect_error) {
    	die("Connection failed: " . $connection->connect_error);
		} else {echo "";}

	$questquery="select qid,qued from question";
	$sql=mysqli_query($connection,$questquery);
	while($row=mysqli_fetch_assoc($sql))
	{
		array_push($qno,$row['qid']);
		array_push($questdesc,$row['qued']);
	}
return array($qno,$questdesc);
}

function getanslist()
{
	$ano=array();
	$ansdesc=array();
	$ansv=array();
	$connection= new mysqli("localhost", "root", "", "shradb");
	if ($connection->connect_error) {
    	die("Connection failed: " . $connection->connect_error);
		} else {echo "";}

	$ansquery="select aid,ansv,ansd from answer";
	$sql=mysqli_query($connection,$ansquery);
	while($row=mysqli_fetch_assoc($sql))
	{
		array_push($ano,$row['aid']);
		array_push($ansv,$row['ansv']);
		array_push($ansdesc,$row['ansd']);
	}
return array($ano,$ansdesc,$ansv);
}



?>


<div id="main">
<form method="post" style="width: 1200px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<label> 	Select Any Option:</label>

<select name="selector" id="selector" onchange='ChangeOption(this.value);'>
	<option value="blank" >Select...</option>
	<option value="alldate" >For the Entire Date Range</option>
  	<option value="stenddate" >For a Particular Date Range</option>
</select>

<br>
<br>


<div style='display:none;' id="datesuboptiondiv" >
<br>

<label> From Date : </label>

<input type="date" name="fromdate" min="2000-01-02" value="2015-12-01" disabled/>


<label> To Date : </label>

<input type="date" name="todate" id="todate" min="2000-01-02" value="<?php print (date("Y-m-d"));?>"/>
<br><br>

<label>Choose Option: </label>
<select name="suboptions" id="suboptions" onchange='ChangeOption(this.value);'>
<option value="blank">Select an Option </option>
<option value="allengid" >Search results for All Engagement IDs</option>
<option value="spengid">Search results for specific Engagement IDs</option>
<option value="dept">Search results by Team name</option>
<option value="employee">Search results by Employee name</option>
<option value="multi">Response Recieved for All Questions</option>
<option value="feedback">Show Feedback for All Engagement IDs</option>  
</select>

</div>

<div style='display:none;' id="datesuboptiondiv1">
<br>

<label> From Date : </label>

<input type="date" name="fromdate1" id="fromdate1" min="2000-01-02" value="2015-12-01"/>


<label> To Date : </label>

<input type="date" name="todate1" id="todate1" min="2000-01-02" value="<?php print (date("Y-m-d"));?>"/>
<br><br>

<label>Choose Option: </label>

<select name="suboptions1" onchange='ChangeOption(this.value);'>
<option value="blank1">Select an Option </option>
<option value="allengid1">Search results for All Engagement IDs</option>
<option value="spengid1">Search results for specific Engagement ID</option>
<option value="dept1">Search results by Team name</option>
<option value="employee1">Search results by Employee name</option>
<option value="multi1">Response Recieved for All Questions</option>
<option value="feedback1">Show Feedback for All Engagement IDs</option>  
</select>
</div>
<br>


<div style='display:none;' id="dynamiceng">
<label> Select Engagement ID </label>
<select name="ownerengm">
<?php 
$query="select distinct engid from enginfo";
$sql = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($sql)){
echo "<option value='".$row['engid']."'>" . $row['engid'] . "</option>";
}
?>
</select>
</div>

<div style='display:none;' id="dynamiceng1">
<label> Select Engagement ID </label>
<select name="ownerengm1">
<?php 
$query="select distinct engid from enginfo";
$sql = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($sql)){
echo "<option value='".$row['engid']."'>" . $row['engid'] . "</option>";
}
?>
</select>
</div>

<div style='display:none;' id="dynamicemp">
<label> Select Employee </label>
<select name="ownerempm">
<?php 
$query="select distinct ename from category";
$sql = mysqli_query($conntosurveyprd,$query);
while ($row = mysqli_fetch_assoc($sql)){
echo "<option value='".$row['ename']."'>" . $row['ename'] . "</option>";
}
?>
</select>
</div>
<div style='display:none;' id="dynamicemp1">
<label>Select Employee </label>
<select name="ownerempm1">
<?php 
$query="select distinct ename from category";
$sql = mysqli_query($conntosurveyprd,$query);
while ($row = mysqli_fetch_assoc($sql)){
echo "<option value='".$row['ename']."'>" . $row['ename'] . "</option>";
}
?>
</select>
</div>

<div style='display:none;' id="dynamicdep">
<label>Select Department </label>
<select name="ownerdepm" id="ownerdepm">
<?php 
$query="select distinct dep from category";
$sql = mysqli_query($conntosurveyprd,$query);
while ($row = mysqli_fetch_assoc($sql)){
echo "<option value='".$row['dep']."'>" . $row['dep'] . "</option>";
}
?>
</select>
</div>

<div style='display:none;' id="dynamicdep1">
<label>Select Department </label>
<select name="ownerdepm1" id="ownerdepm1">
<?php 
$query="select distinct dep from category";
$sql = mysqli_query($conntosurveyprd,$query);
while ($row = mysqli_fetch_assoc($sql)){
echo "<option value='".$row['dep']."'>" . $row['dep'] . "</option>";
}
?>
</select>
</div>

 <br>
	   <input type="submit" value="Show" name="retrieve" >

<?php
	
if(isset($_POST['selector']))
{
	$selected=$_POST['selector'];
}
if(isset($_POST['suboptions']))
{
	$subselected=$_POST['suboptions'];
}
if(isset($_POST['fromdate']))
{
	$fromdate=$_POST['fromdate'];
}
if(isset($_POST['todate']))
{
	$todate=$_POST['todate'];
}
if(isset($_POST['dateoptions']))
{
	$dateoptions=$_POST['dateoptions'];
}
if(isset($_POST['suboptions1']))
{
	$subselected1=$_POST['suboptions1'];
}
if(isset($_POST['ownerdepm']))
{
	$dynamicdep=$_POST['ownerdepm'];
}
if(isset($_POST['ownerdepm1']))
{
	$dynamicdep1=$_POST['ownerdepm1'];
}
if(isset($_POST['ownerempm']))
{
	$dynamicemp=$_POST['ownerempm'];
}
if(isset($_POST['ownerempm1']))
{
	$dynamicemp1=$_POST['ownerempm1'];
}
if(isset($_POST['fromdate1']))
{
	$fromdate1=$_POST['fromdate1'];
}
if(isset($_POST['todate1']))
{
	$todate1=$_POST['todate1'];
}

$dataset=array();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if($subselected=="spengid")
	{
	if ( ! empty($_POST['ownerengm']))
	{
	
		$retrieve_text=test_input($_POST['ownerengm']);
		$showquery="select qid,ansdesc,rating from enginfo where engid='".$retrieve_text."'";
		$result=mysqli_query($connection,$showquery);
		$avg_query="select AVG(rating) as avg from enginfo where engid='".$retrieve_text."' AND rating>0" ;
		$avg_rating=mysqli_query($connection,$avg_query);
		$avg_result=mysqli_fetch_assoc($avg_rating);
		$avg_value=$avg_result['avg'];
		$qued=array();
		$answer=array();
		?>

		
		<?php

		while($row=mysqli_fetch_assoc($result))
		{
			array_push($answer,$row['ansdesc']);
			$qid=$row['qid'];
			$rating=$row['rating'];
			$dataset1[]=array($qid,$rating);

			$quest="select qued from question where qid='".$qid."'";
			$res=mysqli_query($connection,$quest);
			$list=mysqli_fetch_assoc($res);
			array_push($qued,$list['qued']);

			?>

<?php	}?>
	<br><a href="#" id="btnExport" >Export data into Excel</a><br>
	<br>
	<b>Graph:</b>
	<br><br>
<?php


$_SESSION['arr']=$dataset1;

echo '<div class="scrollit"><img src="graph_qid_rat.php"/></div><br><br>';?>

			<br><b>Table</b><br><br></form>
			<iframe id="myFrame" style="display:none"></iframe>
			<table style="width:50%" id="table">
			
			<th>Question</th>
			<th>Answer</th>	

<?php

for($i=0;$i<count($qued);$i++)
{?>
			<tr>
			<td><?php echo $qued[$i];?></td>
			<td><?php echo $answer[$i];?></td>
			</tr>	

<?php
}

?>
</table>
<a href="#top">Go to Top</a>
<?php
	}
	else
	{
		$error="Enter valid Engagement ID";
		?>
		<span><?php echo $error; ?></span>
		<?php
	}

	}

	else if($subselected1=="spengid1")
	{
	if ( ! empty($_POST['ownerengm1']))
	{
	
		$retrieve_text=test_input($_POST['ownerengm1']);
		$showquery="select qid,ansdesc,rating from enginfo where engid='".$retrieve_text."'";
		$result=mysqli_query($connection,$showquery);
		$avg_query="select AVG(rating) as avg from enginfo where engid='".$retrieve_text."' AND rating>0" ;
		$avg_rating=mysqli_query($connection,$avg_query);
		$avg_result=mysqli_fetch_assoc($avg_rating);
		$avg_value=$avg_result['avg'];
		$qued=array();
		$answer=array();
		?>

		
		<?php

		while($row=mysqli_fetch_assoc($result))
		{
			array_push($answer,$row['ansdesc']);
			$qid=$row['qid'];
			$rating=$row['rating'];
			$dataset1[]=array($qid,$rating);

			$quest="select qued from question where qid='".$qid."'";
			$res=mysqli_query($connection,$quest);
			$list=mysqli_fetch_assoc($res);
			array_push($qued,$list['qued']);

			?>

<?php	}?>
	<br><a href="#" id="btnExport" >Export data into Excel</a><br>
	<br>
	<b>Graph:</b>
	<br><br>
<?php


$_SESSION['arr']=$dataset1;

echo '<div class="scrollit"><img src="graph_qid_rat.php"/><br><br></div>';?>

			<br><b>Table</b><br><br>
			<iframe id="myFrame" style="display:none"></iframe>
			<table style="width:50%" id="table">
			<thead>
			<th>Question</th>
			<th>Answer</th>	
			</thead>
<?php

for($i=0;$i<count($qued);$i++)
{?>
			<tr>
			<td><?php echo $qued[$i];?></td>
			<td><?php echo $answer[$i];?></td>
			</tr>	

<?php
}

?>
</table>
<a href="#top">Go to Top</a>
<?php
	}
	else
	{
		$error="Enter valid Engagement ID";
		?>
		<span><?php echo $error; ?></span>
		<?php
	}

	}


	
	else if($selected=="alldate"  && !empty($todate) && $subselected=="allengid" )
	{
		$returnarray=array();
		$engidarray=array();
		$avgarray=array();
		$commarr=array();
		$ratingarr=array();
		$alldata="select enginfo.engid as engid,enginfo.id,qid,rating from enginfo JOIN feedt ON enginfo.id=feedt.id where feedt.date BETWEEN '2015-12-01' AND '".$_POST['todate']."' order by enginfo.id,enginfo.qid";
		$avg_query="select feedt.engid as engid,feedt.commt as comment, AVG(enginfo.rating) as avg FROM feedt JOIN enginfo ON feedt.id=enginfo.id where feedt.date BETWEEN '2015-12-01' AND '".$_POST['todate']."' AND rating>0 group by enginfo.id order by feedt.id";
		$avg_rating=mysqli_query($connection,$avg_query);
		$alldatares=mysqli_query($connection,$alldata);?>
		
<?php	while($avg_result=mysqli_fetch_assoc($avg_rating))
		{
			$engid=$avg_result['engid'];
			$avg_value=$avg_result['avg'];	
			array_push($engidarray,$engid);
			array_push($avgarray,$avg_value);
			array_push($commarr,$avg_result['comment']);
			
			
		}
		while($alldatarow=mysqli_fetch_assoc($alldatares))
		{
	
			array_push($ratingarr,$alldatarow['rating']);
		}
		 $returnarray=getename($engidarray);
		 echo '<br><a href="#" id="btnExport" >Export data into Excel</a><br>';
		 echo '<br><br><b>Graph:</b><br>';
		 echo '<div class="scrollit"><img src="graph_all_engid.php"/></div><br><br><b>Table</b><br><br>';?>
		 <?php 
		 $questarray=getquestlist();?>
		 <div class="right" id="logout">
		 <table id="qtable">
		 <th>QNo</th>
		 <th>Question</th>
<?php for($i=0;$i<7;$i++)
		{?>
		 <tr>
		 	<td><?php echo $questarray[0][$i];?></td>
		 	<td><?php echo $questarray[1][$i];?></td>
		 </tr>
		 
<?php	}?>
</table><br>
<?php 
		$ansarray=getanslist();?>
		<table id="atable">
		 <th>ANo</th>
		 <th>Answer</th>
		 <th>Rating</th>
<?php for($i=0;$i<5;$i++)
		{?>
		 <tr>
		 	<td><?php echo $ansarray[0][$i];?></td>
		 	<td><?php echo $ansarray[1][$i];?></td>
		 	<td><?php echo $ansarray[2][$i];?></td>
		 </tr>
		 
<?php	}?>
</table>
</div>				
		<iframe id="myFrame" style="display:none"></iframe>
		<table style="width:50%" id="table">
		
		<th>Engagement ID</th>
		<th>Employee Name</th>
		<th>Team Name</th>
		<th>Q2</th>
		<th>Q3</th>
		<th>Q4</th>
		<th>Q5</th>
		<th>Q6</th>
		<th>Q7</th>
		<th>Q8</th>
		<th>Avg Rating</th>
		<th>Feedback</th>

<?php	$l=0;
		for($i=0;$i<count($engidarray);$i++)
		{	$totalarr=array($engidarray[$i]);
			?>		
		<tr>
			<td><?php echo $engidarray[$i];?></td>
			<td><?php echo $returnarray[0][$i];?></td>
			<td><?php echo $returnarray[1][$i];?></td>
	<?php	
				for($j=$l;$j<$l+7;$j++)
						{
								if($j<count($ratingarr))
								{
									array_push($totalarr,$ratingarr[$j]);
								}
								?>
								<td align="center"><?php echo $ratingarr[$j];?></td>
<?php					} ?>


								<td align="center"><?php echo $avgarray[$i];?></font></td>
								<td align="center"><?php echo $commarr[$i];?></td>
		</tr>
<?php	
		$l=$l+7;
		$dataset3[]=$totalarr;
		}
		?>
		</table>
	<a href="#top">Go to Top</a>	
<?php 
$_SESSION['dataset3']=$dataset3;

	}

	else if($selected=="stenddate"  && !empty($todate1) && $subselected1=="allengid1" )
	{
		$engidarray=array();
		$avgarray=array();
		$commarr=array();
		$ratingarr=array();
		$returnarray=array();
		$alldata="select enginfo.engid as engid,qid,rating from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '".$_POST['fromdate1']."' AND '".$_POST['todate1']."'";
		$avg_query="select feedt.engid as engid,feedt.commt as comment, AVG(enginfo.rating) as avg FROM feedt JOIN enginfo ON feedt.engid=enginfo.engid where feedt.date BETWEEN '".$_POST['fromdate1']."' AND '".$_POST['todate1']."' AND rating>0 group by engid";
		$avg_rating=mysqli_query($connection,$avg_query);
		$alldatares=mysqli_query($connection,$alldata);?>
	
<?php	while($avg_result=mysqli_fetch_assoc($avg_rating))
		{
			$engid=$avg_result['engid'];
			$avg_value=$avg_result['avg'];	
			array_push($engidarray,$engid);
			array_push($avgarray,$avg_value);
			array_push($commarr,$avg_result['comment']);
	
		}
		while($alldatarow=mysqli_fetch_assoc($alldatares))
		{
	
			array_push($ratingarr,$alldatarow['rating']);
		}

		$returnarray=getename($engidarray);
		echo '<br><a href="#" id="btnExport" >Export data into Excel</a><br>';
		 echo '<br><br><b>Graph:</b><br>';
		echo '<div class="scrollit"><img src="graph_all_engid.php"/><div><br>';
		echo '<div class="right" id="logout">
<br>
<label><b>List of Questions in Feedback Survey Form:</b> </label><br><br>
<label>Q2. The work was delivered on time, as promised to my customer</label><br><br>
<label>Q3. The quality of work met my expectations</label><br><br>
<label>Q4. The GSDC engineer(s) had the requisite technical knowledge for this project</label><br><br>
<label>Q5. The GSDC engineer(s) was able to handle the customers technical queries</label><br><br>
<label>Q6. The GSDC engineer(s) was able to escalate existing/potential issues to the Project Manager</label><br><br>
<label>Q7. I found it easy to engage the GSDC for this project</label><br><br>
<label>Q8. I m satisfied with the GSDCs speed in responding to my request</label><br><br>
<label><b>List of Options for Each Question:</b> </label><br>
<label> 1. Strongly Agree (Rating 5) <br> 2. Agree (Rating 4) <br> 3. Niether Agree Nor Disagree (Rating 3)<br> 4. Disagree (Rating 2) <br> 5. Strongly Disagree (Rating 1) <br> 6. Not Applicable (Rating 0)<br></label>
</div>'		;

		 ?>
		<label><b>Tabel<b></label><br>
		<iframe id="myFrame" style="display:none"></iframe>
		
		<table style="width:50%" id="table">
		<thead>
		<th>Engagement ID</th>
		<th>Employee Name</th>
		<th>Team Name</th>
		<th>Q2</th>
		<th>Q3</th>
		<th>Q4</th>
		<th>Q5</th>
		<th>Q6</th>
		<th>Q7</th>
		<th>Q8</th>
		<th>Avg Rating</th>
		<th>Feedback</th>
		</thead>
<?php	$l=0;
		for($i=0;$i<count($engidarray);$i++)
		{	$totalarr=array($engidarray[$i]);
			?>	
		<tbody>	
		<tr>
			<td><?php echo $engidarray[$i];?></td>
			<td><?php echo $returnarray[0][$i];?></td>
			<td><?php echo $returnarray[1][$i];?></td>
	<?php	
				for($j=$l;$j<$l+7;$j++)
						{
								if($j<count($ratingarr))
								{
									array_push($totalarr,$ratingarr[$j]);
								}
								?>
								
								<td align="center"><?php echo $ratingarr[$j];?></td>
<?php					} ?>


								<td align="center"><?php echo $avgarray[$i];?></font></td>
								<td align="center"><?php echo $commarr[$i];?></td>
								</tr>
						
								</tbody>

<?php	
		$l=$l+7;
		$dataset3[]=$totalarr;
		}?>
	</table>
	<a href="#top">Go to Top</a>
<?php 
$_SESSION['dataset3']=$dataset3;

	}

	else if($subselected=="multi")
	{
		
		for($i=2;$i<=8;$i++)
		{
			
			$person_count_query="select COUNT(enginfo.aid) as count_aid from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '2015-12-01' AND '".$_POST['todate']."' AND enginfo.qid='".$i."' group by enginfo.aid";
			$person_count_result=mysqli_query($connection,$person_count_query);
			$arr=array($i);
			while($result=mysqli_fetch_assoc($person_count_result))
			{
				$person_count=$result['count_aid'];
				array_push($arr,$person_count);	
			}
			
				$dataset5[]=$arr;
		}

	$_SESSION['dataset5']=$dataset5;?>
	<br><br>
		<b>Graph:</b><br>

<?php	echo '<div class="scrollit"><img src="graph_qid_multidataset.php"/></div>';

	}

	else if($subselected1=="multi1")
	{
		
		for($i=2;$i<=8;$i++)
		{
			
			$person_count_query="select COUNT(enginfo.aid) as count_aid from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '".$_POST['fromdate1']."' AND '".$_POST['todate1']."' AND enginfo.qid='".$i."' group by enginfo.aid";
			$person_count_result=mysqli_query($connection,$person_count_query);
			$arr=array($i);
			while($result=mysqli_fetch_assoc($person_count_result))
			{
				$person_count=$result['count_aid'];
				array_push($arr,$person_count);	
			}
			
				$dataset5[]=$arr;
		}

	$_SESSION['dataset5']=$dataset5;?>
<br><br>
		<b>Graph:</b><br>
<?php	echo '<img src="graph_qid_multidataset.php"/>';

	}





	else if($selected=="alldate" && $subselected=='dept' && !empty($dynamicdep))
	{ ?>
		
<?php	#$conntosurveyprd = new mysqli("10.216.12.134", "gsdc_survey", "netapp123!", "TracGSDC");
		$conntosurveyprd = new mysqli("localhost", "root", "", "survey_prd");
	// Check connection
		if ($conntosurveyprd->connect_error) {
    	die("Connection failed: " . $conntosurveyprd->connect_error);
		} else {echo "";}


		$engarray=array();
		$namearray=array();
		$deptarray=array();
		$qarray=array();
		$avgarr=array();
		$surveyprd_engid="select engid,ename,dep from category where dep='".$dynamicdep."' ";
		$result=mysqli_query($conntosurveyprd,$surveyprd_engid);
		while($row=mysqli_fetch_assoc($result))
		{
			array_push($engarray,$row['engid']);
			array_push($namearray,$row['ename']);
			array_push($deptarray,$row['dep']);	
		}
		echo '<a href="#" id="btnExport" >Export data into Excel</a><br><br>';
		echo '<b>Graph</b><br>';
		echo '<div class="scrollit"><img src="graph_cat_engid_avg.php"/></div><br><br>';
		echo '<b>Table</b><br>';
		echo '<div class="right" id="logout">
<br>
<label><b>List of Questions in Feedback Survey Form:</b> </label><br><br>
<label>Q2. The work was delivered on time, as promised to my customer</label><br><br>
<label>Q3. The quality of work met my expectations</label><br><br>
<label>Q4. The GSDC engineer(s) had the requisite technical knowledge for this project</label><br><br>
<label>Q5. The GSDC engineer(s) was able to handle the customers technical queries</label><br><br>
<label>Q6. The GSDC engineer(s) was able to escalate existing/potential issues to the Project Manager</label><br><br>
<label>Q7. I found it easy to engage the GSDC for this project</label><br><br>
<label>Q8. I m satisfied with the GSDCs speed in responding to my request</label><br><br>
<label><b>List of Options for Each Question:</b> </label><br>
<label> 1. Strongly Agree (Rating 5) <br> 2. Agree (Rating 4) <br> 3. Niether Agree Nor Disagree (Rating 3) <br> 4. Disagree (Rating 2) <br> 5. Strongly Disagree (Rating 1) <br> 6. Not Applicable (Rating 0)<br></label>

</div>'		;
		?>
		<iframe id="myFrame" style="display:none"></iframe>
		<table style="width:50%" id="table">
		
		<th>Engagement ID</th>
		<th>Employee Name</th>
		<th>Team Name</th>
		<th>Q2</th>
		<th>Q3</th>
		<th>Q4</th>
		<th>Q5</th>
		<th>Q6</th>
		<th>Q7</th>
		<th>Q8</th>
		<th>Avg Rating</th>
		<th>Feedback</th>
<?php	for($i=0;$i<count($engarray);$i++)
		{
			unset($ratingarray);
			$ratingarray=array();
			$temparray=array();
			$totalarr=array($engarray[$i]);
			$surveydb_avg="select enginfo.engid as engid,feedt.commt as comment,qid,rating from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '2015-12-01' AND '".$_POST['todate']."' AND enginfo.engid='".$engarray[$i]."' ";
			$avg="select engid,AVG(rating) as Avg from enginfo where engid='".$engarray[$i]."' ";
			$qres=mysqli_query($connection,$surveydb_avg);
			$avgres=mysqli_query($connection,$avg);
			while($qrow=mysqli_fetch_assoc($qres))
			{
				array_push($qarray,$qrow['qid']);
				array_push($ratingarray,$qrow['rating']);
				array_push($temparray,$qrow['comment']);
			}

			while($avgrow=mysqli_fetch_assoc($avgres))
			{
				array_push($avgarr,$avgrow['Avg']);
				
			}

?>	

			<tr>
				<td align="center"><?php echo $engarray[$i];?></td>
				<td align="center"><?php echo $namearray[$i];?></td>
				<td align="center"><?php echo $deptarray[$i];?></td>
				<?php 
				for($j=0;$j<count($ratingarray);$j++)
				{ 
					array_push($totalarr,$ratingarray[$j]);
					?>
				<td align="center"><?php echo $ratingarray[$j];?></td>

		<?php   
			
				}?>
				<td align="center"><?php echo $avgarr[$i];?></font></td>
				<td align="center"><?php echo $temparray[$i];?></td>
			</tr>

<?php	
		$dataset6[]=$totalarr;
		}?>
</table>

<?php 
$_SESSION['dataset6']=$dataset6;
		

echo '<a href="#top">Go to Top</a>';
	}	

 
	else if($selected=="stenddate" && !empty($dynamicdep1) && $subselected1=="dept1")
	{
		#$conntosurveyprd = new mysqli("10.216.12.134", "gsdc_survey", "netapp123!", "TracGSDC");
		$conntosurveyprd = new mysqli("localhost", "root", "", "survey_prd");
	// Check connection
		if ($conntosurveyprd->connect_error) {
    	die("Connection failed: " . $conntosurveyprd->connect_error);
		} else {echo "";}


		$engarray=array();
		$qarray=array();
		$namearray=array();
		$deptarray=array();
		$surveyprd_engid="select engid,ename,dep from category where dep='".$dynamicdep1."' ";
		$result=mysqli_query($conntosurveyprd,$surveyprd_engid);
		while($row=mysqli_fetch_assoc($result))
		{
			array_push($engarray,$row['engid']);	
			array_push($namearray,$row['ename']);	
			array_push($deptarray,$row['dep']);	
		}
		echo '<a href="#" id="btnExport" >Export data into Excel</a><br><br>';
		echo '<b>Graph</b><br>';
		echo '<div class="scrollit"><img src="graph_cat_engid_avg.php"/></div><br><br>';
		echo '<b>Table</b><br>';
		echo '<div class="right" id="logout">
<br>
<label><b>List of Questions in Feedback Survey Form:</b> </label><br><br>
<label>Q2. The work was delivered on time, as promised to my customer</label><br><br>
<label>Q3. The quality of work met my expectations</label><br><br>
<label>Q4. The GSDC engineer(s) had the requisite technical knowledge for this project</label><br><br>
<label>Q5. The GSDC engineer(s) was able to handle the customers technical queries</label><br><br>
<label>Q6. The GSDC engineer(s) was able to escalate existing/potential issues to the Project Manager</label><br><br>
<label>Q7. I found it easy to engage the GSDC for this project</label><br><br>
<label>Q8. I m satisfied with the GSDCs speed in responding to my request</label><br><br>
<label><b>List of Options for Each Question:</b> </label><br>
<label> 1. Strongly Agree (Rating 5) <br> 2. Agree (Rating 4) <br> 3. Niether Agree Nor Disagree (Rating 3)<br> 4. Disagree (Rating 2) <br> 5. Strongly Disagree (Rating 1) <br> 6. Not Applicable (Rating 0)<br></label>
</div>'		;

		?>

		<iframe id="myFrame" style="display:none"></iframe>
		<table style="width:50%" id="table">
		
		<th>Engagement ID</th>
		<th>Employee Name</th>
		<th>Team Name</th>
		<th>Q2</th>
		<th>Q3</th>
		<th>Q4</th>
		<th>Q5</th>
		<th>Q6</th>
		<th>Q7</th>
		<th>Q8</th>
		<th>Avg Rating</th>
		<th>Feedback</th>
<?php	
$totalengidarray=array();
$ratingarray=array();
$temparray=array();
$avgarr=array();
		for($i=0;$i<count($engarray);$i++)
		{
			//unset($ratingarray);		
			
			$surveydb_avg="select enginfo.engid as engid,qid,rating from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '".$_POST['fromdate1']."' AND '".$_POST['todate1']."' AND enginfo.engid='".$engarray[$i]."' ";
			$tempquery="select enginfo.engid as id,feedt.commt as comment,AVG(rating) as Avg from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '".$_POST['fromdate1']."' AND '".$_POST['todate1']."' AND enginfo.engid='".$engarray[$i]."' group by enginfo.engid";
			$qres=mysqli_query($connection,$surveydb_avg);
			
			while($qrow=mysqli_fetch_assoc($qres))
			{
				array_push($qarray,$qrow['qid']);
				array_push($ratingarray,$qrow['rating']);
					

			}
			$engres=mysqli_query($connection,$tempquery);

			while($engrow=mysqli_fetch_assoc($engres))
			{
				array_push($totalengidarray,$engrow['id']);	
				array_push($temparray,$engrow['comment']);	
				array_push($avgarr, $engrow['Avg']);
			}
			
			
		}	
	$l=0;
		?>

		<?php for($k=0;$k<count($totalengidarray);$k++)
				{ $totalarr=array($totalengidarray[$k]);
					?>
			<tr>
				<td align="center"><?php echo $totalengidarray[$k];?></td>
				<td align="center"><?php echo $namearray[$k];?></td>
				<td align="center"><?php echo $deptarray[$k];?></td>
				<?php 
				for($j=$l;$j<$l+7;$j++)
				{ 	
					if($j<count($ratingarray))
					{
					array_push($totalarr,$ratingarray[$j]);
					}

					?>
				<td align="center"><?php echo $ratingarray[$j];?></td>
		<?php	}?>
				<td align="center"><?php echo $avgarr[$k];?></font></td>
				<td align="center"><?php echo $temparray[$k];?></td>
	
			</tr>
<?php 	?>
<?php	$l=$l+7;
		$dataset6[]=$totalarr;
			
		}?>
		</table>
		<a href="#top">Go to Top</a>
		
<?php 
$_SESSION['dataset6']=$dataset6;

}	

else if($selected=="alldate" && !empty($dynamicemp) && $subselected=='employee')
	{
		#$conntosurveyprd = new mysqli("10.216.12.134", "gsdc_survey", "netapp123!", "TracGSDC");
		$conntosurveyprd = new mysqli("localhost", "root", "", "survey_prd");
	// Check connection
		if ($conntosurveyprd->connect_error) {
    	die("Connection failed: " . $conntosurveyprd->connect_error);
		} else {echo "";}

		$engarray=array();
		$namearray=array();
		$deptarray=array();
		$qarray=array();
		$avgarr=array();
		$surveyprd_engid="select engid,ename,dep from category where ename='".$dynamicemp."' ";
		$result=mysqli_query($conntosurveyprd,$surveyprd_engid);
		while($row=mysqli_fetch_assoc($result))
		{
			array_push($engarray,$row['engid']);
			array_push($namearray,$row['ename']);
			array_push($deptarray,$row['dep']);	
		}
		echo '<a href="#" id="btnExport" >Export data into Excel</a><br><br>';
		echo '<b>Graph</b><br>';
		echo '<div class="scrollit"><img src="graph_emp_engid_avg.php"/></div><br><br>';
		echo '<b>Table</b><br>';
		echo '<div class="right" id="logout">
<br>
<label><b>List of Questions in Feedback Survey Form:</b> </label><br><br>
<label>Q2. The work was delivered on time, as promised to my customer</label><br><br>
<label>Q3. The quality of work met my expectations</label><br><br>
<label>Q4. The GSDC engineer(s) had the requisite technical knowledge for this project</label><br><br>
<label>Q5. The GSDC engineer(s) was able to handle the customers technical queries</label><br><br>
<label>Q6. The GSDC engineer(s) was able to escalate existing/potential issues to the Project Manager</label><br><br>
<label>Q7. I found it easy to engage the GSDC for this project</label><br><br>
<label>Q8. I m satisfied with the GSDCs speed in responding to my request</label><br><br>
<label><b>List of Options for Each Question:</b> </label><br>
<label> 1. Strongly Agree (Rating 5) <br> 2. Agree (Rating 4) <br> 3. Niether Agree Nor Disagree (Rating 3)<br> 4. Disagree (Rating 2) <br> 5. Strongly Disagree (Rating 1) <br> 6. Not Applicable (Rating 0)<br></label>
</div>'		;


		?>
		<iframe id="myFrame" style="display:none"></iframe>
		<table style="width:50%" id="table">
		
		<th>Engagement ID</th>
		<th>Employee Name</th>
		<th>Team Name</th>
		<th>Q2</th>
		<th>Q3</th>
		<th>Q4</th>
		<th>Q5</th>
		<th>Q6</th>
		<th>Q7</th>
		<th>Q8</th>
		<th>Avg Rating</th>
		<th>Feedback</th>
<?php	for($i=0;$i<count($engarray);$i++)
		{
			unset($ratingarray);
			$ratingarray=array();
			$temparray=array();
			$totalarr=array($engarray[$i]);
			$surveydb_avg="select enginfo.engid as engid,feedt.commt as comment,qid,rating from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '2015-12-01' AND '".$_POST['todate']."' AND enginfo.engid='".$engarray[$i]."' ";
			$avg="select engid,AVG(rating) as Avg from enginfo where engid='".$engarray[$i]."' ";
			$qres=mysqli_query($connection,$surveydb_avg);
			$avgres=mysqli_query($connection,$avg);
			while($qrow=mysqli_fetch_assoc($qres))
			{
				array_push($qarray,$qrow['qid']);
				array_push($ratingarray,$qrow['rating']);
				array_push($temparray,$qrow['comment']);
			}

			while($avgrow=mysqli_fetch_assoc($avgres))
			{
				array_push($avgarr,$avgrow['Avg']);
				
			}


?>	

			<tr>
				<td align="center"><?php echo $engarray[$i];?></td>
				<td align="center"><?php echo $namearray[$i];?></td>
				<td align="center"><?php echo $deptarray[$i];?></td>
				<?php 
				for($j=0;$j<count($ratingarray);$j++)
				{ 
					array_push($totalarr,$ratingarray[$j]);
					?>
				<td align="center"><?php echo $ratingarray[$j];?></td>

		<?php   
			
				}?>
				<td align="center"><?php echo $avgarr[$i];?></font></td>
				<td align="center"><?php echo $temparray[$i];?></td>
			</tr>

<?php	
		$dataset7[]=$totalarr;
		}?>
	</table><a href="#top">Go to Top</a>
<?php 
$_SESSION['dataset7']=$dataset7;

	}

else if($selected=="stenddate" && !empty($dynamicemp1) && $subselected1=="employee1")	
	{
		#$conntosurveyprd = new mysqli("10.216.12.134", "gsdc_survey", "netapp123!", "TracGSDC");
		$conntosurveyprd = new mysqli("localhost", "root", "", "survey_prd");
		if ($conntosurveyprd->connect_error) {
    	die("Connection failed: " . $conntosurveyprd->connect_error);
		} else {echo "";}

		$namearray=array();
		$deptarray=array();
		$engarray=array();
		$qarray=array();
		
		$surveyprd_engid="select engid,ename,dep from category where ename='".$dynamicemp1."' ";
		$result=mysqli_query($conntosurveyprd,$surveyprd_engid);
		while($row=mysqli_fetch_assoc($result))
		{
			array_push($engarray,$row['engid']);
			array_push($namearray,$row['ename']);
			array_push($deptarray,$row['dep']);	
		}

		echo '<a href="#" id="btnExport" >Export data into Excel</a><br><br>';
		echo '<b>Graph</b><br>';
		echo '<div class="scrollit"><img src="graph_emp_engid_avg.php"/></div><br><br>';
		echo '<b>Table</b><br>';
		echo '<div class="right" id="logout">
<br>
<label><b>List of Questions in Feedback Survey Form:</b> </label><br><br>
<label>Q2. The work was delivered on time, as promised to my customer</label><br><br>
<label>Q3. The quality of work met my expectations</label><br><br>
<label>Q4. The GSDC engineer(s) had the requisite technical knowledge for this project</label><br><br>
<label>Q5. The GSDC engineer(s) was able to handle the customers technical queries</label><br><br>
<label>Q6. The GSDC engineer(s) was able to escalate existing/potential issues to the Project Manager</label><br><br>
<label>Q7. I found it easy to engage the GSDC for this project</label><br><br>
<label>Q8. I m satisfied with the GSDCs speed in responding to my request</label><br><br>
<label><b>List of Options for Each Question:</b> </label><br>
<label> 1. Strongly Agree (Rating 5) <br> 2. Agree (Rating 4) <br> 3. Niether Agree Nor Disagree (Rating 3)<br> 4. Disagree (Rating 2) <br> 5. Strongly Disagree (Rating 1) <br> 6. Not Applicable (Rating 0)<br></label>
</div>'		;

		?>

		<iframe id="myFrame" style="display:none"></iframe>
		<table style="width:50%" id="table">
		
		<th>Engagement ID</th>
		<th>Employee Name</th>
		<th>Team Name</th>
		<th>Q2</th>
		<th>Q3</th>
		<th>Q4</th>
		<th>Q5</th>
		<th>Q6</th>
		<th>Q7</th>
		<th>Q8</th>
		<th>Avg</th>
		<th>Comment</th>
<?php	
$totalengidarray=array();
$ratingarray=array();
$comm_emp_array=array();
$avgarr=array();
		for($i=0;$i<count($engarray);$i++)
		{
			$surveydb_avg="select enginfo.engid as engid,qid,rating from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '".$_POST['fromdate1']."' AND '".$_POST['todate1']."' AND enginfo.engid='".$engarray[$i]."' ";
			$tempquery="select enginfo.engid as id,feedt.commt as comment,AVG(rating) as Avg from enginfo JOIN feedt ON enginfo.engid=feedt.engid where feedt.date BETWEEN '".$_POST['fromdate1']."' AND '".$_POST['todate1']."' AND enginfo.engid='".$engarray[$i]."' group by enginfo.engid";
			$qres=mysqli_query($connection,$surveydb_avg);
			
			while($qrow=mysqli_fetch_assoc($qres))
			{
				array_push($qarray,$qrow['qid']);
				array_push($ratingarray,$qrow['rating']);
			}
			$engres=mysqli_query($connection,$tempquery);
			while($engrow=mysqli_fetch_assoc($engres))
			{
				array_push($totalengidarray,$engrow['id']);	
				array_push($comm_emp_array,$engrow['comment']);
				array_push($avgarr,$engrow['Avg']);
			}
			
			
		}	
	$l=0;
		?>

		<?php for($k=0;$k<count($totalengidarray);$k++)
				{ $totalarr=array($totalengidarray[$k]);
					?>
			<tr>
				<td align="center"><?php echo $totalengidarray[$k];?></td>
				<td align="center"><?php echo $namearray[$k];?></td>
				<td align="center"><?php echo $deptarray[$k];?></td>
				<?php 
				for($j=$l;$j<$l+7;$j++)
				{ 	
					if($j<count($ratingarray))
					{
					array_push($totalarr,$ratingarray[$j]);
					}

					?>
				<td align="center"><?php echo $ratingarray[$j];?></td>
		<?php	}?>
				<td align="center"><?php echo $avgarr[$k];?></font></td>
				<td align="center"><?php echo $comm_emp_array[$k];?></td>
	
			</tr>
<?php 	?>
<?php	$l=$l+7;;
		$dataset7[]=$totalarr;
			
		}?>
</table><a href="#top">Go to Top</a>
<?php 
$_SESSION['dataset7']=$dataset7;
	}	

	else if	($subselected=="feedback")
	{
		$totalarr=array();
		$feedbackquery="select engid,commt from feedt where date BETWEEN '2015-12-01' AND '".$_POST['todate']."' ";
		$result=mysqli_query($connection,$feedbackquery);?>
		<a href="#" id="btnExport" >Export data into Excel</a><br><br><b>Table</b><br>
		<iframe id="myFrame" style="display:none"></iframe>
		<table style="width:50%" id="table">
		
		<th>Engagement ID</th>
		<th>Comment</th>
<?php	while($row=mysqli_fetch_assoc($result))
		{	$totalarr=array_push()
			?>
			<tr>
			<td align="center"><?php echo $row['engid'];?></td>
			<td align="center"><?php echo $row['commt'];?></td>
			</tr>
<?php	}?>
		</table>
<?php	}

	else if	($subselected1=="feedback1")
	{
		$totalarr=array();
		$feedbackquery="select engid,commt from feedt where date BETWEEN '".$_POST['fromdate1']."' AND '".$_POST['todate1']."' ";
		$result=mysqli_query($connection,$feedbackquery);?>
		<a href="#" id="btnExport" >Export data into Excel</a><br><br><b>Table</b><br>
		<iframe id="myFrame" style="display:none"></iframe>
		<table style="width:50%" id="table">
		<th>Engagement ID</th>
		<th>Comment</th>
<?php	while($row=mysqli_fetch_assoc($result))
		{	$totalarr=array_push()
			?>
			<tr>
			<td align="center"><?php echo $row['engid'];?></td>
			<td align="center"><?php echo $row['commt'];?></td>
			</tr>
<?php	}?>
		</table>
		<a href="#top">Go to Top</a>
<?php	}
}


?>
 
 </form>
</div>
<?php 

?>
<script>

		$("#btnExport ").on('click', function (event) {
			//Get table
			var table = $("#table")[0];

			//Get number of rows/columns
			var rowLength = table.rows.length;
			var colLength = table.rows[0].cells.length;

			//Declare string to fill with table data
			var tableString = "";

			//Get column headers
			for (var i = 0; i < colLength; i++) {
				tableString += table.rows[0].cells[i].innerHTML.split(",").join("") + "," ;
			}
			//tableString+="Questions"+","+"Answers";
			tableString = tableString.substring(0, tableString.length - 1);
			tableString += "\r\n";

			//Get row data
			for (var j = 1; j < rowLength; j++) {
				for (var k = 0; k < colLength; k++) {
					tableString += table.rows[j].cells[k].innerHTML.split(",").join("") + ",";
				}
				tableString += "\r\n";
			}

			//Save file
			if (navigator.appName == "Microsoft Internet Explorer") {
                     //Optional: If you run into delimiter issues (where the commas are not interpreted and all data is one cell), then use this line to manually specify the delimeter
                     tableString = 'sep=,\r\n' + tableString;

                     myFrame.document.open("text/html", "replace");
                     myFrame.document.write(tableString);
                     myFrame.document.close();
                     myFrame.focus();
                     myFrame.document.execCommand('SaveAs', true, 'FeedbackTool_GSDC.csv');
                 } else {
                 	csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(tableString);
                     $(event.target).attr({
                         'href': csvData,
                         'target': '_blank',
                         'download': 'FeedbackTool_GSDC.csv'
                     });
                 }
		});

	</script>
</body>
</html>;