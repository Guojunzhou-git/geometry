<?php
namespace geometry;

class Edge{
    public $line;
    public $xrange;
    public $yrange;

    public function __construct(Line $line, $xrange=[0,0], $yrange=[0,0]){
        $this->line = $line;
        if(!is_array($xrange) || count($xrange) < 2){
            $xrange = [0,0];
        }
        if(!is_array($yrange) || count($xrange) < 2){
            $yrange = [0,0];
        }
        $xrange = $xrange[0] > $xrange[1] ? [$xrange[1], $xrange[0]] : $xrange;
        $this->xrange = $xrange;
        $yrange = $yrange[0] > $yrange[1] ? [$yrange[1], $yrange[0]] : $yrange;
        $this->yrange = $yrange;
    }

    public static function fromTwoEndpoint(Point $x, Point $y){
        $line = Line::fromTwoPoint($x, $y);
        $xrange = [$x->x, $y->x];
        $xrange = $xrange[0] > $xrange[1] ? [$xrange[1], $xrange[0]] : $xrange;
        $yrange = [$x->y, $y->y];
        $yrange = $yrange[0] > $yrange[1] ? [$yrange[1], $yrange[0]] : $yrange;
        return new self($line, $xrange, $yrange);
    }

    public function isPointOnEdge(Point $p){
        $isPointOnLine = $this->line->isPointOnLine($p);
        if($isPointOnLine){
            return ($p->x >= $this->xrange[0] && $p->x <= $this->xrange[1]);
        }
        return false;
    }

    /**
     * @param Line $line
     * @return bool|Point
     */
    public function intersectWithLine(Line $line){
        $point = $this->line->intersectWithLine($line);
        if($point !== false){
            return ($point->x >= $this->xrange[0] && $point->x <= $this->xrange[1]) ? $point : false;
        }
        return false;
    }

    public function intersectWithEdge(Edge $edge){
        $point = $this->line->intersectWithLine($edge->line);
        if($point !== false){
            return (
                $point->x >= $this->xrange[0] && $point->x <= $this->xrange[1] &&
                $point->x >= $edge->xrange[0] && $point->x <= $edge->xrange[1]
            ) ? $point : false;
        }
        return false;
    }

    public function __toString(){
        $lineString = $this->line->__toString();
        return $lineString.' x=['.$this->xrange[0].','.$this->xrange[1].'],y=['.$this->yrange[0].','.$this->yrange[1].']';
    }
}