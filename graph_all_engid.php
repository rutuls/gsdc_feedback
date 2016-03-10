<?php

include('session.php');
#include ('C:\xampp\htdocs\phplot-6.2.0\phplot.php');

require 'C:\xampp\htdocs\phplot-6.2.0\phplot.php';
require_once 'C:\xampp\htdocs\phplot-6.2.0\data_table.php';
header('Content-Type: image/png');
$data=$_SESSION['dataset3'];

$plot = new PHPlot(1200, 300);
$plot->SetImageBorderType('plain');

$plot->SetPlotType('stackedbars');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);

# Main plot title:
$plot->SetTitle('Answer for Each Question for Engagement IDs');
$plot->SetYDataLabelPos('plotin');

# Make a legend for the 3 data sets plotted:
$plot->SetLegend(array('Answer2', 'Answer3', 'Answer4','Answer5','Answer6','Answer7','Answer8'));
$plot->SetYTickIncrement(10);
# Turn off X tick labels and ticks because they don't apply here:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');

$plot->DrawGraph();
?>