<?php
interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "circle";
    }
}
class Square implements Shape {
    public function draw() {
        echo "square";
    }
}
class Triangle implements Shape {
    public function draw() {
        echo "triangle";
    }
}
abstract class ShapeDecorator implements Shape {
    protected  $shape;
    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }
    public function draw() {
        echo $this->shape->draw();
    }
}
class CircleDecorator extends ShapeDecorator {
    private  $color;
    public function __construct(Shape $shape, $color) {
        parent::__construct($shape);
        $this->color = $color;
    }
    public function draw() {
        $this->shape->draw();
        echo $this->color;
    }
}

$circle = new Circle();
$square = new Square();
$triangle = new Triangle();

$redCircle = new CircleDecorator($circle, 'red');
$blueSquare = new CircleDecorator($square, 'blue');
$greenTriangle = new CircleDecorator($triangle, 'green');

$redCircle->draw();
$blueSquare->draw();
$greenTriangle->draw();