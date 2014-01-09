<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);
class Main extends CI_Controller {

	public function index()
	{
            $this->load->library('notifications');
            
            //echo $this->notifications->display_html(false);
                $sub_views = array(
                    'left_content'=>'view_parts/status_list',
                    'right_content'=>'view_parts/sidebar_frontpage'
                    );
		$this->load->view('master_view',$sub_views);
	}
        function noti() {
            $this->load->library('notifications');
            $this->notifications->notify('blast has commented on you post:','1','1');
        }
        function view_notifications() {
            error_reporting(E_ALL);
            
            $user_id = get_logged_in_user_id();
            $noti = $this->notifications->get_notifications($user_id);
          
            $data = array(
                'noti'=>$noti,
            );
            $this->load->view('view_parts/view_noti',$data);
        }
        function sendmsg() {
            $this->load->library('mahana_messaging');
            $this->mahana_messaging->send_new_message(1,2,'hello','hi, whats up',1);
        }
        function msg() {
            $this->load->library('mahana_messaging');
            $msg = $this->mahana_messaging->get_all_threads(1,true);
            echo '<pre>';
                print_r($msg);
            echo '</pre>';
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
