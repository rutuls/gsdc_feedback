<!DOCTYPE html>
<html>
<head><title> NetApp GSDC survey </title>
<style>
.error {color: #FF0000;}
#nav1 {
    line-height:30px;
    background-color:#eeeeee;
    height:2000px;
    width:300px;
    float:left;
    padding:5px;	      
}
#nav2 {
    line-height:30px;
    background-color:#eeeeee;
    height:2000px;
    width:300px;
    float:right;
    padding:5px;	      
}

#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
</style>
</head>
<body>
<?php
include 'eg2.php';
include 'eg3.php';
?>

<p><span class="error"></span></p>

<div id="nav1">
<br>
<br>
<br>
</div>
<div id="nav2">
<br>
<br>
<br>
</div>
<div align="center">
<img src="netapp.png" align="middle" style="width:170px;height:82px;">
<div style="width:1500px;height:60px; background-color:#000066; color:white;"><font  size=15 >GSDC Engagement Feedback</font></div>
<div style="width:1500px;height:30px; background-color:#99C9FF; "></div>
</div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?engid=".$_GET['engid']);?>"> 

   <br><br><br> <font size="4" color="black"><b> Engagement ID </b></font>
	
	<input type="text" name="id" value=<?php echo $_GET['engid']?> >
		<h2> <center> <font color="blue">  Quality of delivery </font></center></h2>
      <span class="error"> <?php echo $a2Err;?></span><br>
  <font size="4" color="black"><b>  1. The work was delivered on time, as promised to my customer:</b></font><br>
   <input type="radio" name="a2" <?php if (isset($a2) && $a2=="strongly agree") echo "checked";?>  value="strongly agree">Strongly Agree<br>
   <input type="radio" name="a2" <?php if (isset($a2) && $a2=="agree") echo "checked";?>  value="agree">Agree<br>
   <input type="radio" name="a2" <?php if (isset($a2) && $a2=="neither agree or disagree") echo "checked";?>  value="neither agree or disagree">Neither Agree nor Disagree<br>
   <input type="radio" name="a2" <?php if (isset($a2) && $a2=="disagree") echo "checked";?>  value="disagree">Disagree<br>
   <input type="radio" name="a2" <?php if (isset($a2) && $a2=="strongly disagree") echo "checked";?>  value="strongly disagree">Strongly Disagree<br><br>

    <span class="error"><?php echo $a3Err;?></span><br>
   <font size="4" color="black"><b>2. The quality of work met my expectations:</b></font><br>
   <input type="radio" name="a3" <?php if (isset($a3) && $a3=="strongly agree") echo "checked";?>  value="strongly agree">Strongly Agree<br>
   <input type="radio" name="a3" <?php if (isset($a3) && $a3=="agree") echo "checked";?>  value="agree">Agree<br>
   <input type="radio" name="a3" <?php if (isset($a3) && $a3=="neither agree or disagree") echo "checked";?>  value="neither agree or disagree">Neither Agree nor Disagree<br>
   <input type="radio" name="a3" <?php if (isset($a3) && $a3=="disagree") echo "checked";?>  value="disagree">Disagree<br>
   <input type="radio" name="a3" <?php if (isset($a3) && $a3=="strongly disagree") echo "checked";?>  value="strongly disagree">Strongly Disagree<br>
  
   
   <h2> <center><font color="blue"> Quality of Personnel</font></center></h2>
   <span class="error"> <?php echo $a4Err;?></span><br>
  <font size="4" color="black"><b> 3. The GSDC engineer(s) had the requisite technical knowledge for this project:</b></font><br>
   <input type="radio" name="a4" <?php if (isset($a4) && $a4=="strongly agree") echo "checked";?>  value="strongly agree">Strongly Agree<br>
   <input type="radio" name="a4" <?php if (isset($a4) && $a4=="agree") echo "checked";?>  value="agree">Agree<br>
   <input type="radio" name="a4" <?php if (isset($a4) && $a4=="neither agree or disagree") echo "checked";?>  value="neither agree or disagree">Neither Agree nor Disagree<br>
   <input type="radio" name="a4" <?php if (isset($a4) && $a4=="disagree") echo "checked";?>  value="disagree">Disagree<br>
   <input type="radio" name="a4" <?php if (isset($a4) && $a4=="strongly disagree") echo "checked";?>  value="strongly disagree">Strongly Disagree<br><br>
   
   <span class="error"><?php echo $a5Err;?></span><br>
  <font size="4" color="black"><b> 4. The GSDC engineer(s) was able to handle the customer's technical queries:</b></font><br>
   <input type="radio" name="a5" <?php if (isset($a5) && $a5=="strongly agree") echo "checked";?>  value="strongly agree">Strongly Agree<br>
   <input type="radio" name="a5" <?php if (isset($a5) && $a5=="agree") echo "checked";?>  value="agree">Agree<br>
   <input type="radio" name="a5" <?php if (isset($a5) && $a5=="neither agree or disagree") echo "checked";?>  value="neither agree or disagree">Neither Agree nor Disagree<br>
   <input type="radio" name="a5" <?php if (isset($a5) && $a5=="disagree") echo "checked";?>  value="disagree">Disagree<br>
   <input type="radio" name="a5" <?php if (isset($a5) && $a5=="strongly disagree") echo "checked";?>  value="strongly disagree">Strongly Disagree<br>
   <input type="radio" name="a5" <?php if (isset($a5) && $a5=="na") echo "checked";?>  value="na">N/A<br><br>
   
	 <span class="error"><?php echo $a6Err;?></span><br>
	 <font size="4" color="black"><b> 5. The GSDC engineer(s) was able to escalate existing/potential issues to the Project Manager:</b></font><br>
   <input type="radio" name="a6" <?php if (isset($a6) && $a6=="strongly agree") echo "checked";?>  value="strongly agree">Strongly Agree<br>
   <input type="radio" name="a6" <?php if (isset($a6) && $a6=="agree") echo "checked";?>  value="agree">Agree<br>
   <input type="radio" name="a6" <?php if (isset($a6) && $a6=="neither agree or disagree") echo "checked";?>  value="neither agree or disagree">Neither Agree nor Disagree<br>
   <input type="radio" name="a6" <?php if (isset($a6) && $a6=="disagree") echo "checked";?>  value="disagree">Disagree<br>
   <input type="radio" name="a6" <?php if (isset($a6) && $a6=="strongly disagree") echo "checked";?>  value="strongly disagree">Strongly disagree<br>
   <input type="radio" name="a6" <?php if (isset($a6) && $a6=="na") echo "checked";?>  value="na">N/A<br><br>
   
   <h2>  <center> <font color="blue"> Overall satisfaction</font></center></h2>
   <span class="error"> <?php echo $a7Err;?></span><br>
  <font size="4" color="black"><b> 6. I found it easy to engage the GSDC for this project:</b></font><br>
   <input type="radio" name="a7" <?php if (isset($a7) && $a7=="strongly agree") echo "checked";?>  value="strongly agree">Strongly Agree<br>
   <input type="radio" name="a7" <?php if (isset($a7) && $a7=="agree") echo "checked";?>  value="agree">Agree<br>
   <input type="radio" name="a7" <?php if (isset($a7) && $a7=="neither agree or disagree") echo "checked";?>  value="neither agree or disagree">Neither Agree nor Disagree<br>
   <input type="radio" name="a7" <?php if (isset($a7) && $a7=="disagree") echo "checked";?>  value="disagree">Disagree<br>
   <input type="radio" name="a7" <?php if (isset($a7) && $a7=="strongly disagree") echo "checked";?>  value="strongly disagree">Strongly Disagree<br><br>
   
   <span class="error"> <?php echo $a8Err;?> </span><br>
<font size="4" color="black"><b>7. I'm satisfied with the GSDC's speed in responding to my request:</b></font><br>
   <input type="radio" name="a8" <?php if (isset($a8) && $a8=="strongly agree") echo "checked";?>  value="strongly agree">Strongly Agree<br>
   <input type="radio" name="a8" <?php if (isset($a8) && $a8=="agree") echo "checked";?>  value="agree">Agree<br>
   <input type="radio" name="a8" <?php if (isset($a8) && $a8=="neither agree or disagree") echo "checked";?>  value="neither agree or disagree">Neither Agree nor Disagree<br>
   <input type="radio" name="a8" <?php if (isset($a8) && $a8=="disagree") echo "checked";?>  value="disagree">Disagree<br>
   <input type="radio" name="a8" <?php if (isset($a8) && $a8=="strongly disagree") echo "checked";?>  value="strongly disagree">Strongly Disagree<br><br>
   
   
	<font size="4" color="black"><b>8. Any other feedback or suggestions for improvement:</b></font><br>
	 <textarea name="a9" rows="3" cols="100" <?php echo $a9;?>  id="a9" placeholder = "Less than 300 characters" onfocus="this.placeholder=''" onblur="this.placeholder='Less than 300 characters'"></textarea><br><br>
   <br><br>
   <div style="text-align:center"><input type="submit" name="submit" value="Submit"style="font-size:10pt;color:white;
background-color:blue;padding:3px;"></div>
</form>

<div id="footer">

</div>

</body>
</html>
