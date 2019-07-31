# geometry
A php composer library of geometry operating

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
