<?php

class PaymentCallbackController {

    protected $f3;
    protected $db;    

    function __construct() {
        $f3 = Base::instance();
        $dbh = new DB\SQL($f3->get('db_dns') . $f3->get('db_name'), $f3->get('db_user'), $f3->get('db_pass'));       
        $this->f3 = $f3;
        $this->db = $dbh;       
    }

    
    function doCallback(){
        Veritrans_Config::$isProduction = true;
        Veritrans_Config::$serverKey = $this->f3->get('serverKey');

        $notif = new Veritrans_Notification();
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $post = json_decode($this->f3->get('BODY'), true);

        $memberCourse = new MemberCourse($this->db);
        $memberCourse->load(array('id=?',$order_id));

        if ($transaction == 'capture') {
          // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card'){                
                if($fraud == 'challenge'){
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    //echo "Transaction order_id: " . $order_id ." is challenged by FDS";
                    $memberCourse->status = 'Challenged';
                }else {
                    // TODO set payment status in merchant's database to 'Success'
                    //echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                    $memberCourse->status = 'Success';
                }                
            }
        }else if ($transaction == 'settlement'){
          // TODO set payment status in merchant's database to 'Settlement'
         //echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
         $memberCourse->status = 'Success';
        }else if($transaction == 'pending'){
          // TODO set payment status in merchant's database to 'Pending'
         // echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
         $memberCourse->status = 'Pending';
        }else if ($transaction == 'deny') {
          // TODO set payment status in merchant's database to 'Denied'
          //echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
          $memberCourse->status = 'Denied';
        }else if ($transaction == 'expire') {
          // TODO set payment status in merchant's database to 'expire'
          //echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
          $memberCourse->status = 'Expire';
        }else if ($transaction == 'cancel') {
          // TODO set payment status in merchant's database to 'Denied'
         // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
         $memberCourse->status = 'Denied';
        }
        $memberCourse->payment_type = $type;
        $memberCourse->save();        
    }
}