<?php
namespace geometry;

class Polygon{
    public $edges;
    public $isConvex;

    private function __construct($edges=[]){
        $this->edges = $edges;
        $this->isConvex = $this->_isConvexPolygon();
    }

    private function _isConvexPolygon(){
        return true;
    }

    public static function fromEndpoints($points=[]){
        $isPointsOk = true;
        $endpointLabels = [];
        foreach ($points as $k=>$point) {
            if(!$point instanceof Point){
                $isPointsOk = false;
                break;
            }
            $pointLabel = $point->getUniqueLabel();
            if(in_array($pointLabel, $endpointLabels)){
                unset($points[$k]);
            }else{
                array_push($endpointLabels, $pointLabel);
            }
        }
        if(!$isPointsOk){
            throw new GeometryException(GeometryException::POLYGON_FROM_ENDPOINTS_PARAMS_ERROR);
        }
        $edges = [];
        $pointsLength = count($points);
        for($i=0; $i<$pointsLength-1; $i++){
            array_push($edges, Edge::fromTwoEndpoint($points[$i], $points[$i+1]));
        }
        array_push($edges, Edge::fromTwoEndpoint($points[$pointsLength-1], $points[0]));
        return new self($edges);
    }

    public function isPointInPolygon(Point $p){
        $isPointOnPolygonEdges = false;
        foreach ($this->edges as $edge) {
            if($edge->isPointOnEdge($p)){
                $isPointOnPolygonEdges = true;
                break;
            }
        }
        if(!$isPointOnPolygonEdges){
            $pointHorizontalLine = Line::fromTwoPoint($p, new Point($p->x+1, $p->y));
            $intersections = [];
            foreach ($this->edges as $edge) {
                $intersection = $edge->intersectWithLine($pointHorizontalLine);
                if($intersection instanceof Point){
                    array_push($intersections, $intersection);
                }
            }
            $leftIntersectionNumber = 0;
            $rightIntersectionNumber = 0;
            foreach ($intersections as $intersection) {
                if($intersection->x < $p->x){
                    $leftIntersectionNumber++;
                }
                if($intersection->x > $p->x){
                    $rightIntersectionNumber++;
                }
            }
            return ($leftIntersectionNumber%2==1 && $rightIntersectionNumber%2==1);
        }
        return true;
    }

    public function __toString(){
        $string = [];
        foreach ($this->edges as $edge) {
            array_push($string, $edge->__toString());
        }
        return $string;
    }
}