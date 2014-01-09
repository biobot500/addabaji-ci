<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);
class User extends CI_Controller {

	public function index()
	{
                $sub_views = array(
                    'left_content'=>'view_parts/status_list',
                    'right_content'=>'view_parts/sidebar_frontpage'
                    );
		$this->load->view('master_view',$sub_views);
	}

	public function update_profile()
	{
            if(count($_POST)>0) {
                update_profile($_POST,  get_logged_in_user_id());
            }

            $sub_views = array(
                'avatar'=>  get_avatar(get_logged_in_user_id()),
                'left_content'=>'view_parts/update_profile',
                'right_content'=>'view_parts/sidebar_frontpage'
                );
            $this->load->view('master_view',$sub_views);
	}
        public function edit_profilepic(){
            //show($_FILES);
                if($_FILES['avatar']['error'] == 0){
                    //upload and update the file
                    $config['upload_path'] = './profile_pic'; // Location to save the image
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = false;
                    $config['remove_spaces'] = true;
                    $config['max_size']   = '100';// in KB // if required, remove the comment and give the size

                    $this->load->library('upload', $config); //codeigniter default function

                    if ( ! $this->upload->do_upload('avatar')){
                        redirect("update_profile"); // redirect  page if the load fails.
                    }
                    else{
                        //Image Resizing
                        $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                        $config['maintain_ratio'] = true;
                        $config['width'] = 400; // image re-size  properties
                        $config['height'] = 400; // image re-size  properties

                        $this->load->library('image_lib', $config); //codeigniter default function

                        if ( ! $this->image_lib->resize()){
                            redirect("update_profile");
                        }

                        $this->avatar->update_profile_pic($this->tank_auth->get_user_id()); // here we are using the tank auth library for user log-in. we are getting the user id and updating the resized image as that particular's avatar.
                        redirect("update_profile");
                    }
                }
                else{
                //show an error  to select a picture before clicking the update pic button
                redirect("update_profile");
                }
            }
            function view_profile() {
                error_reporting(E_ALL);
                $user_id = $this->uri->segment(2);
                //echo $user_id;

                $sub_views = array(
                    'avatar'=>  get_avatar($user_id),
                    'info'=>$this->profile->get_profile($user_id),
                    'status'=>$this->status->get_status_by_userid($user_id),
                    'left_content'=>'view_parts/view_profile',
                    'right_content'=>'view_parts/sidebar_frontpage'
                    );
                $this->load->view('master_view',$sub_views);
            }
            function view_status() {
                $user_id = $this->uri->segment(2);
                $status_id = $this->uri->segment(3);
                //echo $user_id;

                $sub_views = array(
                    'avatar'=>  get_avatar($user_id),
                    'info'=>$this->profile->get_profile($user_id),
                    'status'=>$this->status->get_single_status_by_id($status_id),
                    'left_content'=>'view_parts/view_single_status',
                    'right_content'=>'view_parts/sidebar_frontpage'
                    );
                $this->load->view('master_view',$sub_views);
            }
            function messages() {
                $sub_views = array(
                    'left_content'=>'view_parts/msg_threads',
                    'right_content'=>'view_parts/sidebar_frontpage'
                    );
                $this->load->view('master_view',$sub_views);
            }
            function view_message() {
                $sub_views = array(
                    'thread_id'=>$this->uri->segment(2),
                    'left_content'=>'view_parts/msg_single_thread_view',
                    'right_content'=>'view_parts/sidebar_frontpage'
                    );
                $this->load->view('master_view',$sub_views);
            }
            function send_message() {
                $user_id = $this->uri->segment(2);
                $info = get_profile($user_id);
                $data = array('username'=>  get_user_name($info->user_id),'user_id'=>$info->user_id);
                if(count($_POST)>0) {
                    $this->mahana_messaging->send_new_message(get_logged_in_user_id(),$user_id,$_POST['subject'],$_POST['body'],1);
                    $data['status'] = "Message Sent Successfully";
                    $msg  = "You have a new message";
                    $this->notifications->notify($msg,$user_id,"","message");

                }     
                $this->load->view('view_parts/send_msg_link',$data);
            }
            function send_reply() {
                $msg_id = $this->uri->segment(3);

                
                $msg_info = $this->mahana_messaging->get_message($msg_id,get_logged_in_user_id());

                $sender_id = $msg_info['retval'][0]['sender_id'];
                $data = array(
                  'msg_id'  =>$msg_id,
                );
                if(count($_POST)>0) {
                    
                    $this->mahana_messaging->reply_to_message($msg_id,get_logged_in_user_id(),"",$_POST['body'],1);
                    $data['status'] = "Reply sent successfully.";
                    $msg  = "You have a new message";
                    $this->notifications->notify($msg,$sender_id,"","message");
                }

                $this->load->view('view_parts/send_reply',$data);
            }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */