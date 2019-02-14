<?php

class LoginController extends Controller {

    function index() {        
        $this->f3->set('view', 'page/login.html');
    }

    function lupa() {    
        $this->f3->set('ESCAPE', FALSE);    
        $this->f3->set('view', 'page/lupa.html');
    }

    function prosesLupaStep1(){
        $inputEmail = $this->f3->get('POST.inputEmail');
        $v = new Valitron\Validator(array('Email' => $inputEmail));
        $v->rule('required', ['Email']);   
        $v->rule('email', 'Email');

        $domain = $this->f3->get('domain');

        if($v->validate()){
            $member = new Member($this->db);
            $member->load(array('email=?',$inputEmail));
            if(!$member->dry()){
                $mail = new Email();
                if($member->status===0){//belum aktivasi    
                    $mail->kirimPesanAktivasi($member->email,$member->fullname,$member->serialid);               
                    $flash = array(
                        'errorType' => 'Success',
                        'infos' => array(array('Email anda belum diaktivasi, silahkan periksa email anda untuk proses aktivasi'))
                    );             
                    $this->f3->set('SESSION.flash', $flash);
                    $this->f3->reroute('/lupa');
                }else{ //proses perubahan password
                    $serialid =  $this->millitime();
                    $reset = new ResetPassword($this->db);
                    $reset->member_id = $member->id;
                    $reset->request_date = date('Y-m-d H:i:s');
                    $reset->expire_date = date('Y-m-d H:i:s', strtotime('+1 hour'));
                    $reset->serialid = $serialid;
                    $reset->save();
                    $mail->kirimPesanReset($member->email,$member->fullname,$serialid); 
                    $flash = array(
                        'errorType' => 'Success',
                        'infos' => array(array('Terima kasih, silahkan periksa email anda untuk proses perubahan password'))
                    );             
                    $this->f3->set('SESSION.flash', $flash);
                    $this->f3->reroute('/lupa');
                }
            }else{
                $flash = array(
                    'errorType' => 'Error(s)',
                    'errors' => array(array('Email anda tidak terdaftar, silahkan <a href="'.$domain.'/daftar">daftar disini</a> terlebih dahulu'))                         
                );
                $this->f3->set('SESSION.flash', $flash);                
                $this->f3->reroute('/lupa');
            }
        }else{
            $flash = array(
                'errorType' => 'Error(s)',
                'errors' => $v->errors()                   
            );
            $this->f3->set('SESSION.flash', $flash);
            $this->f3->reroute('/lupa');
        }
    }

    function prosesLupaStep2(){
        $serialid = $this->f3->get('PARAMS.serialid');
        $v = new Valitron\Validator(array('ID Aktivasi' => $serialid));
        $v->rule('required', ['ID Aktivasi']);

        if ($v->validate()) {
            $reset = new ResetPassword($this->db);
            $now = date('Y-m-d H:i:s');
            $reset->load(array('serialid=? AND expire_date>=?',$serialid,$now));
            if(!$reset->dry()){
                $this->f3->set('serialid', $serialid);    
                $this->f3->set('view', 'page/gantipassword.html');
            }else{
                $flash = array(
                    'errorType' => 'Error(s)',
                    'errors' => array(array('Link reset password salah atau sudah kadaluarsa'))                         
                );
                $this->f3->set('SESSION.flash', $flash);                
                $this->f3->reroute('/lupa');
            }
        }else{
            $flash = array(
                'errorType' => 'Error(s)',
                'errors' => $v->errors()                   
            );
            $this->f3->set('SESSION.flash', $flash);
            $this->f3->reroute('/lupa');
        }
    }

    function prosesLupaStep3(){
        $serialid = $this->f3->get('POST.serialid');
        $inputPassword = $this->f3->get('POST.inputPassword');
        $inputUlangPassword = $this->f3->get('POST.inputUlangPassword');
        
        $v = new Valitron\Validator(array('ID'=> $serialid,'Password'=> $inputPassword, 'Ulangi Password'=>$inputUlangPassword));
        $v->rule('required', ['ID','Password','Ulangi Password']);   
        $v->rule('equals', 'Password', 'Ulangi Password');

        if($v->validate()){
            $reset = new ResetPassword($this->db);
            $reset->load(array('serialid=?',$serialid));
            if(!$reset->dry()){
                $member = new Member($this->db);
                $member->load(array('id=?',$reset->member_id));
                if(!$member->dry()){
                    $reset->done_date = date('Y-m-d H:i:s');
                    $reset->save();
                    $member->password = md5($inputPassword);
                    $member->save();
                    $flash = array(
                        'errorType' => 'Success',
                        'infos' => array(array('Perubahan password berhasil, silahkan login'))
                    );             
                    $this->f3->set('SESSION.flash', $flash);
                    $this->f3->reroute('/masuk');
                }else{
                    $flash = array(
                        'errorType' => 'Error(s)',
                        'errors' => array(array('Link reset password salah atau sudah kadaluarsa'))                         
                    );
                    $this->f3->set('SESSION.flash', $flash);                
                    $this->f3->reroute('/lupa');
                }
            }else{
                $flash = array(
                    'errorType' => 'Error(s)',
                    'errors' => array(array('Link reset password salah atau sudah kadaluarsa'))                         
                );
                $this->f3->set('SESSION.flash', $flash);                
                $this->f3->reroute('/lupa');
            }
        }else{
            $flash = array(
                'errorType' => 'Error(s)',
                'errors' => $v->errors()                   
            );
            $this->f3->set('SESSION.flash', $flash);
            $this->f3->reroute('/lupa/step2/'.$serialid);
        }        
    }

    function keluar(){
        $this->f3->clear('SESSION');
        $this->f3->reroute('/');
    }

    function login(){
        $inputEmail = $this->f3->get('POST.inputEmail');
        $inputPassword = $this->f3->get('POST.inputPassword');

        $v = new Valitron\Validator(array('Email' => $inputEmail,'Password'=>$inputPassword));
        $v->rule('required', ['Email','Password']);   

        if($v->validate()){
            $member = new Member($this->db);
            $member->load(array('email=? AND status=1',$inputEmail));
            if(!$member->dry()){
                if($member->password == md5($inputPassword)){
                    $member->lastlogin = date('Y-m-d H:i:s');
                    $member->save();
                    $this->f3->set('SESSION.member', $member->cast());
                    $this->f3->reroute('/');                
                }else{
                    $flash = array(
                        'errorType' => 'Error(s)',
                        'errors' => array(array('Email atau Password anda salah')),
                        'inputEmail' => $inputEmail         
                    );
                    $this->f3->set('SESSION.flash', $flash);
                    $this->f3->reroute('/masuk');
                }
            }else{
                $flash = array(
                    'errorType' => 'Error(s)',
                    'errors' => array(array('Email atau Password anda salah')),
                    'inputEmail' => $inputEmail         
                );
                $this->f3->set('SESSION.flash', $flash);
                $this->f3->reroute('/masuk');
            }
        }else{
            $flash = array(
                'errorType' => 'Error(s)',
                'errors' => $v->errors(),
                'inputEmail' => $inputEmail               
            );
            $this->f3->set('SESSION.flash', $flash);
            $this->f3->reroute('/masuk');
        }        
    }

    function millitime() {
        $microtime = microtime();
        $comps = explode(' ', $microtime);
        // Note: Using a string here to prevent loss of precision
        // in case of "overflow" (PHP converts it to a double)
        return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
    }


}
