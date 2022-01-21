<?php

/**
 * @author Daniel Ozeh hello@danielozeh.com.ng
 */

namespace DanielOzeh;

require_once('QueryInterface.php');
use QueryInterface;

class Delete implements QueryInterface {
    
    private $table;
    private $conditions = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __toString(): string
    {
        return 'DELETE FROM ' . $this->table . ($this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions));
    }

    public function where(string ...$where): self
    {
        foreach ($where as $w) {
            $this->conditions[] = $w;
        }
        return $this;
    }
}