<?php

function add(int $a, int $b): mixed {
    $a * $b;
}

class Person {
    public string $name;
    private int $age;

    public function setAge(int $age): void {
        $this->age = $age;
    }

    public function getAge(): int {
        return $this->age;
    }
}

$p = new Person();
$p->name = 'Bob';
$p->setAge(43);

echo json_encode($p, JSON_PRETTY_PRINT);
echo 'Age is ' . $p->getAge();