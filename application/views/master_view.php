<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="<?=base_url()?>style/bubble.css">
<link rel="stylesheet" href="<?=base_url()?>style/style.css">
<script type="text/javascript" src="<?=base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
<script src="<?=base_url()?>js/jquery.tabSlideOut.v1.3-test.js"></script>
<script src="<?=base_url()?>js/avro-v1.1.4.min.js"></script>



<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?=base_url()?>js/thickbox/thickbox-compressed.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>js/thickbox/thickbox.css" media="screen" />



        
<script>
     var share_image = "<?=get_image_url('arrow.jpg')?>";
     var base_url = "<?=base_url()?>";
</script>
<script src="<?=base_url()?>js/functions.js"></script>
</head>

<body>
<div class="container">
	<div class="header" id="header">
        <?=$this->load->view('view_parts/header')?>
    </div>
<div class="page_contents">
        <div class="left_content" >
 
            <!------------->
        <?=$this->load->view($left_content)?>
            <!------------->            
                        
       </div>
            

            
         
       <div class="right_content">
        <?=$this->load->view($right_content)?>
        </div>         
    </div>
    <div style="clear:both"></div>
	
    <div class="status_footer" id="status_footer" >
        <?=$this->load->view('view_parts/share')?>
    </div>
</div>
</body>
</html>
