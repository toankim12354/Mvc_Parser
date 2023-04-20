<?php
class FlyweightFactory
{
    private $flyweights = [];

    public function getFlyweight($key)
    {
        if (isset($this->flyweights[$key])) {
            return $this->flyweights[$key];
        } else {
            $flyweight = new ConcreteFlyweight($key);
            $this->flyweights[$key] = $flyweight;
            return $flyweight;
        }
    }
}

interface Flyweight
{
    public function operation();
}

class ConcreteFlyweight implements Flyweight
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function operation()
    {
        echo "ConcreteFlyweight with key " . $this->key . " is being used.<br>";
    }
}

class Client
{
    private $factory;

    public function __construct(FlyweightFactory $factory)
    {
        $this->factory = $factory;
    }

    public function run()
    {
        $flyweight1 = $this->factory->getFlyweight("key1");
        $flyweight2 = $this->factory->getFlyweight("key2");
        $flyweight3 = $this->factory->getFlyweight("key1");
        $flyweight4 = $this->factory->getFlyweight("key3");

        $flyweight1->operation();
        $flyweight2->operation();
        $flyweight3->operation();
        $flyweight4->operation();
    }
}

$factory = new FlyweightFactory();
$client = new Client($factory);
$client->run();
