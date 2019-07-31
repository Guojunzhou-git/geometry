# geometry
A php composer library of geometry operating. Bug Report:<br/>
- 1. https://github.com/Guojunzhou-git/geometry/issues
- 2. web_scott@163.com

### geometry\Point
#### 1. Point Point::__construct(x, y);
- Given x and y, return a Point instance
#### 2. string Point::getUniqueLabel();
- Generate a qunite string identification of Point
#### 3. boolean Point::isInLine(Line line);
- Return whether this point is in the target line
#### 4. boolean Point::isInEdge(Edge edge);
- Return whether this point is in the target edge
#### 5. boolean Point::isSameWithPoint(Point point);
- Return whethis this point has same x and same y with the target point
### geometry\Line
#### 1. Line Line::__construct(a, b, c);
- Give the parameters of Line formula `Ax+By+C=0`, return a Line instance
#### 2. Line Line::fromTwoPoint(Ponit p1, Point p2);
- Return a Line instance by providing two different point
#### 3. boolean Line::isPointOnLine(Point p);
- Retrue whether the target Ponit in this line
#### 4. GeometryException/boolean/Point Line::intersectWithLine(Line line);
- Raise a GeometryException with code=11002 when two lines are the same
- Return a boolean `false` when two lines are parallel
- Reruen the intersection `Point` when two line intersects
### geometry\Edge
#### 1. Edge Edge::__constrct(Line line, xrange=[0,0], yrange=[0,0]);
- Give a `Line` and the ranges of x and y, return an instance of Edge
#### 2. Edge Edge::fromTwoEndpoint(Point p1, Point p2);
- Give two points, return the `Edge` instance with endpoint given
#### 3. boolea Edge::isPointOnEdge(Point p)
- Return whether the given point on this `Edge`
#### 4. GeometryException/boolean/Point Edge::intersectWithLine(Line line)
- Raise a GeometryException with code=11002 when this edge is a part of line
- Return a boolean `false` when edge is parallel with line
- Reruen the intersection `Point` when edge intersects with line in its range
### geometry\Polygon
#### 1. Polygon Polygon::fromEndpoints(Point[] points);
- Give the clockwise endpoints of polygon, return an instance of `Polygon`
#### 2. boolean Polygon::isPointInPolygon(Point p)
- Return whether the target Point in Polygon
