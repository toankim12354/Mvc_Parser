<?php
// dinh nghia facetory interface
interface SchoolSupplyFactory {
    public function createPen();
    public function createPaper();
}

// dinh nghia cac lop concreate factory
class PencilFactory implements SchoolSupplyFactory {
    public function createPen() {
        return new Pen();
    }

    public function createPaper() {
        return new Notebook();
    }

}

class PenFactory implements SchoolSupplyFactory {
    public function createPen() {
        return new Pen();
    }
    public function createPaper() {
        return new LooseLeaf();
    }
}
// dinh nghia abstract product interface
interface SchoolFactory {
    public function getName();
    public function getPrice();

}
// dinh nghia cac lop concreate factory
class
class Pen implements SchoolFactory {
    public function getName()
    {
        // TODO: Implement getName() method.
        return 'Pen';
    }
    public function getPrice() {
        // TODO: Implement getPrice() method.
        return 0.6;
    }
}
class Notebook implements SchoolFactory {
    public function getName() {
        // TODO: Implement getName() method.
        return 'Notebook';
    }
    public function getPrice() {
        // TODO: Implement getPrice() method.
        return 2.6;
    }

}
class LooseLeaf implements SchoolFactory {
    public function getName() {
        // TODO: Implement getName() method.
        return 'Loose Leaf';
    }
    public function getPrice() {
        // TODO: Implement getPrice() method.
        return 1.6;
    }
}
// dinh nghia adapter intefacer
interface JSONConverter {
    public function convertToJson($object);
}
//dinh nghia adapter
 class SchoolSupplyJsonConverter implements JSONConverter {
    public function convertToJson($object) {


        return json_encode( array(
            'name' => $object->getName(),
            'price' => $object->getPrice()
        ));

    }
}
// Sử dụng Abstract Factory để tạo đối tượng sản phẩm
$pencilFactory = new PencilFactory();
$pencil = $pencilFactory->createPen();
$notebook = $pencilFactory->createPaper();

$penFactory = new PenFactory();
$pen = $penFactory->createPen();
$looseLeaf = $penFactory->createPaper();

// Sử dụng Adapter để chuyển đổi đối tượng sản phẩm thành chuỗi JSON
$jsonConverter = new SchoolSupplyJsonConverter();
$jsonPencil = $jsonConverter->convertToJson($pencil);
$jsonNotebook = $jsonConverter->convertToJson($notebook);
$jsonPen = $jsonConverter->convertToJson($pen);
$jsonLooseLeaf = $jsonConverter->convertToJson($looseLeaf);

// Hiển thị kết quả
echo $jsonPencil . "\n";
echo $jsonNotebook . "\n";
echo $jsonPen . "\n";
echo $jsonLooseLeaf . "\n";