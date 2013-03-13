<?php @extract($this->lang->language);?>



<div class="postion_r">
      <div id="nav">
        <ul>
        
		
  <li >
  	<a href="<?php echo base_url('flyg');?>" <?php echo ($this->uri->segment(1)=='flyg')? 'class="active"':'';?>><span><?php echo $flight;?></span></a>
  </li>
  <li >
  	<a href="<?php echo base_url('hotell');?>" <?php echo ($this->uri->segment(1)=='hotell')? 'class="active"':'';?>><span><?php echo $hotels;?></span></a>
  </li>
  <li >
  	<a href="<?php echo base_url('hirecar');?>" <?php echo ($this->uri->segment(1)=='hirecar')? 'class="active"':'';?>><span><?php echo $car;?></span></a>
  </li>
  <li>
  	<a href="<?php echo base_url('gruppbokningar');?>" <?php echo ($this->uri->segment(1)=='gruppbokningar')? 'class="active"':'';?>><span>Group bookings</span></a>
  </li>
  
  <li >
  	<a href="<?php echo base_url('omoss');?>" <?php echo ($this->uri->segment(1)=='omoss')? 'class="active"':'';?>><span><?php echo $aboutus;?></span></a>
  </li>
  <li >
  	<a href="<?php echo base_url('villkor');?>" <?php echo ($this->uri->segment(1)=='villkor')? 'class="active"':'';?>><span>terms &sect; conditions</span></a>
  </li>
   <li >
  	<a href="<?php echo base_url('kundtjanst');?>" <?php echo ($this->uri->segment(1)=='kundtjanst')? 'class="active"':'';?>><span>Customer services</span></a>
  </li>
  
		  
        </ul>
      </div>
      <div class="link_right_div">
        <div class="link"> <a href="#">LOG IN</a> <a href="#">REGISTER </a> </div>
        <div class="sccial_icon"><a href="#"><img src="<?php echo base_url('images/youtube.png');?>" alt="" border="0" /></a><a href="#"><img src="<?php echo base_url('images/facebook.png');?>" alt="" border="0" /></a><a href="#"><img src="<?php echo base_url('images/google+.png');?>" alt="" border="0" /></a><a href="#"><img src="<?php echo base_url('images/rss.png');?>" alt="" border="0" /></a><a href="#"><img src="<?php echo base_url('images/twitter.png');?>" alt="" border="0" /></a></div>
      </div>
    </div>
	
	
<div class="white_bg_main">
	