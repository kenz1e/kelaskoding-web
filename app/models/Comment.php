<?php

/**
 *
 * @author Hendro Steven
 */
class Comment extends DB\SQL\Mapper {

    function __construct(\DB\SQL $db) {
        parent::__construct($db, "tcomment");
    }

    
}
