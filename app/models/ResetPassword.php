<?php

/**
 * Description of Users
 *
 * @author Hendro Steven
 */
class ResetPassword extends DB\SQL\Mapper {

    function __construct(\DB\SQL $db) {
        parent::__construct($db, "treset");
    }

    
}
