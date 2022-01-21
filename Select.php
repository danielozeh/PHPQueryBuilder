<?php

/**
 * @author Daniel Ozeh hello@danielozeh.com.ng
 */

namespace DanielOzeh;

require_once('QueryInterface.php');
use QueryInterface;

class Select implements QueryInterface {
    //code will start here
    //code will start here
    private $fields = [];

    private $conditions= [];

    private $from = [];

    private $limit;

    public function __construct(array $select) {
        $this->fields = $select;
    }

    public function __toString(): string
    {
        $where = $this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions);
        $limit = $this->limit === null ? '' : ' LIMIT ' . $this->limit;
        return 'SELECT ' . implode(', ', $this->fields)
            . ' FROM ' . implode(', ', $this->from)
            . $where
            .$limit;
    }

    public function select($select): self {
        foreach($select as $s) {
            $this->fields[] = $s;
        }
        return $this;
    }

    public function where(string ...$where): self {
        //var_dump($where);
        foreach($where as $w) {
            $this->conditions[] = $w;
        }
        return $this;
    }

    public function from(string $table, ?string $name = null): self {
        if($name == null) {
            $this->from[] = $table;
        } else {
            $this->from[] = "${table} AS ${name}";
        }
        //var_dump($this->from);
        return $this;
    }
}