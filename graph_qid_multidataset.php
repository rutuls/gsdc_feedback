<?php
include('session.php');
#include ('C:\xampp\htdocs\phplot-6.2.0\phplot.php');

require 'C:\xampp\htdocs\phplot-6.2.0\phplot.php';
require_once 'C:\xampp\htdocs\phplot-6.2.0\data_table.php';
header('Content-Type: image/png');
$data=$_SESSION['dataset5'];

$plot = new PHPlot(800, 300);
$plot->SetImageBorderType('plain');

$plot->SetPlotType('bars');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);

# Main plot title:
$plot->SetTitle('Question vs Number of Persons who choose the answer');
$plot->SetYDataLabelPos('plotin');

# Make a legend for the 3 data sets plotted:
$plot->SetLegend(array('No of persons selcted Opt1', 'No of persons selcted Opt2', 'No of persons selcted Opt3','No of persons selcted Opt4','No of persons selcted Opt5'));
$plot->SetYTickIncrement(20);
# Turn off X tick labels and ticks because they don't apply here:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');

$plot->DrawGraph();

?>