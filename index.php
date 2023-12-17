<?php

// Базовий компонент
interface Component {
    public function operation();
}

// Листок (термінальний компонент)
class Leaf implements Component {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function operation() {
        return "Leaf {$this->name} does something.";
    }
}

// Контейнер (некерований компонент)
class Composite implements Component {
    private $children = [];

    public function add(Component $component) {
        $this->children[] = $component;
    }

    public function operation() {
        $result = "Composite does something:<br>";

        foreach ($this->children as $child) {
            $result .= $child->operation() . "<br>";
        }

        return $result;
    }
}

// Використання паттерна Компонувальник
$leaf1 = new Leaf("A");
$leaf2 = new Leaf("B");
$leaf3 = new Leaf("C");

$composite = new Composite();
$composite->add($leaf1);
$composite->add($leaf2);

$composite2 = new Composite();
$composite2->add($leaf3);
$composite2->add($composite);

echo $composite2->operation();
