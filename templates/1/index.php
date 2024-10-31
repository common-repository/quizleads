<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>QuizLeads</title>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>   
  </head>
  <body>
<?php 
$values = get_post_custom( $post->ID );
$template = isset( $values['template'] ) ? esc_attr( $values['template'][0] ) : '';
$logo = isset( $values['logo'] ) ? esc_attr( $values['logo'][0] ) : '';
$subheadline = isset( $values['subheadline'] ) ? esc_attr( $values['subheadline'][0] ) : '';

$paragraph = isset( $values['paragraph'] ) ? esc_attr( $values['paragraph'][0] ) : '';
$redirect_url = isset( $values['redirect_url'] ) ? esc_attr( $values['redirect_url'][0] ) : '';

$question = isset( $values['question'] ) ? esc_attr( $values['question'][0] ) : '';
$option1 = isset( $values['option1'] ) ? esc_attr( $values['option1'][0] ) : '';
$option2 = isset( $values['option2'] ) ? esc_attr( $values['option2'][0] ) : '';


$total_questions = isset( $values['total_questions'] ) ? esc_attr( $values['total_questions'][0] ) : '0';

$formHeadline = isset( $values['formHeadline'] ) ? esc_attr( $values['formHeadline'][0] ) : '';
$formSubHeadline = isset( $values['formSubHeadline'] ) ? esc_attr( $values['formSubHeadline'][0] ) : '';
$showName = isset( $values['showName'] ) ? esc_attr( $values['showName'][0] ) : '';

$firstbutton = isset( $values['firstbutton'] ) ? esc_attr( $values['firstbutton'][0] ) : '';
$secondbutton = isset( $values['secondbutton'] ) ? esc_attr( $values['secondbutton'][0] ) : '';
$e_heading = isset( $values['e_heading'] ) ? esc_attr( $values['e_heading'][0] ) : '';
$e_subheading1 = isset( $values['e_subheading1'] ) ? esc_attr( $values['e_subheading1'][0] ) : '';
$e_subheading2 = isset( $values['e_subheading2'] ) ? esc_attr( $values['e_subheading2'][0] ) : '';
$e_subheading3 = isset( $values['e_subheading3'] ) ? esc_attr( $values['e_subheading3'][0] ) : '';
$agree_text = isset( $values['agree_text'] ) ? esc_attr( $values['agree_text'][0] ) : '';
$warning1 = isset( $values['warning1'] ) ? esc_attr( $values['warning1'][0] ) : '';
$warning2 = isset( $values['warning2'] ) ? esc_attr( $values['warning2'][0] ) : '';

$typography = isset( $values['typography'] ) ? esc_attr( $values['typography'][0] ) : '';
$buttonstyle = isset( $values['buttonstyle'] ) ? esc_attr( $values['buttonstyle'][0] ) : '';
$footer = isset( $values['footer'] ) ?  $values['footer'][0]  : '';

$footer_pages = get_post_meta( $post->ID , 'footer_pages',true);
$footer_pages = json_decode($footer_pages);
$background = isset( $values['background'] ) ? esc_attr( $values['background'][0] ) : '';
$mainheadline = isset( $values['mainheadline'] ) ? esc_attr( $values['mainheadline'][0] ) : '';

$submitbutton = isset( $values['submitbutton'] ) ? esc_attr( $values['submitbutton'][0] ) : '';
$autoresponder = isset( $values['autoresponder'] ) ? esc_attr( $values['autoresponder'][0] ) : '';

$wrapBG = isset( $values['wrapBG'] ) ? esc_attr( $values['wrapBG'][0] ) : '';
?>
    <section class="theme01">
        <div class="theme01__container">
            <figure class="theme01__image">
                <img src="<?php echo $logo; ?>">
            </figure>
            <figcaption class="theme01__banner">
                <div class="theme01__banner-title"><?php echo $mainheadline; ?></div>
                <p class="theme01__banner-text">
                    <?php echo $subheadline; ?>
                </p>
            </figcaption>

				<div id="question-0" class="theme01__content">
					<div class="theme01__head text-center">
						<h2 class="theme01__head-title"><span>Question 1</span></h2>
						<p class="theme01__head-text"><?php echo $question; ?></p>
					</div>
					<div class="theme01__bottom">
						<button total="<?php echo $total_questions; ?>" rel="0" id="theme0__question0-yes" class="yes_btn btn theme01__button theme01__button--left"><?php echo $option1; ?></button>
                        <button total="<?php echo $total_questions; ?>" rel="0" id="theme0__question0-no" class="no_btn btn theme01__button-fill theme01__button--right"><?php echo $option2; ?></button>
						<div class="clearfix"></div>
					</div>
				</div>
				
                <?php 
                for($count=1;$count<=$total_questions;$count++){

                    $question = isset( $values['question_'.$count] ) ? esc_attr( $values['question_'.$count][0] ) : '';
                    $option1 = isset( $values['option1_'.$count] ) ? esc_attr( $values['option1_'.$count][0] ) : '';
                    $option2 = isset( $values['option2_'.$count] ) ? esc_attr( $values['option2_'.$count][0] ) : '';
                    

                ?>
				<div id="question-<?php echo $count; ?>" class="theme01__content">
                    <div class="theme01__head text-center">
                        <h2 class="theme01__head-title"><span>Question <?php echo ($count+1); ?></span></h2>
                        <p class="theme01__head-text"><?php echo $question; ?></p>
                    </div>
                    <div class="theme01__bottom">
                        <button total="<?php echo $total_questions; ?>" rel="<?php echo $count; ?>" id="theme<?php echo $count; ?>__question<?php echo $count; ?>-yes" class="yes_btn btn theme01__button theme01__button--left"><?php echo $option1; ?></button>
                        <button total="<?php echo $total_questions; ?>" rel="<?php echo $count; ?>" id="theme<?php echo $count; ?>__question<?php echo $count; ?>-no" class="no_btn btn theme01__button-fill theme01__button--right"><?php echo $option2; ?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
				<?php 
                }
                ?>
				<div id="review-questions"  class="theme01__content">
					<div class="theme01__head text-center">
                    
                    	
                        <div id="question-reveiw1" class="question-reveiw">
                        	<h2 class="theme01__head-title"><span>Checking against our proprietary Smart Match System<sup>TM</sup></span></h2>
                            <div class="theme01__preloader">
                                <img src="<?php echo plugin_dir_url(__FILE__) ?>img/theme01-preloader.gif">
                            </div>
                        	<p class="theme01__text theme01--font-md"><strong class="theme01--color">Thank you</strong>. We are evaluating your answers.</p>
                        </div>

                        <?php 
                        for($count=0;$count<=$total_questions;$count++){
                            ?>
                            <div id="question-reveiw<?php echo ($count+2) ?>" class="question-reveiw">
                                <h2 class="theme01__head-title"><span>Question <?php echo ($count+1) ?>: Valid</span></h2>
                                <div class="theme01__preloader">
                                    <img src="<?php echo plugin_dir_url(__FILE__) ?>img/theme01-preloader.gif">
                                </div>
                                <p class="theme01__text theme01--font-md">Checking our proprietary Smart Match System<sup>TM</sup></p>
                            </div>
                            <?php 
                        }                        
                        ?>

                        
                        

						<div class="clearfix10"></div>
					</div>
				</div>
				
				<div id="review-content"  class="theme01__content">
					<div class="theme01__head">
						<h2 class="theme01__title"><?php echo $e_heading; ?></h2>
						<ul class="theme01__list">
							<li class="theme01__list-item"><span class="theme01__list-icon">1</span> <?php echo $e_subheading1; ?></li>
							<li class="theme01__list-item"><span class="theme01__list-icon">2</span> <?php echo $e_subheading2; ?></li>
							<li class="theme01__list-item"><span class="theme01__list-icon">3</span> <?php echo $e_subheading3; ?></li>
						</ul>
                        
                        <p class="theme01__text theme01--font-lg"><?php echo $agree_text; ?></p>
					</div>
                    

                    <form target="my-iframe" method="post"  action="" class="ARform theme01__bottom">
                        <input type="hidden" disabled  id="optionSelect" />
                        <input type="hidden" disabled id="pageid" value="<?php echo get_the_id(); ?>" />
                        <div class='ARhidden'></div>

                        <div class="theme01__form">
                        <div class="theme01__head text-center">
                            <h2 class="theme01__head-title"><span><?php echo $formHeadline; ?></span></h2>
                            <p class="theme01__head-text"><?php echo $formSubHeadline; ?></p>
                        </div>
                        <?php if( get_post_meta( $post->ID, 'showName', true ) == "hide" ) {  } else { echo '<div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control input-lg" name="name" id="name" placeholder="Enter your name">
                          </div>'; } ?>
                          
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control input-lg" name="email" id="email" placeholder="Enter your email">
                          </div>
                        </div>
                    
                    
                        <button id="theme01__question-submit" class="first btn theme01__button-fill" type="button">I AGREE!</button>
                        <div class="clearfix"></div>
                    </form>

                    <div id="autoresponder" style="display: none">
                        <textarea id="autoresponderCode" name="autoresponderCode"><?php echo get_post_meta( $post->ID, 'autoresponder', true  ); ?></textarea>
                        <input type="text"  name="arname" id="arname" value="" />
                        <input type="text"   name="aremail" id="aremail" value="" />
                        <input type="text"   name="arform" id="arform" value="" />
                        <textarea id="arhidden"   name="arhidden"></textarea>
                        <div id="arcode_debug"><div id="arcode_hdn_div"></div><div id="arcode_hdn_div2"></div></div>
                    </div>

					
				</div>
        </div>
        <div class="theme01__footer">
            <?php echo $footer; ?>
            <ul class="theme01__footer-list">
            <?php 
            foreach($footer_pages as $page){
                ?>
            <li class="theme01__footer-list-item"><a class="theme01__footer-list-link" href="<?php echo get_page_link($page); ?>"><?php echo get_the_title($page) ?></a></li>
                <?php     
            }
            ?>
            
            
            </ul>
        </div>
    </section>

<iframe src="#" id="my-iframe" name="my-iframe" style="display: none"></iframe>

    
<script type="text/javascript">
    jQuery(document).ready(function($) {
        //$('#optionSelect').val('');
        $('.first').click(function() {
            if ($('#name').val() == '' || $('#email').val() == '') {
                alert('Fields Required')
            }
            else {
                $('.ARform').submit( );
                
                $.ajax({

                    type: "POST",
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {action:'lead', questionoptin_name: $('#name').val(), questionoptin_email: $('#email').val(), questionoptin_pageid: $('#pageid').val(), questionoptin_option: '' /*$('#optionSelect').val()*/ },
                    success:function(data){
                         window.location='<?php echo get_post_meta($post->ID, 'redirect_url', true); ?>';
                    }

                })
            }
        });

        /*$('.radio').click(function() {
            $('.radio').removeClass('activeRadio');
            $(this).addClass('activeRadio');
            $('#optionSelect').val($(this).text());
        });*/

            break_apart_ar();
                    
            // TAKE APART AR CODE
                    
            function break_apart_ar(){
            
            var tags = ['a','iframe','frame','frameset','script'], reg, val = $('#autoresponderCode').val(),
            
            hdn = $('#arcode_hdn_div2'), formurl = $('#arform'), hiddenfields = $('#arhidden');
            
            formurl.val('');
                if(jQuery.trim(val) == '')
                    return false;
                    $('#arcode_hdn_div').html('');
                    $('#arcode_hdn_div2').html('');
                for(var i=0;i<5;i++){
                    reg = new RegExp('<'+tags[i]+'([^<>+]*[^\/])>.*?</'+tags[i]+'>', "gi");
                val = val.replace(reg,'');
                                
                reg = new RegExp('<'+tags[i]+'([^<>+]*)>', "gi");
                    val = val.replace(reg,'');
                }
                
                var tmpval;
                try {
                    tmpval = decodeURIComponent(val);
                } catch(err){
                    tmpval = val;
                }
                
                hdn.append(tmpval);
                var num = 0;
                var name_selected = '';
                var email_selected = '';
                
                $(':text',hdn).each(function(){
                    var name = $(this).attr('name'),
                    name_selected = num == '0' ? name : (num != '0' ? name_selected : ''), 
                    email_selected = num == '1' ? name : email_selected;
                    if(num=='0') jQuery('#arname').val(name_selected);
                    if(num=='1') jQuery('#aremail').val(email_selected);
                    num++;
                });
                            jQuery(':input[type=hidden]',hdn).each(function(){
                                jQuery('#arcode_hdn_div').append(jQuery('<input type="hidden" name="'+jQuery(this).attr('name')+'" />').val(jQuery(this).val()));
                            });     
                            var hidden_f = jQuery('#arcode_hdn_div').html();
                            formurl.val(jQuery('form',hdn).attr('action'));
                            hiddenfields.val(hidden_f);
                            hdn.html('');
                            
            };
            
            $('.ARform').attr('action', $('#arform').val());
            $('.ARhidden').html($('#arhidden').val());
            $('#optinName').attr('name', $('#arname').val());
            $('#optinEmail').attr('name', $('#arname').val());
            
            $('#sidebar-optinName').attr('name', $('#arname').val());
            $('#sidebar-optinEmail').attr('name', $('#arname').val());

            
    });
</script>

  </body>
</html>