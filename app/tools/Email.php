<?php

class Email {

    protected $f3;
    
    protected $response_array;

    function __construct() {
        $f3 = Base::instance();              
        $this->f3 = $f3;        
    }

    function testMessage($email, $pesan){
        $domain = $this->f3->get('domain');
        $smtp_server = $this->f3->get('smtp_server');
        $smtp_acc = $this->f3->get('smtp_acc');
        $smtp_pass = $this->f3->get('smtp_pass');
        // instantiate smtp object
        $smtp = new SMTP($smtp_server, 25, NULL, $smtp_acc, $smtp_pass);
        // set email headers
        $smtp->set('Content-type', 'text/html; charset=UTF-8'); // email will be rendered as html content
        $smtp->set('From', 'info@kelaskoding.com');
        $smtp->set('To', $email);
        $smtp->set('Subject', 'Testing Email');
        
        // send email message
        $smtp_msg = $pesan;

        $smtp->send($smtp_msg);
    }

    function kirimPesanAktivasi($email, $name, $serialid) {
        $domain = $this->f3->get('domain');
        $smtp_server = $this->f3->get('smtp_server');
        $smtp_acc = $this->f3->get('smtp_acc');
        $smtp_pass = $this->f3->get('smtp_pass');
        // instantiate smtp object
        $smtp = new SMTP($smtp_server, 25, NULL, $smtp_acc, $smtp_pass);
        // set email headers
        $smtp->set('Content-type', 'text/html; charset=UTF-8'); // email will be rendered as html content
        $smtp->set('From', 'info@kelaskoding.com');
        $smtp->set('To', $email);
        $smtp->set('Subject', 'Aktivasi Member KelasKoding');
        
        // send email message
        $smtp_msg = 'Halo ' . $name . ',<br/><p>Terima kasih sudah mendaftar di KelasKoding, silahkan klik link berikut untuk aktivasi<br/>'
                . '<a href="' . $domain . '/aktivasi/' . $serialid . '">http://www.kelaskoding.com/aktivasi/' . $serialid . '</a><br/>'
                . '<p>Jika anda mengalami kesulitan untuk melakukan aktivasi silahkan <a href="' . $domain . '/contact">hubungi kami</a></p><br/><br/><br/>'
                . 'Salamat Hangat,<br/>'
                . 'KelasKoding.com';
        $smtp->send($smtp_msg);
    }

    function kirimPesanReset($email, $name, $serialid){
        $domain = $this->f3->get('domain');
        $smtp_server = $this->f3->get('smtp_server');
        $smtp_acc = $this->f3->get('smtp_acc');
        $smtp_pass = $this->f3->get('smtp_pass');
        // instantiate smtp object
        $smtp = new SMTP($smtp_server, 25, NULL, $smtp_acc, $smtp_pass);
        // set email headers
        $smtp->set('Content-type', 'text/html; charset=UTF-8'); // email will be rendered as html content
        $smtp->set('From', 'info@kelaskoding.com');
        $smtp->set('To', $email);
        $smtp->set('Subject', 'Reset Password KelasKoding');
       
        // send email message
        $smtp_msg = 'Halo ' . $name . ',<br/><p>Untuk melakukan proses perubahan password silahkan klik pada link berikut<br/>'
                . '<a href="' . $domain . '/lupa/step2/' . $serialid . '">http://www.kelaskoding.com/lupa/step2/' . $serialid . '</a><br/>'
                . '<p>Link perubahan password di atas hanya berlaku dalam waktu 1 jam sejak kami menerima permintaan perubahan password dari anda.<br/>'
                . 'Jika anda merasa tidak pernah melakukan permintaan perubahan password, maka abaikan saja email ini<br/>'
                . 'Jika anda mengalami kesulitan dengan proses perubahan password silahkan <a href="' . $domain . '/contact">hubungi kami</a></p><br/><br/><br/>'
                . 'Salamat Hangat,<br/>'
                . 'KelasKoding.com';
        $smtp->send($smtp_msg);
    }

    function kirimPesanWelcomeKelas($email, $name, $courseId, $courseName){
        $domain = $this->f3->get('domain');
        $smtp_server = $this->f3->get('smtp_server');
        $smtp_acc = $this->f3->get('smtp_acc');
        $smtp_pass = $this->f3->get('smtp_pass');
        // instantiate smtp object
        $smtp = new SMTP($smtp_server, 25, NULL, $smtp_acc, $smtp_pass);
        // set email headers
        $smtp->set('Content-type', 'text/html; charset=UTF-8'); // email will be rendered as html content
        $smtp->set('From', 'info@kelaskoding.com');
        $smtp->set('To', $email);
        $smtp->set('Subject', 'Selamat datang di kelas: '.$courseName);
      
        // send email message
        $smtp_msg = 'Halo ' . $name . ',<br/><p>Selamat datang di kelas <a href="'.$domain.'/kelassaya/belajar/'.$courseId.'">'. $courseName .'</a><br/>'
                . 'Cara yang paling efektif untuk mengikuti kelas ini adalah dengan melihat video tutorial<br/>'
                . 'dalam kelas ini satu demi satu secara berurutan dan langsung mempraktekan menulis kode program<br/>'
                . 'yang ada. Jika ada pertanyaan silahkan ajukan pertanyaan melalui kolom diskusi pada bagian bawah dari <br/>'
                . 'halaman kelas ini. Sangat disarankan untuk mencoba menjawab pertanyaan siswa lainnya. Terkadang hal ini<br/>'
                . 'justru menambah pengalaman dan pengetahuan baru.<br/><br/>'              
                . 'Jika anda mengalami kesulitan mengikuti kelas ini silahkan <a href="' . $domain . '/contact">hubungi kami</a></p><br/><br/>'
                . '<a href="'.$domain.'/kelassaya/belajar/'.$courseId.'">Mulai Belajar</a><br/><br/>'
                . 'Selamat Belajar,<br/>'
                . 'KelasKoding.com';
        $smtp->send($smtp_msg);
    }
}