<?php
interface ShapeInteface {
    public function draw();
}
class Circle implements ShapeInteface {
    public  function  draw()
    {
        // TODO: Implement draw() method.
        echo "da ve hinh tron";

    }
}
class Square implements  ShapeInteface {
    public  function  draw() {
        echo "da ve hih vuong";
    }
}
class Rectangle implements ShapeInteface {
    public  function  draw() {
        echo "da ve chu nhat";
    }
}
class Triangle implements  ShapeInteface {
    public  function  draw() {
        echo "da ve chu tong";
    }
}
// abstract factpry

abstract  class ShapeFactory {
    abstract public function createCircle();
    abstract public function createSquare();
    abstract public function createRectangle();
    abstract public function createTriangle();
}
//concreate factory de tao cac doi tuong

class ConcreateSHapeFactory extends ShapeFactory {
    public function createCircle() {
        return new Circle();
    }
    public function createSquare() {
        return new Square();
    }
    public function createRectangle() {
        return new Rectangle();
    }
    public function createTriangle() {
        return new Triangle();
    }

}

//su dung abstract de tao doi tuong hinh hoc va ve chung

class Client {
    private $shapeFactory;
    public function __construct(ShapeFactory $shapeFactory) {
        $this->shapeFactory = $shapeFactory;
    }
    public function drawShapes() {
        $circle = $this->shapeFactory->createCircle();
        $this->shapeFactory->createSquare();
        $this->shapeFactory->createRectangle();
        $circle->draw();
        $square = $this->shapeFactory->createSquare();
        $square->draw();
        $rectangle = $this
            ->shapeFactory
            ->createRectangle();
        $rectangle->draw();

    }
}
$circle = new Client(new ConcreateSHapeFactory());
$circle->drawShapes();