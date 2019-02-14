<?php

class ContactController extends Controller {

    function index() {        
        $this->f3->set('view', 'page/contact.html');
    }

    function submit() { 
        $nama = $this->f3->get('POST.inputNama');    
        $email = $this->f3->get('POST.inputEmail');
        $pesan = $this->f3->get('POST.inputPesan');
        $captcha = $this->f3->get('POST.captcha');

        $v = new Valitron\Validator(array('Nama' => $nama,'Email'=>$email,'Pesan'=>$pesan, 'Kode Keamanan'=> $captcha));
        $v->rule('required', ['Nama','Email','Pesan','Kode Keamanan']);         
        $v->rule('email', 'Email');

        if ($v->validate()) {
            $captcha_code = $this->f3->get('SESSION.captcha_code');
            if ($captcha === $captcha_code) {
                $contact = new ContactUs($this->db);
                $contact->name = $name;
                $contact->email = $email;
                $contact->pesan = $pesan;
                $contact->status = 0;
                $contact->save();
                $flash = array(
                    'errorType' => 'Success',
                    'infos' => array(array('Pesan diterima, kami akan merespon secepatnya. Terima kasih'))
                );             
                $this->f3->set('SESSION.flash', $flash);
            }else{
                $flash = array(
                    'errorType' => 'Error(s)',
                    'errors' => array(array('Kode keamanan salah, silahkan coba lagi')),
                    'inputNama' => $nama,
                    'inputEmail' => $email, 
                    'inputPesan' => $pesan               
                );
                $this->f3->set('SESSION.flash', $flash);       
            }
        }else{
            $flash = array(
                'errorType' => 'Error(s)',
                'errors' => $v->errors(),
                'inputNama' => $nama,
                'inputEmail' => $email, 
                'inputPesan' => $pesan
            );
            $this->f3->set('SESSION.flash', $flash);     
        }
        $this->f3->reroute('/contact');
    }
}