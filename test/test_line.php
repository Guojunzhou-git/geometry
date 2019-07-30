<?php
include_once("autoload.php");
use geometry\Line;
use geometry\Point;

$line1 = Line::fromTwoPoint(
    new Point(0, 0), new Point(1, 0)
);
$line2 = Line::fromTwoPoint(
    new Point(1, 0), new Point(1, 1)
);
$line3 = Line::fromTwoPoint(
    new Point(0, 1), new Point(1, 1)
);
var_dump($line1->intersectWithLine($line2));
var_dump($line1->intersectWithLine($line3));