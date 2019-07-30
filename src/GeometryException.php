<?php
namespace geometry;

use Throwable;

class GeometryException extends \Exception{
    const POLYGON_FROM_ENDPOINTS_PARAMS_ERROR = 10001;

    const LINE_PARAMS_ERROR = 11001;
    const LINE_INTERSECT_WITH_LINE_SAME_LINE_ERROR = 11002;

    public static $error_message = [
        self::POLYGON_FROM_ENDPOINTS_PARAMS_ERROR => 'Polygon::fromEndpoints\'s params must be an array of Point',

        self::LINE_PARAMS_ERROR => 'Line::__construct\'s params error, a b c can not be zero at same time',
        self::LINE_INTERSECT_WITH_LINE_SAME_LINE_ERROR => 'Line::intersectWithLine error, two line are the same',
    ];

    public function __construct($code = 0, Throwable $previous = null){
        $message = isset(self::$error_message[$code]) ? self::$error_message[$code] : 'Unknown GeometryException';
        parent::__construct($message, $code, $previous);
    }
}