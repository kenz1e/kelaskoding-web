<?php

class KelasSayaController extends RestrictedController {

    function index() {             
        $member = $this->f3->get('SESSION.member');
        $courses = $this->db->exec(
                'select tmember_course.course_id as id, tcourse.name,tcourse.thumbnail,' . 
                'tcourse.duration,tcourse.keyword from tmember_course Inner join tcourse '.
                'on tmember_course.course_id = tcourse.id where tmember_course.member_id=? and '.
                'tmember_course.status="Success"',$member['id']);
        $this->f3->set('courses',$courses);
        $this->f3->set('view', 'page/kelassaya.html');
    }

    function belajar(){
        $courseId = $this->f3->get('PARAMS.courseId');      
        $member = $this->f3->get('SESSION.member');
        $memberCourse = new MemberCourse($this->db);       
        $this->f3->set('course',$memberCourse->load(array('course_id=? and member_id=? and status=?',$courseId,$member['id'],'Success')));   
        if(!$memberCourse->dry()){ 
            $course = new Course($this->db);
            $items = new Item($this->db);
            $comments = $this->db->exec('select tcomment.id, tmember.fullname, tcomment.comments_date, '.
                                'tcomment.comments from tcomment inner join tmember on ' .
                                'tcomment.member_id = tmember.id where tcomment.course_id=? and tcomment.status=1 order by tcomment.id desc',$courseId);
            $this->f3->set('course', $course->load(array('id=?',$courseId)));
            $this->f3->set('items', $items->find("course_id=$courseId"));              
            $this->f3->set('comments',$comments);
            $this->f3->set('ESCAPE', FALSE);  
            $this->f3->set('view', 'page/belajar.html');
        }else{
            $this->f3->reroute("/detail/$courseId");
        }
    }

    function play(){
        $courseId = $this->f3->get('PARAMS.courseId'); 
        $itemId = $this->f3->get('PARAMS.itemId'); 
        $member = $this->f3->get('SESSION.member');
        $memberCourse = new MemberCourse($this->db); 
        $this->f3->set('course',$memberCourse->load(array('course_id=? and member_id=? and status=?',$courseId,$member['id'],'Success'))); 
        if(!$memberCourse->dry()){ 
            $course = new Course($this->db);
            $items = new Item($this->db);
            $comments = $this->db->exec('select tcomment.id, tmember.fullname, tcomment.comments_date, '.
            'tcomment.comments from tcomment inner join tmember on ' .
            'tcomment.member_id = tmember.id where tcomment.course_id=? and tcomment.status=1 order by tcomment.id desc',$courseId);
            $this->f3->set('course', $course->load(array('id=?',$courseId)));
            $this->f3->set('items', $items->find("course_id=$courseId"));  
            $this->f3->set('selectedItem',$items->load(array('id=?',$itemId)));
            $this->f3->set('comments',$comments);
            $this->f3->set('ESCAPE', FALSE);  
            $this->f3->set('view', 'page/belajar.html'); 
        }else{
            $this->f3->reroute("/detail/$courseId");
        }
    }

}