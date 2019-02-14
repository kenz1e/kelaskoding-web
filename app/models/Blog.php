<?php

/**
 *
 * @author Hendro Steven
 */
class Blog extends DB\SQL\Mapper {

    function __construct(\DB\SQL $db) {
        parent::__construct($db, "tblog");
    }

    
}
