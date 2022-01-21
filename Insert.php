<?php

namespace DanielOzeh;

require_once('QueryInterface.php');
use QueryInterface;

class Insert implements QueryInterface {
    
    private $table;

    private $columns = [];

    private $values = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __toString(): string
    {
        return 'INSERT INTO ' . $this->table
            . ' (' . implode(', ',$this->columns) . ') VALUES (' . implode(', ',$this->values) . ')';
    }

    public function columns(string ...$columns): self
    {
        $this->columns = $columns;
        foreach ($columns as $column) {
            $this->values[] = ":$column";
        }
        //var_dump($this->columns);
        return $this;
    }
}