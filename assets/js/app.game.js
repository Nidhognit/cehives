// var rectSize = new Size(25, 25);
// var rect = new Rectangle([0, 0], rectSize);
// var path = new Path.Rectangle(rect);
// path.fillColor = 'green';
// rect.left = 100;
// rect.right = 200;
// var path = new Path.Rectangle(rect);
// path.fillColor = 'red';
//
// var from = new Point(25, 0);
// var to = new Point(25, 800);
// var path = new Path.Line(from, to);
// path.strokeColor = 'black';

var jsonString = document.getElementById('game-initial').getAttribute('data-game-initial');
var data = JSON.parse(jsonString);

var count = 0;
data.map.map.forEach(function (dataRow, column) {
    dataRow.forEach(function (value, row) {
        let color = data.map.viewDescriptor[value].color;
        drawMapPiece(row, column, data.map.blockSize, color);
    });
    drawHorizontalRow((column + 1) * data.map.blockSize, data.map.width);
    count = dataRow.length;
});
for (let row = 1; row < count; row++) {
    drawVerticalRow(row  * data.map.blockSize, data.map.height);
}

function drawMapPiece(row, column, size, collor) {
    let rectSize = new Size(size, size);
    let rect = new Rectangle([row * size, column * size], rectSize);
    let path = new Path.Rectangle(rect);
    path.fillColor = collor;
}

function drawHorizontalRow(height, width) {
    let from = new Point(0, height);
    let to = new Point(width, height);
    let path = new Path.Line(from, to);
    path.strokeColor = 'black';
}

function drawVerticalRow(width, height) {
    debugger
    let from = new Point(width, 0);
    let to = new Point(width, height);
    let path = new Path.Line(from, to);
    path.strokeColor = 'black';
}
