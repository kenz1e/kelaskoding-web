<?php

/**
 *
 *
 * @author Hendro Steven
 * @date
 */
class CaptchaController {

    protected $f3;

    function __construct() {
        $f3 = Base::instance();
        $this->f3 = $f3;
    }

    public function getCaptcha() {
        $img = new Image();
        $img->captcha('ui/fonts/Dink.ttf', 16, 5, 'SESSION.captcha_code');
        $img->render();		
    }

}
