<?php
    function getMillisecTime()
    {
        list($t1,$t2) = explode(' ', microtime());
        $mst = str_replace('.', '', $t2.$t1);

        return $mst;
    }