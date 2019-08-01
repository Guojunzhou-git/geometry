<?php
include_once("autoload.php");
use geometry\Beijing;

$beijing = Beijing::getInstance();
var_dump($beijing->dongcheng[0]->isConvex);
var_dump($beijing->xicheng[0]->isConvex);
var_dump($beijing->chaoyang[0]->isConvex);
var_dump($beijing->chaoyang[1]->isConvex);
var_dump($beijing->haidian[0]->isConvex);
var_dump($beijing->fengtai[0]->isConvex);
var_dump($beijing->shijingshan[0]->isConvex);
var_dump($beijing->mentougou[0]->isConvex);
var_dump($beijing->fangshan[0]->isConvex);
var_dump($beijing->tongzhou[0]->isConvex);
var_dump($beijing->shunyi[0]->isConvex);
var_dump($beijing->changping[0]->isConvex);
var_dump($beijing->daxing[0]->isConvex);
var_dump($beijing->huairou[0]->isConvex);
var_dump($beijing->pinggu[0]->isConvex);
var_dump($beijing->miyun[0]->isConvex);
var_dump($beijing->yanqing[0]->isConvex);