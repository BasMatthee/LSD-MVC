<?php

namespace Skeleton\System;

/**
 * Class Model
 */
class Model
{
    /**
     * @constructor
     */
    public function __construct()
    {
    }

    /**
     * @param \mysqli_result $db_result
     * @return array
     */
    public function fetch_result($db_result)
    {
        $result = array();

        if ($db_result->num_rows) {
            while ($row = $db_result->fetch_object()) {
                $result[] = $row;
            }
        }

        return $result;
    }
}