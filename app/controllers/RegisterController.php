<?php

class RegisterController extends Controller {

    function index() {        
        $this->f3->set('view', 'page/register.html');
    }

    function daftar(){
        $inputNama = $this->f3->get('POST.inputNama');
        $inputEmail = $this->f3->get('POST.inputEmail');
        $inputPhone = $this->f3->get('POST.inputPhone');
        $inputPassword = $this->f3->get('POST.inputPassword');
        $inputUlangPassword = $this->f3->get('POST.inputUlangPassword');
        $captcha = $this->f3->get('POST.captcha');

        $v = new Valitron\Validator(array('Nama Lengkap' => $inputNama,'Email'=>$inputEmail,'Handphone'=>$inputPhone,'Password'=> $inputPassword, 'Ulangi Password'=>$inputUlangPassword, 'Kode Keamanan'=> $captcha));
        $v->rule('required', ['Nama Lengkap','Email','Handphone','Password','Ulangi Password','Kode Keamanan']);   
        $v->rule('equals', 'Password', 'Ulangi Password');
        $v->rule('email', 'Email');

        if ($v->validate()) {
            $captcha_code = $this->f3->get('SESSION.captcha_code');
            if ($captcha === $captcha_code) {
                $tmp = new Member($this->db);
                $tmp->load(array('email=?',$inputEmail));
                if($tmp->dry()){
                    $serialid = $this->millitime();
                    $member = new Member($this->db);
                    $member->email = $inputEmail;
                    $member->phone = $inputPhone;
                    $member->fullname = $inputNama;
                    $member->password = md5($inputPassword);
                    $member->status = 0;
                    $member->serialid = $serialid;
                    $member->save();
                    $mail = new Email();
                    $mail->kirimPesanAktivasi($inputEmail,$inputNama,$serialid);
                    $flash = array(
                        'errorType' => 'Success',
                        'infos' => array(array('Pendaftaran berhasil, silahkan periksa email anda'))
                    );             
                    $this->f3->set('SESSION.flash', $flash);
                }else{
                    $flash = array(
                        'errorType' => 'Error(s)',
                        'errors' => array(array('Email sudah terdaftar, silahkan gunakan email lain')),
                        'inputNama' => $inputNama,
                        'inputEmail' => $inputEmail,
                        'inputPhone' => $inputPhone   
                    );
                    $this->f3->set('SESSION.flash', $flash);                   
                }
            }else{
                $flash = array(
                    'errorType' => 'Error(s)',
                    'errors' => array(array('Kode keamanan salah, silahkan coba lagi')),
                    'inputNama' => $inputNama,
                    'inputEmail' => $inputEmail,
                    'inputPhone' => $inputPhone              
                );
                $this->f3->set('SESSION.flash', $flash);               
            }
        }else{
            $flash = array(
                'errorType' => 'Error(s)',
                'errors' => $v->errors(),
                'inputNama' => $inputNama,
                'inputEmail' => $inputEmail,
                'inputPhone' => $inputPhone
            );
            $this->f3->set('SESSION.flash', $flash);            
        }
        $this->f3->reroute('/daftar');
    }

    function aktivasi(){
        $serialid = $this->f3->get('PARAMS.serialid');
        $v = new Valitron\Validator(array('ID Aktivasi' => $serialid));
        $v->rule('required', ['ID Aktivasi']);
        if ($v->validate()) {
            $member = new Member($this->db);
            $member->load(array('serialid=?',$serialid));
            if(!$member->dry()){
                $member->status = 1;
                $member->save();
                $flash = array(
                    'errorType' => 'Success',
                    'infos' => array(array('Aktivasi berhasil, silahkan login untuk masuk'))
                );             
                $this->f3->set('SESSION.flash', $flash);
                $this->f3->reroute('/masuk');
            }else{
                $flash = array(
                    'errorType' => 'Error(s)',
                    'errors' => array(array('Anda belum terdaftar, silahkan melakukan pendaftar terlebih dahulu')),
                );
                $this->f3->set('SESSION.flash', $flash);
                $this->f3->reroute('/daftar');
            }
        }else{
            $flash = array(
                'errorType' => 'Error(s)',
                'errors' => $v->errors()
            );
            $this->f3->set('SESSION.flash', $flash);
            $this->f3->reroute('/daftar');
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
