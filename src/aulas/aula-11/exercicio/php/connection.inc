<?php

function connectDatabase() {
    $connectionString = 'host=localhost port=5432 dbname=local user=postgres password=unidavi';

    return pg_connect($connectionString);
}    
