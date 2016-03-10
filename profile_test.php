<?php

include('session.php');
#include ('C:\xampp\htdocs\phplot-6.2.0\phplot.php');

require 'C:\xampp\htdocs\phplot-6.2.0\phplot.php';
require_once 'C:\xampp\htdocs\phplot-6.2.0\data_table.php';

function pickcolor($img, $data_array, $row, $col)
{
  $d = $data_array[$row][$col+1]; // col+1 skips over the row's label
  if ($d >= 5) return 0;
  if ($d >= 3) return 1;
  return 2;
}

?>
<!DOCTYPE html>
<html>
<head>

<style type="text/css">
.background {
box-sizing: border-box;
width: 100%;
height:200%;
padding: 3px;
background-image: url("bg.jpg");

background-size: 100% 100%;
}
</style>


<style>
table, th, td {
    border: 3px solid black;

    border-collapse: collapse;
}
</style>




<script type="text/javascript">
function ChangeOption(val)
{
	var element1=document.getElementById('subselector');
	var element2=document.getElementById('daterangediv');
	var element3=document.getElementById('specific');
	var element4=document.getElementById('datesuboptiondiv');
	//var element4=document.getElementById('resultdiv');
	//var element3=document.getElementById('todate');

	if(val=='all')
	{
		element1.style.display='block';
		//element4.style.display='block';
		//element2.style.display='block';
		//element3.style.display='block';
	}
	else
	{
		element1.style.display='none';

		
	}
	if(val=='daterange')
	{
		element4.style.display='block';
		//element4.style.display='block';
		//element4.style.display='none';
	}
	else
		element4.style.display='none';
	if(val=='answers')
	{
		element3.style.display='block';
		//element4.style.display='block';
		//element4.style.display='none';
	}
	else
		element3.style.display='none';

	if(val=='dateforall' || val=='dateforeach')
	{
		element2.style.display='block';
		element4.style.display='block';
	}
	else
		element2.style.display='none';

	
	
}
</script>

<title>Portal</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body background="bg.jpg" class="background">

<div align="center">
<img src="horizontal-logo.png" align="middle"> <br><br>
</div>

<b id="logout"><a href="logout.php">Log Out</a></b>
<b id="portal"><a href="profile.php">Go to Profile</a></b>
<?php

$error="";
$total=$allavg=0;
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<h2>FEEDBACK PORTAL</h2>

<div id="main">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label> Select Any Option:</label>
<select name="selector" onchange='ChangeOption(this.value);'>
  <option value="first">Select an Option</option>
  <option value="answers">Answers and Avg</option>
  <option value="all">For All</option>
  <option value="daterange">DateRange</option>  
</select>
<br>
<br>
<select name="subselector" id="subselector" style='display:none;'>
	<option value="allavg">Average for all</option>
	<option value="eachresp">Avg for Each Response</option>
</select>

<div style='display:none;' id="datesuboptiondiv">
<br>
<label>Choose Option</label>
<select name="dateoptions" onchange='ChangeOption(this.value);'>
<option value="blank">Select an Option </option>
<option value="dateforall"> For All </option>
<option value="dateforeach"> For Each </option>
</select>


<div style='display:none;' id="daterangediv">
<br>
<label> From Date : </label>
<input type="date" name="fromdate" id="fromdate" min="2000-01-02" />
<label> To Date : </label>
<input type="date" name="todate" id="todate" min="2000-01-02"/>

</div>
</div>

<div style='display:none;' id="specific">

	   
	   <input type="text" name="engid_re" placeholder="Enter engagement id to see answer"><br>
       <br>
</div>   

 <br>
	   <input type="submit" value="Show" name="retrieve">



<?php
	
if(isset($_POST['selector']))
{
	$selected=$_POST['selector'];
}
if(isset($_POST['subselector']))
{
	$subselected=$_POST['subselector'];
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


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if($selected== "answers")
	{
	if ( ! empty($_POST['engid_re']))
	{
	
		$retrieve_text=test_input($_POST['engid_re']);
		$showquery="select qid,ansdesc,rating from enginfo where engid='".$retrieve_text."'";
		$result=mysqli_query($connection,$showquery);
		$avg_query="select AVG(rating) as avg from enginfo where engid='".$retrieve_text."' AND rating>0" ;
		$avg_rating=mysqli_query($connection,$avg_query);
		$avg_result=mysqli_fetch_assoc($avg_rating);
		$avg_value=$avg_result['avg'];
		?>

		<br><label>Answers:</label>
			<table style="width:50%">
			<th>Question</th>
			<th>Answer</th>	
		<?php
		$dataset=array();
		while($row=mysqli_fetch_assoc($result))
		{
			$answer=$row['ansdesc'];
			$qid=$row['qid'];
			$rating=$row['rating'];
			$dataset[]=array($qid,$rating);
			
			$quest="select qued from question where qid='".$qid."'";
			$res=mysqli_query($connection,$quest);
			$list=mysqli_fetch_assoc($res);
			$qued=$list['qued'];

			?>

			<tr>
			<td><?php echo $qued;?></td>
			<td><?php echo $answer;?></td>
			</tr>	

			
			
<?php	}?>
	</table>
	<br><br><span style="color:blue" font-style="raleway"><?php echo "Average for all questions is ".$avg_value;?></span>
<?php

$plot = new PHPlot(800, 600);
$plot->SetImageBorderType('plain'); // Improves presentation in the manual
$plot->SetPlotType('bars');
$plot->SetDataValues($data);
$plot->SetDataType('text-data');
$plot->SetTitle('Monthly Performance Rating');
$plot->SetXTickPos('none');
$plot->SetPlotAreaWorld(NULL, 0, NULL, 10);
$plot->SetCallback('data_color', 'pickcolor', $data);
$plot->SetDataColors(array('green', 'yellow', 'red'));
$plot->SetLegend(array('Exceeded expectations', 'Met expectations','Failed to meet expectations'));

$plot->DrawGraph();
echo '<img src="graphtest.php"/>';

?>

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

	else if($selected=="all" && $subselected=="allavg")
	{	
		$avg_query="select AVG(rating) as avg from enginfo";
		$avg_rating=mysqli_query($connection,$avg_query);
		$avg_result=mysqli_fetch_assoc($avg_rating);
		$avg_value=$avg_result['avg'];

	?>
	<br><span style="color:blue"><?php echo "Average for all the questions is '".$avg_value."'";?></span>
	<?php

	}

	else if($selected=="all" && $subselected=="eachresp")
	{
	#	for($i=2;$i<=8;$i++)
	#	{
			$avg_query="select qid,AVG(rating) as avg from enginfo WHERE rating>0 group by qid";
			$avg_rating=mysqli_query($connection,$avg_query);?>
			<table style="width:50%">
			<th>Que No</th>
			<th>Avg Rating</th>	
	<?php	while($avg_result=mysqli_fetch_assoc($avg_rating))
			{
				$qid=$avg_result['qid'];
				$avg_value=$avg_result['avg'];?>
			<tr>
			<td><?php echo $qid;?></td>
			<td><?php echo $avg_value;?></td>
			</tr>	
			
		<?php
			}?>
			</table>
<?php	}

	else if($selected=="daterange" && !empty($fromdate) && !empty($todate) && !empty($dateoptions) && $dateoptions=="dateforall" )
	{
	
		$avg_query="select feedt.engid,AVG(enginfo.rating) as avg FROM feedt JOIN enginfo ON feedt.engid=enginfo.engid where date BETWEEN '".$_POST['fromdate']."' AND '".$_POST['todate']."' AND rating>0 group by engid";
		$avg_rating=mysqli_query($connection,$avg_query);?>
		
		<table style="width:50%">
		<th>Engagement ID</th>
		<th>Avg Rating</th>		
<?php	while($avg_result=mysqli_fetch_assoc($avg_rating))
		{
			$engid=$avg_result['engid'];
			$avg_value=$avg_result['avg'];	
			$dataSet->addPoint(new Point($engid, $avg_value));
		
		?>
		
		<tr>
			<td><?php echo $engid;?></td>
			<td><?php echo $avg_value;?></td>
		</tr>
<?php   }?>
	</table>
	<?php	
	$chart->setDataSet($dataSet);
	
	$chart->setTitle("From ".$_POST['fromdate']." To ".$_POST['todate']."");
	
	$chart->render("C:\\xampp\htdocs\project1\demo2.jpg");?>
	<br><br><label>Graph:</label><br>
	<br><img src="demo2.jpg">
<?php
	}

		else if($selected=="daterange" && !empty($fromdate) && !empty($todate) && !empty($dateoptions) && $dateoptions=="dateforeach")
		{?>
<?php
		$avg_query="select enginfo.qid,AVG(enginfo.rating) as avg FROM feedt JOIN enginfo ON feedt.engid=enginfo.engid where date BETWEEN '".$_POST['fromdate']."' AND '".$_POST['todate']."' AND rating>0 group by qid";
		$avg_rating=mysqli_query($connection,$avg_query);?>
		

		<table style="width:50%">
		<th>Que No</th>
		<th>Avg Rating</th>
<?php	while($avg_result=mysqli_fetch_assoc($avg_rating))
		{
			$qid=$avg_result['qid'];
			$avg_value=$avg_result['avg'];	
			$dataSet->addPoint(new Point($qid, $avg_value));
		
		?>
		
		
			<tr>
				<td><?php echo $qid;?></td>
				<td><?php echo $avg_value;?></td>
			</tr>
		

<?php   }?>
	</table>
<?php
	$chart->setDataSet($dataSet);
	
	$chart->setTitle("From ".$_POST['fromdate']." To ".$_POST['todate']."");
	
	$chart->render("C:\\xampp\htdocs\project1\demo3.jpg");?>
	<br><br><label>Graph:</label><br>
	<br><img src="demo3.jpg">
<?php
	}


}


?>
 


 </form>
</div>
 </body>
</html>


