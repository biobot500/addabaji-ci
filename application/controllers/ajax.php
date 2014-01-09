<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);
class Ajax extends CI_Controller {

	function index()
	{
	}
        function insert_status()
        {
            insert_status();
            $return = json_encode(array('status'=>'true'));
            echo $return;
        }
        function get_status()
        {
            error_reporting(0);
            $status = get_status();
            foreach($status as $row) {
                $data = array(
                    'id'=>$row->id,
                    'user_id'=>$row->user_id,
                    'status'=>$row->status,
                    'type'=>$row->type,
                    'date'=>$row->date
                );
                $html .= $this->load->view('view_parts/status_template',$data);
            }
            echo $html;
            
        }
        function get_comments() {
            error_reporting(0);
            $id = $this->uri->segment(3);
            $comments = get_comments($id);

            $data = array('comments'=>$comments,'status_id'=>$id);
            $html = $this->load->view('view_parts/comment_list',$data);

            echo $html;
           
          
        }
        function send_comment() {
            if(count($_POST)>0) {
                $username = get_user_name(get_logged_in_user_id());
                $comment = $_POST['comment'];
                $status_id = $_POST['status_id'];
                $user_id = get_logged_in_user_id();
                $date = date('Y-m-d H:i:s');
                $params = array(
                  'status_id'  => $status_id,
                    'user_id'=>$user_id,
                    'comment'=>$comment,
                    'date'=>$date,
                    'banned'=>'0'
                );
                insert_comment($params);

                $status_info = $this->status->get_status_by_id($status_id);
                if($status_info->user_id==  get_logged_in_user_id()) {
                    $msg = $username.' has replied on post';
                    $all_commented_users = $this->status->get_comments($status_id);
                    $notified_users = "";
                    foreach ($all_commented_users->result() as $row) {
                        if(get_logged_in_user_id ()!=$row->user_id) {
                            $notified_users[] = $row->user_id;
                        }
                    }
                    $notified_users = array_unique($notified_users);
                    foreach($notified_users as $k=>$v) {
                            $this->notifications->notify($msg,$v,$status_id,"comment");
                    }

                } else {
                    $msg = $username.' has commented on your post';
                    $this->notifications->notify($msg,  $status_info->user_id,$status_id,"comment");
                }
                
            }
        }
}