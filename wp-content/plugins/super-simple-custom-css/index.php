<?php
/*
Plugin Name: Super Simple Custom CSS
Plugin URI:
Description: Super Simple Custom CSS wordpress plugin works perfect when user will need to add custom styling to very specific area of the website like All Post, All Page , Specific page, Specific post or sitewide
Version: 1.2
Author: ColoredWeb
Author URI: http://coloredweb.in
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
*/
register_activation_hook( __FILE__, 'cw_custom_css_plugin_create_db' );
function cw_custom_css_plugin_create_db() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'cw_css';
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        type text NOT NULL,
        list text NOT NULL,
        css text NOT NULL,
        UNIQUE KEY id (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

}

add_shortcode('get_all_post_option','cw_get_all_post_option');
    function cw_get_all_post_option($attr=null){
        $posts_id=explode(',', $attr['id']);
        $posts_id=array_filter($posts_id);
        global $wpdb;
        $myrows = $wpdb->get_results( "SELECT ID,post_title FROM $wpdb->posts where post_status='publish' and post_type='post' " );
        $html='';
        foreach ($myrows as $myrow) {
            if( in_array($myrow->ID, $posts_id ) ){
                $html.="<option value='$myrow->ID' selected > $myrow->post_title </option>";
            }else{
                $html.="<option value='$myrow->ID'> $myrow->post_title </option>";
            }

        }
        echo str_replace('"','&quot;',$html);

    }

    add_shortcode('get_all_page_option','cw_get_all_page_option');
    function cw_get_all_page_option($attr=null){
        $posts_id=explode(',', $attr['id']);
        $posts_id=array_filter($posts_id);
        global $wpdb;
        $myrows = $wpdb->get_results( "SELECT ID,post_title FROM $wpdb->posts where post_status='publish' and post_type='page' and post_type!='revision'  " );
        $html='';
        foreach ($myrows as $myrow) {
            if( in_array($myrow->ID, $posts_id ) ){
                $html.="<option value='$myrow->ID' selected > $myrow->post_title </option>";
            }else{
                $html.="<option value='$myrow->ID'> $myrow->post_title </option>";
            }
        }
        echo str_replace('"','&quot;',$html);

    }


function my_custom_admin_head() {
    echo '
    <link rel="stylesheet" href="'.plugins_url( 'chosen.css', __FILE__ ).'">
    ';
}
add_action( 'admin_head', 'my_custom_admin_head' );


add_action('admin_menu', 'cw_custom_css_page');
function cw_custom_css_page(){

    add_menu_page(
        __( 'Super Simple Custom CSS', 'textdomain' ),
        __( 'Super Simple Custom CSS','textdomain' ),
        'manage_options',
        'super_simple_custom_css_slug',
        'cw_custom_css_callback',
        ''
    );
}

function filter_in($str){
	$str=str_replace('"',"'",$str);
	return $str;
}
function filter_out($str){
	return $str;
}


function cw_custom_css_callback(){
    global $wpdb;
    ?>

  <style type="text/css">
        div#tabs {
            width: 100%;
            display: flex;
            margin: 10px;
            padding: 9px 5px 5px 5px;
        }
        div#tabs li {
            float: left;
            background: #56c9d6;
            margin-right: 10px;
            padding: 10px 10px 10px 10px;
            color: white;
            list-style-type: none;
            font-size: 15px;
            cursor: pointer;
            border-radius: 3px;
            box-shadow: 1px 1px 1px gray;
        }
        li.t_selected {
            background: black !important;
        }
        .chosen-container {
    width: 50% !Important;
    margin-bottom: 10px;
}
ul.chosen-choices {
    border: 1px solid #ddd !important;
}
.add_c_button {
    border: 0px;
    padding: 10px 25px 10px 20px;
    background: black;
    color: white;
    font-weight: bold;
    border-radius: 3px;
    box-shadow: 2px 2px 2px gray;
    cursor: pointer;
}
    </style>
    <?php
      if(isset($_POST['cw_add_css'])){
        $wpdb->get_results( "TRUNCATE TABLE ".$wpdb->prefix."cw_css " );

		require_once('class.csstidy.php');
		$css = new csstidy();

		$css->set_cfg('remove_last_;',TRUE);
		$css->parse( sanitize_text_field( filter_in($_POST['cw_css_all_place']) ) );
		$all_css=stripslashes_deep($css->print->formatted());
        $all_css=implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $all_css ) ) ) ;

        $wpdb->insert($wpdb->prefix.'cw_css', array(
                        'type'  => 'All',
                        'css'   =>  $all_css
                        ));

		$css->set_cfg('remove_last_;',TRUE);
		$css->parse( sanitize_text_field(filter_in($_POST['cw_css_all_post'])) );
		$all_post=stripslashes_deep($css->print->formatted());
        $all_post=implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $all_post ) ) ) ;
        $wpdb->insert($wpdb->prefix.'cw_css', array(
                        'type'  => 'All Post',
                        'css'   => $all_post
                        ));

		$css->set_cfg('remove_last_;',TRUE);
		$css->parse( sanitize_text_field(filter_in($_POST['cw_css_all_page'])) );
		$all_page=stripslashes_deep($css->print->formatted());
        $all_page=implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $all_page ) ) ) ;
        $wpdb->insert($wpdb->prefix.'cw_css', array(
                        'type'  => 'All Page',
                        'css'   => $all_page
                        ));

		if(isset($_POST['cw_css_sp_post'])){
			for ($i=0; $i <count($_POST['cw_css_sp_post']) ; $i++) {
				 $s_p_d=sanitize_text_field(implode(',',$_POST['cw_css_sp_post'][$i]));
				 if($s_p_d!=''){
					$css->set_cfg('remove_last_;',TRUE);
					$css->parse( sanitize_text_field(filter_in($_POST['cw_css_box_sp_post'][$i])) );
					$sp_post=stripslashes_deep($css->print->formatted());
					$sp_post=implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $sp_post ) ) );
					$wpdb->insert($wpdb->prefix.'cw_css', array(
								   'type'  => 'Specific Post',
								   'list'  => $s_p_d,
								   'css'   => $sp_post
								   ));
				 }
			   }
		}

		if(isset($_POST['cw_css_sp_page'])){
		   for ($i=0; $i <count($_POST['cw_css_sp_page']) ; $i++) {
				$s_p_d=sanitize_text_field(implode(',',$_POST['cw_css_sp_page'][$i]));
				if($s_p_d!=''){
					$css->set_cfg('remove_last_;',TRUE);
					$css->parse( filter_in(sanitize_text_field($_POST['cw_css_box_sp_page'][$i])) );
					$sp_page=stripslashes_deep($css->print->formatted());
					$sp_page=implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $sp_page ) ) ) ;
					$wpdb->insert($wpdb->prefix.'cw_css', array(
								'type'  => 'Specific Page',
								'list'  => $s_p_d,
								'css'   => $sp_page
								));
			 }
		   }
		}


      }
      $results = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cw_css where type="All" or type="All Post" or type="All Page" ');
      $results1 = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cw_css where type="Specific Post" ');
      $results2 = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cw_css where type="Specific Page" ');

     ?>
     <h1>Super Simple Custom CSS Setting</h1>
 <form method='post'>
    <div id='tabs'>
        <li id='tab_1' class='t_selected'><div>Sitewide</div></li>
        <li id='tab_2'><div>All Post</div></li>
        <li id='tab_3'><div>All Page</div></li>
        <li id='tab_4'><div>Specific Post</div></li>
        <li id='tab_5'><div>Specific page</div></li>
    </div>
    <div id='tabs_con'>
        <div id='tab_1_con' class="tab_con" style='margin: 10px;' >
            <h3>Sitewide CSS Box</h3><br>
            <textarea style="width:50%;" name='cw_css_all_place' rows='10'><?php echo esc_textarea(isset($results[0]) ? html_entity_decode(filter_out($results[0]->css)) : ''); ?></textarea>
        </div>
        <div id='tab_2_con' class="tab_con" style='margin: 10px;display:none;' >
            <h3>All Post CSS Box</h3><br>
            <textarea style="width:50%;" name='cw_css_all_post'  rows='10'><?php echo esc_textarea(isset($results[1]) ? html_entity_decode(filter_out($results[1]->css)) : ''); ?></textarea>
        </div>
        <div id='tab_3_con' class="tab_con" style='margin: 10px;display:none;' >
            <h3>All Page CSS Box</h3><br>
            <textarea style="width:50%;" name='cw_css_all_page'  rows='10'><?php echo esc_textarea(isset($results[2]) ? html_entity_decode(filter_out($results[2]->css)) : ''); ?></textarea>
        </div>
        <div id='tab_4_con' class="tab_con" style='margin: 10px;display:none;' >
            <h3>Specific Post CSS Box</h3><br>
            <div><button class='add_c_button' id='add_om_po_cs'>Add One More</button></div><br>
            <?php
            $j=0;
            foreach ($results1 as $c_p) {
              ?>
              <select name='cw_css_sp_post[<?php echo $j ?>][]' style="width: 50%;" data-placeholder='Select Specific Post...' class='chosen-select' multiple  tabindex='4'>
                  <?php echo do_shortcode('[get_all_post_option id="'.$c_p->list.'"]'); ?>
              </select><br>
              <textarea name='cw_css_box_sp_post[<?php echo $j ?>]' style="width:50%;" rows='10' placeholder="Add Css"><?php echo html_entity_decode(filter_out(esc_textarea($c_p->css))); ?></textarea><br><hr>
              <?php
              $j++;
            }
            ?>
            <select name='cw_css_sp_post[<?php echo $j ?>][]' style="width: 50%;" data-placeholder='Select Specific Post...' class='chosen-select' multiple  tabindex='4'>
                <?php echo do_shortcode('[get_all_post_option id=""]'); ?>
            </select><br>
            <textarea name='cw_css_box_sp_post[<?php echo $j ?>]' style="width:50%;" rows='10' placeholder="Add Css"></textarea><br>

        </div>
        <div id='tab_5_con' class="tab_con" style='margin: 10px;display:none;' >
            <h3>Specific page</h3><br>
            <div><button class='add_c_button' id='add_om_pa_cs'>Add One More</button></div><br>
            <?php
            $k=0;
            foreach ($results2 as $cp) {
              ?>
              <select name='cw_css_sp_page[<?php echo $k ?>][]' style="width: 50%;" data-placeholder='Select Specific Page...' class='chosen-select' multiple  tabindex='4'>
                  <?php echo do_shortcode('[get_all_page_option id="'.$cp->list.'"]'); ?>
              </select><br>
              <textarea name='cw_css_box_sp_page[<?php echo $k ?>]' style="width:50%;" rows='10' placeholder="Add Css"><?php echo html_entity_decode(filter_out(esc_textarea($cp->css))) ?></textarea><br><hr>
              <?php
              $k++;
            }
            ?>
            <select name='cw_css_sp_page[<?php echo $k ?>][]' style="width: 50%;" data-placeholder='Select Specific Page...' class='chosen-select' multiple  tabindex='4'>
                <?php echo do_shortcode('[get_all_page_option id=""]'); ?>
            </select><br>
            <textarea name='cw_css_box_sp_page[<?php echo $k ?>]' style="width:50%;" rows='10' placeholder="Add Css"></textarea><br>
        </div>
    </div>
    <div style="    padding-left: 9px;
    padding-bottom: 7px;
    color: red;"><span style="color:black;">Note:</span> Don't include style tag in css</div>
    <input type="submit" name='cw_add_css' style="    background: #0b9e79;
    padding: 10px 25px 9px 25px;
    border-radius: 3px;
    color: white;
    font-weight: bold;
    box-shadow: 2px 2px 4px black;
    margin-left: 10px;
    cursor: pointer;
    border: 0px;">
</form>


    <script>
        jQuery(document).ready(function($) {

            var c_p_c=<?php echo $j+1; ?>;
            $('#tabs_con').on('click', '#add_om_po_cs', function(){
              $("#tab_4_con").append("<hr><select name='cw_css_sp_post["+c_p_c+"][]' style='width: 50%;' data-placeholder='Select Specific Post...' id='post_abccc_"+c_p_c+"' multiple  tabindex='4'><?php echo do_shortcode('[get_all_post_option id="0"]'); ?></select><br><textarea name='cw_css_box_sp_post["+c_p_c+"]'  style='width:50%;' rows='10' placeholder='Add Css'></textarea><br>");
              $("#post_abccc_"+c_p_c).chosen();
              c_p_c++;
              return false;
            });

            var c_pa_c=<?php echo $k+1; ?>;
            $('#tabs_con').on('click', '#add_om_pa_cs', function(){
              $("#tab_5_con").append("<hr><select name='cw_css_sp_page["+c_pa_c+"][]' style='width: 50%;' data-placeholder='Select Specific Page...' id='page_abccc_"+c_pa_c+"' multiple  tabindex='4'><?php echo do_shortcode('[get_all_page_option id="0"]'); ?></select><br><textarea name='cw_css_box_sp_page["+c_pa_c+"]'  style='width:50%;' rows='10' placeholder='Add Css'></textarea><br>");
              $("#page_abccc_"+c_pa_c).chosen();
              c_pa_c++;
              return false;
            });

            $("div#tabs li").click(function() {
                $("div#tabs li").removeClass("t_selected");
                $(this).addClass("t_selected");
                $("div#tabs_con .tab_con").css('display','none');
                var cl=$(this).attr('id');
                console.log(cl);
                $("#"+cl+"_con").show();
            });

            $("select").change(function () {
                var id= $(this).attr('data-id') ;

                if( $(this).val()=='All Post' || $(this).val()=='All Page' ){
                    $("#cw_css_sp_post_"+id+"_chosen").hide();
                    $("#cw_css_sp_page_"+id+"_chosen").hide();
                }
                if( $(this).val()=='Specific Post' ){
                    $("#cw_css_sp_post_"+id+"_chosen").show();
                    $("#cw_css_sp_page_"+id+"_chosen").hide();
                }
                if( $(this).val()=='Specific Page' ){
                    $("#cw_css_sp_post_"+id+"_chosen").hide();
                    $("#cw_css_sp_page_"+id+"_chosen").show();
                }

            })


        })
    </script>
    <?php
}



function cw_sscc_admin_footer() {
    echo '<script src="'.plugins_url( "chosen.jquery.js", __FILE__ ).'" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(".chosen-select").chosen()
    </script>
  ';
}
add_action( 'admin_footer', 'cw_sscc_admin_footer' );

add_action('wp_head','hook_css');
function hook_css() {
    global $wpdb;
    $html='';

    $html.=get_post_meta(get_the_ID(),'cw_css_c_post',true);

    $results = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cw_css where type="All" ');
    if(isset($results[0]->css)){
      $html.=filter_out($results[0]->css);
    }

    if( is_single() ){
        $results_all = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cw_css where type="All Post" ');
        foreach ($results_all as $res) {
            $html.=html_entity_decode(filter_out($res->css));
        }
        $results_s = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cw_css where type="Specific Post" ');
        foreach ($results_s as $r_s) {
            $ids=explode(',', $r_s->list );
            $ids=array_filter($ids);
            if( in_array( get_the_ID () , $ids) ){
                $html.=html_entity_decode(filter_out($r_s->css));
            }

        }

    }
    if( is_page() ){
        $results_all = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cw_css where type="All Page" ');
        foreach ($results_all as $res) {
            $html.=html_entity_decode(filter_out($res->css));
        }
        $results_s = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'cw_css where type="Specific Page" ');
        foreach ($results_s as $r_s) {
            $ids=explode(',', $r_s->list );
            $ids=array_filter($ids);
            if( in_array( get_the_ID () , $ids) ){
                $html.=html_entity_decode(filter_out($r_s->css));
            }

        }
    }
    echo "<style id='cw_css' >".html_entity_decode(filter_out($html))."</style>";

}


function cw_css_register_meta_boxes() {
    add_meta_box( 'cw_css_id', __( 'Super Simple Custom CSS', 'textdomain' ), 'cw_css_function_callback', 'post' );
}
add_action( 'add_meta_boxes', 'cw_css_register_meta_boxes' );

function cw_css_register_meta_boxes1() {
    add_meta_box( 'cw_css_id', __( 'Super Simple Custom CSS', 'textdomain' ), 'cw_css_function_callback', 'page' );
}
add_action( 'add_meta_boxes', 'cw_css_register_meta_boxes1' );

function cw_css_function_callback( $post ) {
  ?>
  <textarea placeholder="Add css here" rows='8' style="width:100%" name="cw_css_c_post"><?php echo filter_out(esc_textarea(get_post_meta($post->ID,'cw_css_c_post',true))); ?></textarea>
  <?php
}


function cw_css_save_meta_box( $post_id ) {
	if(isset($_POST['cw_css_c_post'])){
	require_once('class.csstidy.php');
	$css = new csstidy();
	$css->set_cfg('remove_last_;',TRUE);
	$css->parse( (sanitize_text_field(filter_in($_POST['cw_css_c_post']))) );
	$css_c=stripslashes_deep($css->print->formatted());
	$css_c=implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $css_c ) ) ) ;
	update_post_meta($post_id,'cw_css_c_post',$css_c);
	}
}
add_action( 'save_post', 'cw_css_save_meta_box' );

?>