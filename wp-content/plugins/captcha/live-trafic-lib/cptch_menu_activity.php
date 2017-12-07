<style>
#wpcontent{ background:#F1F1F1}
.live-traffic-black{ margin-top:20px; margin-bottom:20px}
.filter-blacklistips{ border:1px solid #ccc; padding:20px; background:#fff}
.wfActEvent:hover{ background:#DEF0D8}
#live-traffic-legend ul li{ float:left; padding:5px 10px}
#live-traffic-legend ul li.wfHuman:before{ background:#16BC9B}
#live-traffic-legend ul li.wfNotice:before{ background:#FFD10A}
#live-traffic-legend ul li.wfBlocked:before{ background:#D03935}
#live-traffic-legend ul li:before{ content: ''; display: block; float: left; margin: 7px 6px 0 0; width: 12px; height: 12px; background-color: #CCCCCC;}
.wf-add-bottom-small{ border:1px solid #ccc; background:#fff; padding:4px 20px;margin-bottom:10px}
.wfActEvent{ border-top:1px solid #ccc; padding:10px; border-left:5px solid #30B5E1}
.blacklist-form{ margin-bottom:10px}
.traffic-head{ float: left; font-size: 16px; margin-top: 5px; margin-right: 10px;}
.wfActEvent div{ font-size:14px;}
.wfActEvent a{ font-size:14px}
.wfActEvent span{ font-size:13px}
.mred{ color:#FF0000}
.mgreen{ color:#00CC99}
</style>
<?php
global $wpdb;
$table = 'cptch_track_visitor';
$myrows = $wpdb->get_results("select * from ". $wpdb->prefix . $table ." order by id desc limit 0, 20 ");
$num = $wpdb->num_rows;
?>

<div class="container-fluid live-traffic-black">
		<div class="wf-row" style="flex-direction:row-reverse">
				<div id="wordfenceRightRail" class="hidden-xs wf-col-sm-push-9 wf-col-sm-3"> 
		<ul>
			<li><a href="#" target="_blank" rel="noopener noreferrer"><img src="<?php echo plugin_dir_url(__file__ );?>/images/rr_premium.png" alt=""></a></li>
			<li><a href="#" target="_blank" rel="noopener noreferrer"><img src="<?php echo plugin_dir_url(__file__ );?>/images/rr_sitecleaning.jpg" alt=""></a></li> 
		</ul>
	</div>
    
    
    
				<div class="wf-col-xs-12 wf-col-sm-9 wf-col-sm-pull-3">
							
				<div class="row filter-blacklistips">
					<div class="wf-col-xs-12">
						<div id="wf-live-traffic" class="wfTabsContainer">
							<form data-bind="submit: reloadListings" class="blacklist-form">
							</form>
				
							<div border="0" style="width: 100%"></div>
				<div id="my_wrapper" >
							<?php if($num > 0){?>
                            <?php foreach($myrows as $row){
							
							$count1 = $wpdb->get_var("select count(*) from {$wpdb->prefix}cptch_track_countries where name = '".esc_html($row->country)."' and status = 0 ");
							$cid = $wpdb->get_var("select id from {$wpdb->prefix}cptch_track_countries where name = '".esc_html($row->country)."' ");
							
							if($count1>0)
							{
								$myip = $row->ip_address;
								block_this_ip($myip); // block this ip because its country is in black list 
							}
							
							
							
							
							$count = $wpdb->get_var("select count(*) from {$wpdb->prefix}cptch_blacklist_ip where ip = '".$row->ip_address."' ");
							
							
							if($count > 0 || $count1 > 0)
							{
								$class = 'mred';
							}
							else
							{
								$class = 'mgreen';
							}
							
							
							 ?>
                            
                            	<div >
								<div id="" >
									
                                    
                                    <div  class="wfActEvent wfHuman">
										
                                        <div>
													
														<img  width="16" height="11" class="wfFlag" src="<?php echo plugin_dir_url(__file__ );?>/images/flags/<?php echo strtolower($row->country_code);?>.png" alt="<?php echo $row->country;?>" title="<?php echo $row->country;?>">
														
                                                        
                                                        
                                                        <a target="_blank" rel="noopener noreferrer" href="http://maps.google.com/maps?q=<?php echo $row->location; ?>&amp;z=6"><?php if($row->city == 'Delhi'){echo "New Delhi";}else {echo $row->city; }?> , <?php echo $row->country;?>  </a>visited
                                                            
													</span>
													
                                                    
                                                    
                                                   
												<?php
													$cur_time = date_i18n('Y-m-d H:i:s');
                                                    $a = date_i18n('Y-m-d H:i:s',strtotime($row->add_time));
                                                    $b = strtotime($a);
													$c = strtotime($cur_time);
													$d = $c-$b;
													
													$mtime = cptch_convert_seconds($d);
													$time_arr = explode(',',$mtime);
													$str = '';
													
													if(trim($time_arr[0])!= '0')
													{
														$str = $time_arr[0]."	days	";
													}
													if(trim($time_arr[1])!= '0')
													{
														$str .= $time_arr[1]."	hours	";
													}
													if(trim($time_arr[2])!= '0')
													{
														$str .= $time_arr[2]."	minute	";
													}
													if(trim($time_arr[3])!= '0')
													{
														$str .= $time_arr[3]."	seconds";
													}													
													
													$myclass = str_replace('.','',$row->ip_address);
                                                 ?>                            
                                                                            
													
                                                    <a class="wf-lt-url wf-split-word-xs myurl<?php echo $myclass;?>  <?php echo $class;?> visit_linkx "  target="_blank" rel="noopener noreferrer" href="<?php echo $row->requested_url; ?>" title="<?php echo $row->requested_url;?>"><?php echo $row->requested_url;?></a>
										</div>
										
                                        <div>
											<span  class="wfTimeAgo wfTimeAgo-timestamp" data-timestamp="<?php echo $d; ?>"><?php echo date_i18n('m/d/Y h:i:s A',strtotime($row->add_time));  ?>(<?php echo $str;?> before)</span>&nbsp;&nbsp;
													<strong>IP:</strong> <?php echo $row->ip_address; ?>
														
													</span>
													&nbsp;
													<span class="wfReverseLookup"><strong>Hostname:	</strong><?php echo $row->hostname;?></span>
										</div>
			
											<div>
													<strong>Browser:</strong>
													<span><?php echo $row->user_browser;?></span>
											</div>
												<div style="color: #000;"><?php echo $row->user_agent; ?></div>
											<div>
											
                                            <?php 
											if($count>0)
											{
												$txt = "UnBlock this IP";
												$val = 0;
											}
											else
											{
												$txt = "Block this IP";
												$val = 1;
											}
											
											
											
											?>		
                                            <?php if($count1 == 0){?>
														<a href="javascript:void(0);" onclick="cptch_call_it('<?php echo $row->ip_address;?>' , '<?php echo $myclass;?>');" data-id="<?php echo $val;?>" class="btn btn-default btn-sm mybtn btn<?php echo $myclass;?>" id="" role="button" >
															<?php echo $txt; ?>
														</a>
                                             <?php }?>          
                                                        
                                                        <?php if($count1 > 0){?>
                                                        <a href="javascript:void(0);" onclick="cptch_unblock_country('<?php echo $cid;?>');" data-id="" class="btn btn-default btn-sm blockcountry" id="" role="button" >
															<?php echo "UnBlock this Country"; ?>
														</a>
														<?php }else{?>
                                                        <a href="javascript:void(0);" onclick="cptch_block_country('<?php echo $cid;?>');" data-id="" class="btn btn-default btn-sm blockcountry" id="" role="button" >
															<?php echo "Block this Country"; ?>
														</a>
														<?php }?>
                                                        
                                                        
													</span>
													<span data-bind="if: action() == 'blocked:waf'"></span>
											</div>
									</div>
								</div>
							</div>
                            <?php }}?>
                            
					</div>                            
							<div data-bind="if: !listings"></div>
						</div>
					</div>
				</div>
                
			</div>
		</div>
	</div>
    <input type="hidden" value="2" name="page" id="page"  />
	<script>
    jQuery(window).scroll(function() { //detact scroll
            if(jQuery(window).scrollTop() + jQuery(window).height() >= jQuery(document).height()){ //scrolled to bottom of the page
                
				cptch_get_data_ajax();
            }
        }); 
		
	//Ajax load function
    function cptch_get_data_ajax(){
       
	   var page = jQuery("#page").val();
		
		
		 var data = {
			'action': 'cptch_get_traffic_record',
			'page': page
		};
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			//alert(response);
			page = parseInt(page)+1;
			jQuery("#page").val(page);
			
			jQuery('#my_wrapper').append(response);
		});
    }	 
	
    
    </script>
	
	
	<script>
	// block country
	function cptch_block_country(cid)
	{
		if(cid == '')
		{
			alert("Country id is empty !");
			return false;
		}
		if(cid != '')
		{
			var data = {
			'action': 'cptch_block_country',
			'cid': cid,
			};
			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			jQuery.post(ajaxurl, data, function(response) {
				
				if(response == 1)
				{
					window.location.reload();
					return true;
				}
				else if(response == 0)
				{
					alert("Country not blocked . Please try again");
					return false;
				}	
				
			});
		
		}
		
	}
	
	// UnBlock Country
	function cptch_unblock_country(cid)
	{
		if(cid == '')
		{
			alert("Country id is empty !");
			return false;
		}
		if(cid != '')
		{
			var data = {
			'action': 'cptch_unblock_country',
			'cid': cid,
			};
			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			jQuery.post(ajaxurl, data, function(response) {
				
				if(response == 1)
				{
					window.location.reload();
					return true;
				}
				else if(response == 0)
				{
					alert("Country not unblocked . Please try again");
					return false;
				}	
				
			});
		
		}
		
	}
	
	function cptch_call_it(ip  , cls)
	{
		
		var val = jQuery('.btn'+cls).attr('data-id');
		if(val == 1)
		{
			cptch_blockip(ip , cls);
		}
		else if(val == 0)
		{
			cptch_unblockip(ip , cls);
		}
	}
	
	
	function cptch_blockip(ip , cls)
	{
		var data = {
			'action': 'cptch_block_ip',
			'ip': ip
		};
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			if(response == 1)
			{
				jQuery('.btn'+cls).html("Unblock this IP ");
				jQuery('.myurl'+cls).removeClass('mgreen');
				jQuery('.myurl'+cls).addClass('mred');
				jQuery('.btn'+cls).attr('data-id','0');
				return true;
			}
			else if(response == 2 )
			{
				alert("This ip allready blocked .");
				return false;
			}
			else if(response == 3 )
			{
				alert("Can't block self IP  .");
				return false;
			}
			
		});
	}
	
	
	function cptch_unblockip(ip , cls)
	{
		var data = {
			'action': 'cptch_unblock_ip',
			'ip': ip
		};
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			
			if(response == 1)
			{
				jQuery('.btn'+cls).html("Block this IP ");
				jQuery('.myurl'+cls).removeClass('mred');
				jQuery('.myurl'+cls).addClass('mgreen');
				jQuery('.btn'+cls).attr('data-id','1');
				return true;
			}
		});
	}
    
    </script>
    