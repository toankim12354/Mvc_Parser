<?php
interface Button {
    public function render();
}

class WindowsButton implements Button {
    public function render() {
        echo "Windows Button\n";
    }
}

class MacButton implements Button {
    public function render() {
        echo "Mac Button\n";
    }
}

interface GUIFactory {
    public function createButton(): Button;
}

class WindowsFactory implements GUIFactory {
    public function createButton(): Button {
        return new WindowsButton();
    }
}

class MacFactory implements GUIFactory {
    public function createButton(): Button {
        return new MacButton();
    }
}

$os = "windows"; // or "mac"
if ($os === "windows") {
    $factory = new WindowsFactory();
} else if ($os === "mac") {
    $factory = new MacFactory();
} else {
    throw new Exception("Unknown OS");
}

$button = $factory->createButton();
$button->render();
