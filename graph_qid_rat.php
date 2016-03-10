<?php
include('session.php');
#include ('C:\xampp\htdocs\phplot-6.2.0\phplot.php');

require 'C:\xampp\htdocs\phplot-6.2.0\phplot.php';
require_once 'C:\xampp\htdocs\phplot-6.2.0\data_table.php';
header('Content-Type: image/png');
function pickcolor($img, $data_array, $row, $col)
{
  $d = $data_array[$row][$col+1]; // col+1 skips over the row's label
  if ($d >= 4) return 0;
  if ($d == 3) return 1;
  if($d<3 && $d>0) return 2;
  if($d==0) return 3;
}

$data=$_SESSION['arr'];

#$data=array($q,$r);

$plot = new PHPlot(800, 300);
$plot->SetImageBorderType('plain'); // Improves presentation in the manual
$plot->SetPlotType('bars');
$plot->SetDataValues($data);
$plot->SetDataType('text-data');
$plot->SetTitle('Question vs Rating');
$plot->SetXTickPos('none');
$plot->SetPlotAreaWorld(NULL, 0);

# Y Tick marks are off, but Y Tick Increment also controls the Y grid lines:
$plot->SetYTickIncrement(5);

# Turn on Y data labels:
$plot->SetYDataLabelPos('plotin');

# With Y data labels, we don't need Y ticks or their labels, so turn them off.
$plot->SetYTickLabelPos('none');
$plot->SetYTickPos('none');

# Format the Y Data Labels as numbers with 1 decimal place.
# Note that this automatically calls SetYLabelType('data').
$plot->SetPrecisionY(1);



$plot->SetCallback('data_color', 'pickcolor', $data);
$plot->SetDataColors(array('green', 'yellow', 'red','blue'));

$plot->SetLegend(array('Strongly Agree or Agree', 'Neither Agree nor Disagree','Disagree or Strongly Disagree','Not Applicable'));

$plot->DrawGraph();

?>