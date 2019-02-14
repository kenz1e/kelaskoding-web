<?php

/**
 *
 * @author Hendro Steven
 */
class Item extends DB\SQL\Mapper {

    function __construct(\DB\SQL $db) {
        parent::__construct($db, "tcourse_item");
    }

    
}
