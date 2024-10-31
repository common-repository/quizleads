<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*
	Plugin Name: QuizLeads
	Description: Boost Lead Gen & Conversions With Our Quiz Plugin
	Version: 1.0
*/


add_action( 'init', 'createQLFun' );
function createQLFun() {
	$icon_url			=	plugin_dir_url(__FILE__).'images/logo.png';
	register_post_type( 'quizleads',
		array(
			'labels' => array(
				'name' => __( 'Quiz Lead Optins' ),
				'singular_name' => __( 'Quiz Lead Optin' )
			),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => $icon_url,
		'rewrite' => true
		)
	);
	flush_rewrite_rules( );

}

add_action('admin_enqueue_scripts', 'quizleads_admin_files');

function quizleads_admin_files()
{
	wp_enqueue_script('jquery');
	wp_register_style( 'custom_style_admin', plugins_url('/custom_style.css', __FILE__));
	wp_enqueue_style('custom_style_admin');    
}



add_action('init', 'register_script');
function register_script() {
    wp_register_script( 'custom_js', plugins_url('/templates/1/js/custom.js', __FILE__), array('jquery') );
    wp_register_style( 'font_style', plugins_url('/templates/1/css/font.css', __FILE__));    
    wp_register_style( 'bootstrap_style', plugins_url('/templates/1/css/bootstrap.css', __FILE__));    
    wp_register_style( 'custom_style', plugins_url('/templates/1/css/custom.css', __FILE__));    
    
}

add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_style(){
   wp_enqueue_script('custom_js');
   wp_enqueue_style( 'font_style' );
   wp_enqueue_style( 'bootstrap_style' );
   wp_enqueue_style( 'custom_style' );

}


register_activation_hook( __FILE__, 'quizlead_activate' );

function quizlead_activate(){


	$pages = array();

	$page1 = get_page_by_title('Privacy', OBJECT, 'page');

	if(!$page1){
		// Create post object
		$my_page1 = array(
		  'post_title'    => "Privacy",
		  'post_content'  => "This Privacy Policy governs the manner in which This Website collects, uses, maintains and discloses information collected from users (each, a 'User') of this website ('Site'). This privacy policy applies to the Site and all products and services offered the Site.

Personal identification information

We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, subscribe to the newsletter, fill out a form, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.

Non-personal identification information

We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.

Web browser cookies

Our Site may use 'cookies' to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.

How we use collected information

The Site may collect and use Users personal information for the following purposes:

- To improve our Site We may use feedback you provide to improve our products and services.
- To run a promotion, contest, survey or other Site feature To send Users information they agreed to receive about topics we think will be of interest to them.
- To send periodic emails We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests. If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. If at any time the User would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email.
How we protect your information

We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.

Sensitive and private data exchange between the Site and its Users happens over a SSL secured communication channel and is encrypted and protected with digital signatures.

Sharing your personal information

We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.We may use third party service providers to help us operate our business and the Site or administer activities on our behalf, such as sending out newsletters or surveys. We may share your information with these third parties for those limited purposes provided that you have given us your permission.

Third party websites

Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties. We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Site, is subject to that website's own terms and policies.

Advertising

Ads appearing on our site may be delivered to Users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile non personal identification information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This privacy policy does not cover the use of cookies by any advertisers.

Compliance with children's online privacy protection act

Protecting the privacy of the very young is especially important. For that reason, we never collect or maintain information at our Site from those we actually know are under 13, and no part of our website is structured to attract anyone under 13.

Changes to this privacy policy

The Site has the discretion to update this privacy policy at any time. When we do, we will revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.

Your acceptance of these terms

By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.

Contacting us

If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at our contact page:

Contact Page

This document was last updated on December 24, 2014",
		  'post_status'   => 'draft',
		  'post_author'   => 1,
		  'post_type' => 'page'
		);
		$page1_id = wp_insert_post( $my_page1 );
		$pages[] = $page1_id;
	}
	else{
		$pages[] = $page1->ID;
	}

	$page2 = get_page_by_title('Terms', OBJECT, 'page');

	if(!$page2){
		// Create post object
		$my_page2 = array(
		  'post_title'    => "Terms",
		  'post_content'  => "This Agreement was last modified on March 24, 2014.

Please read these Terms of Service ('Agreement', 'Terms of Service') carefully before using this website ('the Site'). This Agreement sets forth the legally binding terms and conditions for your use of the Site.

By accessing or using the Site in any manner, including, but not limited to, visiting or browsing the Site or contributing content or other materials to the Site, you agree to be bound by these Terms of Service. Capitalized terms are defined in this Agreement.

Intellectual Property
The Site and its original content, features and functionality are owned by us and are protected by international copyright, trademark, patent, trade secret and other intellectual property or proprietary rights laws.

Termination
We may terminate your access to the Site, without cause or notice, which may result in the forfeiture and destruction of all information associated with you. All provisions of this Agreement that by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity, and limitations of liability.

Links To Other Sites
Our Site may contain links to third-party sites that are not owned or controlled by us.

The Site has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party sites or services. We strongly advise you to read the terms and conditions and privacy policy of any third-party site that you visit.

Governing Law
This Agreement (and any further rules, polices, or guidelines incorporated by reference) shall be governed and construed in accordance with the laws of California, United States, without giving effect to any principles of conflicts of law.

Changes To This Agreement
We reserve the right, at our sole discretion, to modify or replace these Terms of Service by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms of Service.

Please review this Agreement periodically for changes. If you do not agree to any of this Agreement or any changes to this Agreement, do not use, access or continue to access the Site or discontinue any use of the Site immediately.

Contact Us
If you have any questions about this Agreement, please contact us.",
		  'post_status'   => 'draft',
		  'post_author'   => 1,
		  'post_type' => 'page'
		);
		$page2_id = wp_insert_post( $my_page2 );
		$pages[] = $page2_id;
	}
	else{
		$pages[] = $page2->ID;
	}

	$page3 = get_page_by_title('Earnings', OBJECT, 'page');

	if(!$page3){
		// Create post object
		$my_page3 = array(
		  'post_title'    => "Earnings",
		  'post_content'  => "This policy is valid from 06 December 2014

This website is a collaborative work written by a group of individuals. This blog accepts forms of cash advertising, sponsorship, paid insertions or other forms of compensation.

The compensation received may influence the advertising content, topics or posts made in this site. That content, advertising space or post may not always be identified on the page itself as paid or sponsored content.

The owner(s) of this site is compensated to provide opinion on products, services, websites and various other topics. Even though the owner of this site receive(s) compensation for posts or advertisements, we always give our honest opinions, findings, beliefs, or experiences on those topics or products. The views and opinions expressed on this site are purely the content creators' own. Any product claim, statistic, quote or other representation about a product or service should be verified with the manufacturer, provider or party in question.

This site does not contain any content which might present a conflict of interest.",
		  'post_status'   => 'draft',
		  'post_author'   => 1,
		  'post_type' => 'page'
		);
		$page3_id = wp_insert_post( $my_page3 );
		$pages[] = $page3_id;
	}
	else{
		$pages[] = $page3->ID;
	}

	$page4 = get_page_by_title('Contact', OBJECT, 'page');

	if(!$page4){
		// Create post object
		$my_page4 = array(
		  'post_title'    => "Contact",
		  'post_content'  => "Contact: contact@worldnewsmedia.co",
		  'post_status'   => 'draft',
		  'post_author'   => 1,
		  'post_type' => 'page'
		);
		$page4_id = wp_insert_post( $my_page4 );
		$pages[] = $page4_id;
	}
	else{
		$pages[] = $page4->ID;
	}

	$page = get_page_by_title('Trump Campaign', OBJECT, 'quizleads');
	if(!$page){
		// Create post object
		$my_post = array(
		  'post_title'    => "Trump Campaign",
		  'post_content'  => "",
		  'post_status'   => 'draft',
		  'post_type' => 'quizleads'
		);
		 
		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );

		update_post_meta( $post_id, 'template', 1 );
		update_post_meta( $post_id, 'logo', plugins_url('templates/1/img/crazytrump.jpg',__FILE__) );

		update_post_meta( $post_id, 'mainheadline', 'Has Donald Trump Gone Too Far?' );
		update_post_meta( $post_id, 'subheadline', 'One thing is for sure, Donald Trump knows a lot about the economy and being that he has run a huge company that has dealt in politics his whole life, he is privy to some very secret information. That information may now be getting leaked around the web, but before we can disclose that to you, we must see if you qualify…' );
		update_post_meta( $post_id, 'footer', 'Copyright © 2014-2017' );
		
		$footer_pages_enc = json_encode($pages);
		update_post_meta( $post_id, 'footer_pages',  $footer_pages_enc );

		update_post_meta( $post_id, 'question', 'Are you a member of the Conversative party?' );
		update_post_meta( $post_id, 'option1', 'YES' );
		update_post_meta( $post_id, 'option2', 'NO' );
		update_post_meta( $post_id, 'total_questions', 3 );	
		update_post_meta( $post_id, 'question_1', 'Do you believe the dollar is a stable currency?' );
		update_post_meta( $post_id, 'option1_1', 'YES' );	
		update_post_meta( $post_id, 'option2_1', 'NO' );	
		update_post_meta( $post_id, 'question_2', 'Have you experienced more than one (1) recession in your life time?' );
		update_post_meta( $post_id, 'option1_2', 'YES' );	
		update_post_meta( $post_id, 'option2_2', 'NO' );
		update_post_meta( $post_id, 'question_3', 'Do you believe the United States Of America is on the brink of economic collapse?' );
		update_post_meta( $post_id, 'option1_3', 'YES' );	
		update_post_meta( $post_id, 'option2_3', 'NO' );
		update_post_meta( $post_id, 'formHeadline', 'Where Do We Send Your Economic Presentation?' );
		update_post_meta( $post_id, 'formSubHeadline', 'Enter your best email address below for instant access' );
		update_post_meta( $post_id, 'autoresponder', '' );

		update_post_meta( $post_id, 'redirect_url', 'http://thefinalbubble.com' );
		update_post_meta( $post_id, 'e_heading', 'Congratulations! Before you watch the presentation where Professor Charles Hayek will share his economic discoveries with you, our lawyers have asked us to require that each person agrees to the following guidelines:' );
		update_post_meta( $post_id, 'e_subheading1', 'You must NOT talk about the details of this presentation with ANYONE due to the Government secrets contained within.' );
		update_post_meta( $post_id, 'e_subheading2', "Do NOT judge Professor Hayek's tips before you see the whole picture. These powerful secrets can help prepare you for a potential economic collpase." );
		update_post_meta( $post_id, 'e_subheading3', 'This presentation is ONLY being made available to a select group of people and will be REMOVED if Dr. Taylor comes under too much pressure from the Big Pharma industry. If you do not want to discover these industry secrets, please CLOSE THIS WINDOW IMMEDIATELY to free up your slot for the next person in line.' );
		update_post_meta( $post_id, 'agree_text', 'If you agree to all the above, click the "I Agree" button below to proceed to the following private presentation.' );

	}
	


}

add_action('admin_menu', 'viewQLFun');

function viewQLFun() {
	$icon_url1			=	plugin_dir_url(__FILE__).'images/logo1.png';
	add_menu_page('Quiz Leads', 'Quiz Leads', 'manage_options', 'quizleads', 'viewQL', $icon_url1, 30);
}

function viewQL() {
	require_once(WP_PLUGIN_DIR . '/quizleads' .'/quizleads.php');
}

register_activation_hook( __FILE__, 'createQLTable');

function createQLTable() {
	global $wpdb;
	$table_name = $wpdb->prefix . "quizleads_tbl";
	   
   	if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	    id int(11) UNSIGNED AUTO_INCREMENT,
	   name varchar(500),
	   email varchar(35),
	   pageID int(11),
	   answer varchar(500),
	   UNIQUE KEY id (id)
	 );";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
   	}	  
}

add_action('template_redirect', 'quizleads_fun', 5);
function quizleads_fun() {

	$post_type = get_query_var('post_type');
	if ($post_type == 'quizleads') {  	
		if (file_exists(TEMPLATEPATH . '/single-' . $post_type . '.php')) return;
		else{
			/* get template name */
			$postid = get_queried_object_id();
			$template_val = get_post_meta($postid,'template',true);
			load_template(WP_PLUGIN_DIR . '/quizleads/templates/'.$template_val.'/index.php');
		}
		exit;
	}
}

require_once('admin_settings.php');	


add_action( 'wp_ajax_nopriv_lead', 'lead_fun' );
add_action( 'wp_ajax_lead', 'lead_fun' );
function lead_fun()
{
	global $wpdb;
   $table_db_name = $wpdb->prefix . "quizleads_tbl";
	$_POST['questionoptin_name'];
 	echo	$wpdb->insert( $table_db_name, 
    array( 
     'name' => esc_attr($_POST['questionoptin_name']),
     'email' => esc_attr($_POST['questionoptin_email']),
     'pageID' => esc_attr($_POST['questionoptin_pageid'])/*,
     'options' => $_POST['questionoptin_option']*/
      )
	);
   die;
}
?>