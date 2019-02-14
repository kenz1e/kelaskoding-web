<?php

class CommentController extends RestrictedController {

    function submit(){
        $courseId = $this->f3->get('POST.courseId');
        $itemId = $this->f3->get('POST.itemId');
        $comments = $this->f3->get('POST.comments');
        $captcha = $this->f3->get('POST.captcha');

        $v = new Valitron\Validator(array('Course ID' => $courseId,'Pertanyaan'=>$comments,'Kode Keamanan'=> $captcha));
        $v->rule('required', ['Course ID','Pertanyaan','Kode Keamanan']);         
        
        if ($v->validate()) {
            $captcha_code = $this->f3->get('SESSION.captcha_code');
            if ($captcha === $captcha_code) {
                $member = $this->f3->get('SESSION.member');
                $memberCourse = new MemberCourse($this->db);
                $memberCourse->load(array('course_id=? and member_id=? and status=?',$courseId,$member['id'],'Success'));
                if(!$memberCourse->dry()){
                    $comment = new Comment($this->db);
                    $comment->member_id = $member['id'];
                    $comment->course_id = $courseId;
                    $comment->comments = $comments;
                    $comment->comments_date = date('Y-m-d H:i:s');
                    $comment->status = 1;
                    $comment->save();
                }
            }else{
                $flash = array(
                    'errorType' => 'Error(s)',
                    'errors' => array(array('Kode keamanan salah, silahkan coba lagi')),
                    'comments'=> $comments              
                );
                $this->f3->set('SESSION.flash', $flash);    
            }
        }else{
            $flash = array(
                'errorType' => 'Error(s)',
                'errors' => $v->errors(),
                'comments'=> $comments
            );
            $this->f3->set('SESSION.flash', $flash);     
        }
        if($itemId){
            $this->f3->reroute("/kelassaya/play/$courseId/$itemId");
        }else{
            $this->f3->reroute("/kelassaya/belajar/$courseId");
        }       
    }
}