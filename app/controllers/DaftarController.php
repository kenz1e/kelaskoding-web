<?php

class DaftarController extends RestrictedController {

    function daftar(){
        $courseId = $this->f3->get('PARAMS.courseId');        

        $v = new Valitron\Validator(array('ID' => $courseId));
        $v->rule('required', ['ID']);   

        if($v->validate()){         
            $course = new Course($this->db);   
            $course->load(array('id=?',$courseId));
            if(!$course->dry()){
                $member = $this->f3->get('SESSION.member');
                $memberCourse = new MemberCourse($this->db);
                $memberCourse->load(array('course_id=? and member_id=? and status=?',$courseId,$member['id'],'Success'));
                if($memberCourse->dry()){
                    if($course->types==0){//gratis      
                        $memberCourse = new MemberCourse($this->db);
                        $memberCourse->id = $this->millitime();
                        $memberCourse->member_id = $member['id'];
                        $memberCourse->course_id = $course->id;
                        $memberCourse->enroll_date = date('Y-m-d H:i:s');
                        $memberCourse->price = 0;
                        $memberCourse->status= 'Success';
                        $memberCourse->payment_type='Gratis';
                        $memberCourse->save();
                        //kirim email welcome
                        $mail = new Email();
                        $mail->kirimPesanWelcomeKelas($member['email'],$member['fullname'],$course->id,$course->name);
                        $flash = array(
                            'errorType' => 'Success',
                            'infos' => array(array('Selamat pendaftaran kelas berhasil, selamat belajar..'))
                        );             
                        $this->f3->set('SESSION.flash', $flash);
                        $this->f3->reroute('/kelassaya');
                    }else if($course->types==1){//berbayar
                        $this->f3->reroute("/prosesbayar/$courseId");
                    }
                }else{
                    $flash = array(
                        'errorType' => 'Success',
                        'infos' => array(array('Anda sudah terdaftar dikelas ini'))
                    );             
                    $this->f3->set('SESSION.flash', $flash);
                    $this->f3->reroute('/kelassaya');
                }                
            }else{
                $this->f3->reroute('/');
            }
        }else{
            $this->f3->reroute('/');
        }
    }

    function bayar(){
        $courseId = $this->f3->get('PARAMS.courseId');  
        $v = new Valitron\Validator(array('ID' => $courseId));
        $v->rule('required', ['ID']);   

        if($v->validate()){ 
            $course = new Course($this->db);   
            $course->load(array('id=?',$courseId));
            if(!$course->dry()){
                //place order
                $member = $this->f3->get('SESSION.member');
                $orderId = $this->millitime();
                $memberCourse = new MemberCourse($this->db);
                $memberCourse->id = $orderId;
                $memberCourse->member_id = $member['id'];
                $memberCourse->course_id = $course->id;
                $memberCourse->enroll_date = date('Y-m-d H:i:s');
                $memberCourse->price = $course->price;
                $memberCourse->status= 'Waiting for Payment';
                $memberCourse->payment_type='';
                $memberCourse->save();

                // Set your Merchant Server Key
                Veritrans_Config::$serverKey = $this->f3->get('serverKey');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                Veritrans_Config::$isProduction = true;
                // Set sanitization on (default)
                Veritrans_Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                Veritrans_Config::$is3ds = true;

                // Required
                $transaction_details = array(
                    'order_id' => $orderId,
                    'gross_amount' => $course->price, // no decimal allowed for creditcard
                );
                // Optional
                $item_details = array (
                    array(
                        'id' => $course->id,
                        'price' => $course->price,
                        'quantity' => 1,
                        'name' => $course->name
                    ),
                );                             
                $customer_details = array(
                    'first_name'    => $member['fullname'], //optional                    '
                    'email'         => $member['email'], //mandatory
                    'phone'         => $member['phone'] //mandatory                   
                ); 
                // Fill transaction details
                $transaction = array(
                    'transaction_details' => $transaction_details,   
                    'customer_details' => $customer_details,                
                    'item_details' => $item_details
                );

                $snapToken = Veritrans_Snap::getSnapToken($transaction);
                $this->f3->set('course',$course);
                $this->f3->set('snapToken',$snapToken);
                $this->f3->set('view', 'page/bayar.html');
            }else{
                $this->f3->reroute('/');
            }
        }else{
            $this->f3->reroute('/');
        }
    }

    function millitime() {
        $microtime = microtime();
        $comps = explode(' ', $microtime);      
        return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
    }

    function bayarSuccess(){
        $orderId = $this->f3->get('GET.order_id');
        $v = new Valitron\Validator(array('ID' => $orderId));
        $v->rule('required', ['ID']);   

        if($v->validate()){ 
            $member = $this->f3->get('SESSION.member');
            $memberCourse = new MemberCourse($this->db);
            $memberCourse->load(array('id=? and member_id=?',$orderId,$member['id']));
            if(!$memberCourse->dry()){
                if($memberCourse->status=='Success'){
                    $course = new Course($this->db);                    
                    $flash = array(
                        'errorType' => 'Success',
                        'infos' => array(array("Terima kasih, pembayaran anda berhasil"))
                    ); 
                    $this->f3->set('course',$course->load(array('id=?',$memberCourse->course_id)));          
                    $this->f3->set('SESSION.flash', $flash);
                }else{
                    $flash = array(
                        'errorType' => 'Informasi',
                        'errors' => array(array("Terima kasih, pembayaran anda masih berstatus <b>$memberCourse->status</b>, silahkan menyelesaikan pembayaran anda. Untuk petunjuk pembayaran sudah kami kirimkan ke email anda"))                         
                    );
                    $this->f3->set('SESSION.flash', $flash);  
                }       
                $this->f3->set('ESCAPE', FALSE);           
                $this->f3->set('view', 'page/bayar_success.html');
            }else{
                $this->f3->reroute('/');           
            }            
        }else{
            $this->f3->reroute('/');
        }       
    }

    function bayarUnfinish(){
        $this->f3->set('ESCAPE', FALSE);       
        $this->f3->set('view', 'page/bayar_unfinish.html');
    }

    function bayarError(){
        $this->f3->set('ESCAPE', FALSE);       
        $this->f3->set('view', 'page/bayar_error.html');
    }
    
}