<?php
if ( ! defined( 'ABSPATH' ) ) exit;

wp_verify_nonce( $_POST['meta_box_nonce']);

    		global $post;
			  global $wpdb;
			  $getlead = $wpdb->prefix . "quizleads_tbl";
			  $getTitle = get_the_id();
			  $templates = $wpdb->get_results("SELECT * FROM $getlead " ,ARRAY_A);
	
			  $tpl = get_post_meta($post->ID,'_template',true);
			
				foreach($templates as $template)
				{

				} 
				
        ?>
   <div id="wrapper" >
   	<h3>View Collect Leads:</h3>
   	<table style="width: 700px;margin: 20px 0;">
   		<thead>
   			<tr style="text-align: left; padding-bottom: 10px; border-bottom: 1px solid #ccc;">
   				<th style="text-align: left; padding-bottom: 10px; border-bottom: 1px solid #ccc;">Full Name</th>
   				<th style="text-align: left; padding-bottom: 10px; border-bottom: 1px solid #ccc;">Email Address</th>
   				<!-- <th style="text-align: left; padding-bottom: 10px; border-bottom: 1px solid #ccc;">Option</th> -->
   				<th style="text-align: left; padding-bottom: 10px; border-bottom: 1px solid #ccc;">Page ID</th>
   			</tr>
   		</thead>
   		<tbody>
   			<?php echo chr(13); foreach($templates as $template) { ?><?php echo '<tr><td>'.$template['name'].'</td>'; ?> <?php echo '<td>'.$template['email'].'</td>'; echo chr(13); ?> <?php //echo '<td>'.$template['options'].'</td>'; echo chr(13); ?> <?php echo '<td>'.$template['pageID'].'</td></tr>'; echo chr(13); ?><?php } ?>
   		</tbody>
   	</table>
   <h3>View Leads to Copy into CSV</h3>
  	<textarea name="autoresponder" id="autoresponder" style="display: block; width: 700px; height: 100px; font-size: 11px;">Full Name, Email Address <?php echo chr(13); foreach($templates as $template) { ?><?php echo $template['name']; ?>, <?php echo $template['email']; echo chr(13); ?><?php } ?></textarea>
   	 
   </div> <!-- /container -->
   <br clear="all">
