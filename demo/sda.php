<?php



class MyIterator implements Iterator {
    private $position = 0;
    private $array = array("first", "second", "third");

    public function __construct() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }
}

class MyCollection implements IteratorAggregate {
    private $items = array();

    public function __construct($items) {
        $this->items = $items;
    }

    public function getIterator() {
        return new MyIterator();
    }
}

// Sử dụng Iterator pattern
$collection = new MyCollection(array("one", "two", "three"));
foreach ($collection as $key => $value) {
    echo $key . ": " . $value . "\n";
}
