<?php

// Create database object
$db = new mysqli($db_conf['db_host'], $db_conf['db_user'], $db_conf['db_pass'], $db_conf['db_name']);

// Unset database credentials. Won't need them anymore
unset($db_conf);