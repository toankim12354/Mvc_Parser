<?php

// Định nghĩa interface cho các Observer
interface Observer {
    public function update($subject);
}

// Định nghĩa abstract class cho Subject
abstract class Subject {
    protected $observers = [];

    public function registerObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function unregisterObserver(Observer $observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

// Định nghĩa các concrete class cho Subject
class TemperatureSensor extends Subject {
    private $temperature;

    public function getTemperature() {
        return $this->temperature;
    }

    public function setTemperature($temperature) {
        $this->temperature = $temperature;
        $this->notifyObservers();
    }
}

// Định nghĩa các concrete class cho Observer
class Display implements Observer {
    public function update($subject) {
        echo "Temperature is now: " . $subject->getTemperature() . "\n";
    }
}

class Logger implements Observer {
    public function update($subject) {
        echo "Temperature changed to: " . $subject->getTemperature() . "\n";
    }
}

// Sử dụng Pattern Observer để đưa ra thông báo khi nhiệt độ thay đổi
$temperatureSensor = new TemperatureSensor();
$display = new Display();
$logger = new Logger();

$temperatureSensor->registerObserver($display);
$temperatureSensor->registerObserver($logger);

$temperatureSensor->setTemperature(20);
$temperatureSensor->setTemperature(25);

$temperatureSensor->unregisterObserver($logger);


