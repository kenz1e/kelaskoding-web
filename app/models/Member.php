<?php

/**
 * Description of Users
 *
 * @author Hendro Steven
 */
class Member extends DB\SQL\Mapper {

    function __construct(\DB\SQL $db) {
        parent::__construct($db, "tmember");
    }

    
}
