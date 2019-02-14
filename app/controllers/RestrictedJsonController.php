<?php
/** 
 * @author Hendro Steven
 * @date
 */
class RestrictedJsonController extends Controller {

    function beforeroute() {
        if (!$this->f3->exists('SESSION.acc')) {            
            $this->response_array = array(
                'status' => false
            );
        }
    }

    function afterroute() {
        echo json_encode($this->response_array);
    }

}
