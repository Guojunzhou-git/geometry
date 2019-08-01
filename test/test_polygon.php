<?php
include_once("autoload.php");
use geometry\Point;
use geometry\Polygon;
$endpoints = [
    new Point(0, 0),
    new Point(1, 0),
    new Point(1, 1),
    new Point(0, 1),
];
$polygon = Polygon::fromEndpoints($endpoints);
echo 'Polygon::__toString(): ';
print_r($polygon->__toString());
echo 'Polygon::isPointInPolygon(Point p, onEdge): '.PHP_EOL;
var_dump($polygon->isPointInPolygon(new Point(0.5, 0.5)));
var_dump($polygon->isPointInPolygon(new Point(0.5, 0)));
var_dump($polygon->isPointInPolygon(new Point(1, 0.999999999)));
var_dump($polygon->isPointInPolygon(new Point(1, 1), false));
echo 'Polygon::isConvex: '.PHP_EOL;
var_dump(Polygon::fromEndpoints([
    new Point(0, 0),
    new Point(1, 0),
    new Point(0, 1),
    new Point(1, 1),
])->isConvex);
var_dump(Polygon::fromEndpoints([
    new Point(0, 0),
    new Point(1, 0),
    new Point(1, 1),
    new Point(0, 1),
])->isConvex);

