<?php

namespace DanielOzeh;

/**
 * @author Daniel Ozeh hello@danielozeh.com.ng
 */

require_once('Select.php');

class QueryBuilder
{
    public static function select(string ...$select): Select {
        //var_dump($select);
        return new Select($select);
    }
}
