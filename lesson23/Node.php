<?php

// дано - два связных списка
// вернуть - число, которое представляет собой сумму связных списков, представленных в виде чисел
// пример:
// 1 -> 3 -> 5 -> 1 -> null
// 2 -> 7 -> 7 -> null
// ответ - 2303 ( = 1531 + 772 )

class Node
{
    public int $value;
    public ?Node $next;

    public function __construct(int $value, ?Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}


$n1 = new Node(
    1,
    new Node(
        3,
        new Node(
            5,
            new Node(1)
        )
    )
);

$n2 = new Node(
    2,
    new Node(
        7,
        new Node(7)
    )
);

function sumNodes(Node $n1, Node $n2): int
{
    $number1 = '';
    $number2 = '';

    while (isset($n1)) {
        $number1 .= $n1->value;
        $n1 = $n1->next;
    }

    while (isset($n2)) {
        $number2 .= $n2->value;
        $n2 = $n2->next;
    }

    return (int) (strrev($number1) + strrev($number2));
}

echo sumNodes($n1, $n2);