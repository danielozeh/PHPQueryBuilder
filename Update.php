<?php

/**
 * @author Daniel Ozeh hello@danielozeh.com.ng
 */

namespace DanielOzeh;

require_once('QueryInterface.php');
use QueryInterface;

class Update implements QueryInterface {
    
    private $table;
    private $conditions = [];
    private $columns = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __toString(): string
    {
        return 'UPDATE ' . $this->table
            . ' SET ' . implode(', ', $this->columns)
            . ($this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions));
    }

    public function where(string ...$where): self
    {
        foreach ($where as $arg) {
            $this->conditions[] = $arg;
        }
        return $this;
    }

    public function set(string ...$columns): self
    {
        foreach ($columns as $column) {
            $this->columns[] = "$column = :$column";
        }
        return $this;
    }
}