<div id="status_list">
    <?
    $status = get_status();
    foreach ($status as $s){
        
                $s_info = array(
                    'id'=>$s->id,
                    'user_id'=>$s->user_id,
                    'status'=>$s->status,
                    'type'=>$s->type,
                    'date'=>$s->date
                );
    ?>
            <?=$this->load->view('view_parts/status_template',$s_info)?>
    <?
    }
    ?>
</div>