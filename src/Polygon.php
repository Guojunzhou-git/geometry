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

    public function isPointIn(Point $p){

    }

    public function __toString(){
        $string = [];
        foreach ($this->edges as $edge) {
            array_push($string, $edge->__toString());
        }
        return $string;
    }
}