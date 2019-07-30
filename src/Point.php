<?php
namespace geometry;

class Point{
    public $x;
    public $y;
    private $_uniqueLable;
    public function __construct($x=0, $y=0){
        $this->x = $x;
        $this->y = $y;
        $this->_uniqueLable = md5($this->x.'_'.$this->y);
    }

    public function getUniqueLabel(){
        return $this->_uniqueLable;
    }

    public function isInLine(Line $line){
        return $this->x*$line->a+$this->y*$line->b+$line->c == 0;
    }

    public function isSameWithPoint(Point $p){
        return ($p->x == $this->x && $p->y == $this->y);
    }

    public function __toString(){
        return 'Point('.$this->x.','.$this->y.')';
    }
}