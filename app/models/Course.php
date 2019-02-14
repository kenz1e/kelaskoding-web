<?php

/**
 *
 * @author Hendro Steven
 */
class Course extends DB\SQL\Mapper {

    function __construct(\DB\SQL $db) {
        parent::__construct($db, "tcourse");
    }

    
}
