var rectSize = new Size(25, 25);
var rect = new Rectangle([0, 0], rectSize);
var path = new Path.Rectangle(rect);
path.fillColor = 'green';
rect.left = 100;
rect.right = 200;
var path = new Path.Rectangle(rect);
path.fillColor = 'red';

var from = new Point(25, 0);
var to = new Point(25, 1300);
var path = new Path.Line(from, to);
path.strokeColor = 'black';
