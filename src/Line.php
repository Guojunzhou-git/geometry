<?php
namespace geometry;

class Line{
    public $a;
    public $b;
    public $c;
    public function __construct($a=0, $b=0, $c=0){
        if($a == 0 && $b == 0 && $c == 0){
            throw new GeometryException(GeometryException::LINE_PARAMS_ERROR);
        }
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public static function fromTwoPoint(Point $x, Point $y){
        $a = $y->y - $x->y;
        $b = $x->x - $y->x;
        $c = $y->x*$x->y - $x->x*$y->y;
        return new self($a, $b, $c);
    }

    public function __toString(){
        $string = '';
        if($this->a != 0){
            $flag = $this->a > 0 ? '' : '-';
            $string .= $this->a.'x';
        }
        if($this->b != 0){
            $flag = $this->b > 0 ? '+' : '-';
            $string .= $flag.abs($this->b).'y';
        }
        if($this->c != 0){
            $flag = $this->c > 0 ? '+' : '-';
            $string .= $flag.abs($this->c);
        }
        $string .= '=0';
        return $string;
    }
}