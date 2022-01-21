<?php

namespace DanielOzeh;

/**
 * @author Daniel Ozeh hello@danielozeh.com.ng
 */

require_once('Select.php');
require_once('Insert.php');
require_once('Update.php');
require_once('Delete.php');

class QueryBuilder
{
    public static function select(string ...$select): Select {
        //var_dump($select);
        return new Select($select);
    }

    public static function insert(string $into): Insert
    {
        //var_dump($into);
        return new Insert($into);
    }

    public static function update(string $table): Update
    {
        return new Update($table);
    }

    public static function delete(string $table): Delete
    {
        return new Delete($table);
    }
}
