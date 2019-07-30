<?php
include_once("autoload.php");
use geometry\Point;
use geometry\Line;
$point = new Point(3, 0);
$line = Line::fromTwoPoint(new Point(0,0), new Point(1, 0));
var_dump($point->isInLine($line));