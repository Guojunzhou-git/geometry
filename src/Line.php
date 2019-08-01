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
        // TODO: two different point
        $a = $y->y - $x->y;
        $b = $x->x - $y->x;
        $c = $y->x*$x->y - $x->x*$y->y;
        return new self($a, $b, $c);
    }

    public function isPointOnLine(Point $p){
        return ($this->a*$p->x + $this->b*$p->y + $this->c == 0);
    }

    /**
     * @param Line $line
     * @return bool| Point
     */
    public function intersectWithLine(Line $line){
        // line $line is same to $this
        if($this->a*$line->b == $this->b*$line->a && $this->a*$line->c == $this->c*$line->a && $this->b*$line->c == $this->c*$line->b){
            throw new GeometryException(GeometryException::LINE_INTERSECT_WITH_LINE_SAME_LINE_ERROR);
        }
        // there are no intersections with two parallel lines
        if($this->a*$line->b == $this->b*$line->a && ($this->a*$line->c != $this->c*$line->a || $this->b*$line->c != $this->c*$line->b)){
            return false;
        }
        // intersection of two cross-lines is:
        //  x=(b1*c2-b2*c1)/(a1*b2-a2*b1)
        //  y=(c2*a1-c1*a2)/(b1*a2-b2*a1)
        if($this->a*$line->b == $this->b*$line->a || $this->b*$line->a == $this->a*$line->b){
            return new Point(
                $this->a == 0 ? (0-$line->c)/$line->a : (0-$this->c)/$this->a,
                $this->b == 0 ? (0-$line->c)/$line->b : (0-$this->c)/$this->b
            );
        }else{
            return new Point(
                ($this->b*$line->c-$this->c*$line->b)/($this->a*$line->b-$this->b*$line->a),
                ($this->a*$line->c-$this->c*$line->a)/($this->b*$line->a-$this->a*$line->b)
            );
        }
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