<?php

/**
 * Job details
 *
 * This template is responsible for displaying job details on job details page
 * (template single.php) and job preview page (template preview.php)
 *
 * @author Greg Winiarski
 * @package Templates
 * @subpackage Resumes
 */

/* @var $resume Wpjb_Model_Resume */
/* @var $can_browse boolean True if user has access to resumes */


global $wpdb;
$query = "SELECT
  wp_incluyeme_users_dicapselect.id,
  wp_incluyeme_users_dicapselect.resume_id
FROM wp_incluyeme_users_dicapselect
WHERE wp_incluyeme_users_dicapselect.resume_id = $resume->id";
$query = $wpdb->get_results($query);
$current_user = wp_get_current_user();

if (count($query) < 1) {
    ?>
	
	<div class="wpjb wpjr-page-resume">
        
        
        <?php wpjb_flash() ?>
        <?php $image_size = apply_filters("wpjb_singular_logo_size", "64x64", "resume") ?>
		
		<div class="wpjb-top-header <?php echo apply_filters("wpjb_top_header_classes", "wpjb-use-round-image", "resume", $resume->id) ?>">
			<div class="wpjb-top-header-image">
                <?php if ($resume->doScheme("image")): ?>
                <?php elseif ($resume->getAvatarUrl()): ?>
					<img src="<?php echo esc_attr($resume->getAvatarUrl($image_size)) ?>"
					     alt="<?php echo esc_attr($resume->headline) ?>"/>
                <?php else: ?>
					<span class="wpjb-glyphs wpjb-icon-user wpjb-logo-default-size"></span>
                <?php endif; ?>
			</div>
			
			<div class="wpjb-top-header-content">
				<div>
                <span class="wpjb-top-header-title">
                    <?php if ($resume->doScheme("headline")): ?>
                    <?php elseif ($resume->headline): ?>
                        <?php echo esc_html($resume->headline) ?>
                    <?php else: ?>
	                    —
                    <?php endif; ?>
                </span>
					
					<ul class="wpjb-top-header-subtitle">
                        
                        <?php do_action("wpjb_template_resume_meta_pre", $resume) ?>
                        
                        <?php if (wpjb_conf("show_maps")): ?>
							<li class="wpjb-resume-location">
								<span class="wpjb-glyphs wpjb-icon-map"></span>
								<span>
                            <?php if ($resume->getGeo()->status == 2): ?>
	                            <a href="<?php echo esc_attr(wpjb_google_map_url($resume)) ?>" class="wpjb-tooltip"
	                               title="<?php echo esc_attr("show on map", "wpjobboard") ?>"><?php echo esc_html($resume->locationToString()) ?><span
				                            class="wpjb-glyphs wpjb-icon-down-open"></span></a>
                            <?php else: ?>
                                <?php echo esc_html($resume->locationToString()) ?>
                            <?php endif; ?>
                        </span>
							</li>
                        <?php endif; ?>
						
						<li class="wpjb-resume-modified-at">
							<span class="wpjb-glyphs wpjb-icon-clock"></span>
                            <?php echo wpjb_date_display(get_option('date_format'), $resume->modified_at) ?>
						</li>
                        
                        <?php do_action("wpjb_template_resume_meta", $resume) ?>
					
					</ul>
					
					<em class="wpjb-top-header-subtitle">
					
					</em>
				</div>
			</div>
		</div>
        
        <?php if (wpjb_conf("show_maps") && $resume->getGeo()->status == 2): ?>
			<div class="wpjb-none wpjb-map-slider">
				<iframe style="width:100%;height:350px;margin:0;padding:0;" width="100%" height="350" frameborder="0"
				        scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
			</div>
        <?php endif; ?>
        
        <?php if ($resume->description): ?>
			<div class="wpjb-text-box" style="margin: 1em 0 1em 0; font-size: 1.1em">
                <?php if ($resume->doScheme("description")): else: ?>
					<div class="wpjb-text"><?php echo wpjb_rich_text($resume->description, "html") ?></div>
                <?php endif; ?>
			</div>
        <?php endif; ?>
		
		<div class="wpjb-grid wpjb-grid-closed-top">
            
            <?php if (!empty($resume->getTag()->category)): ?>
				<div class="wpjb-grid-row">
					<div class="wpjb-grid-col wpjb-col-30"><?php _e("Category", "wpjobboard"); ?></div>
					<div class="wpjb-grid-col wpjb-col-65 wpjb-glyphs wpjb-icon-tags">
                        <?php foreach ($resume->getTag()->category as $category): ?>
							<a href="<?php esc_attr_e(wpjr_link_to("category", $category)) ?>"><?php esc_html_e($category->title) ?></a>
                        <?php endforeach; ?>
					</div>
				</div>
            <?php endif; ?>
            
            <?php if ($resume->getUser(true)): ?>
				<div class="wpjb-grid-row">
					<div class="wpjb-grid-col wpjb-col-30"><?php _e("E-mail", "wpjobboard"); ?></div>
					<div class="wpjb-grid-col wpjb-col-65 wpjb-glyphs wpjb-icon-mail-alt">
                        <?php if ($resume->doScheme("user_email")): ?>
                        <?php elseif (in_array("user_email", $tolock) && !$can_browse): ?>
							<span class="wpjb-glyphs wpjb-icon-lock"><em><?php _e("Locked", "wpjobboard") ?></em></span>
                        <?php else: ?>
                            <?php esc_html_e($resume->getUser()->user_email) ?>
                        <?php endif; ?>
					</div>
				</div>
            <?php endif; ?>
            
            <?php if ($resume->phone): ?>
				<div class="wpjb-grid-row">
					<div class="wpjb-grid-col wpjb-col-30"><?php _e("Phone Number", "wpjobboard") ?></div>
					<div class="wpjb-grid-col wpjb-col-65 wpjb-glyphs wpjb-icon-phone">
                        <?php if ($resume->doScheme("phone")): ?>
                        <?php elseif (in_array("phone", $tolock) && !$can_browse): ?>
							<span class="wpjb-glyphs wpjb-icon-lock"><em><?php _e("Locked", "wpjobboard") ?></em></span>
                        <?php else: ?>
                            <?php esc_html_e($resume->phone) ?>
                        <?php endif; ?>
					</div>
				</div>
            <?php endif; ?>
            
            <?php if ($resume->getUser(true)->user_url): ?>
				<div class="wpjb-grid-row">
					<div class="wpjb-grid-col wpjb-col-30"><?php _e("Website", "wpjobboard") ?></div>
					<div class="wpjb-grid-col wpjb-col-65 wpjb-glyphs wpjb-icon-link-ext-alt">
                        <?php if ($resume->doScheme("user_url")): ?>
                        <?php elseif (in_array("user_url", $tolock) && !$can_browse): ?>
							<span class="wpjb-glyphs wpjb-icon-lock"><em><?php _e("Locked", "wpjobboard") ?></em></span>
                        <?php else: ?>
							<a href="<?php esc_attr_e($resume->getUser()->user_url) ?>"><?php esc_html_e($resume->getUser()->user_url) ?></a>
                        <?php endif; ?>
					</div>
				</div>
            <?php endif; ?>
            
            <?php foreach (
                $resume->getMeta([
                    "visibility" => 0,
                    "meta_type" => 3,
                    "empty" => false,
                    "field_type_exclude" => "ui-input-textarea"
                ]) as $k => $value
            ): ?>
				<div class="wpjb-grid-row <?php esc_attr_e("wpjb-row-meta-" . $value->conf("name")) ?>">
					<div class="wpjb-grid-col wpjb-col-30"><?php esc_html_e($value->conf("title")); ?></div>
					<div class="wpjb-grid-col wpjb-col-65 wpjb-glyphs <?php esc_attr_e($value->conf("render_icon", "wpjb-icon-empty")) ?>">
                        <?php if ($resume->doScheme($k)): ?>
                        <?php elseif (in_array($k, $tolock) && !$can_browse): ?>
							<span class="wpjb-glyphs wpjb-icon-lock"><em><?php _e("Locked", "wpjobboard") ?></em></span>
                        <?php elseif ($value->conf("render_callback")): ?>
                            <?php call_user_func($value->conf("render_callback")); ?>
                        <?php elseif ($value->conf("type") == "ui-input-file"): ?>
                            <?php foreach ($resume->file->{$value->name} as $file): ?>
								<a href="<?php esc_attr_e($file->url) ?>"
								   rel="nofollow"><?php esc_html_e($file->basename) ?></a>
                                <?php echo wpjb_format_bytes($file->size) ?><br/>
                            <?php endforeach ?>
                        <?php else: ?>
                            <?php if ($value->conf("url_target")): ?>
								<a href="<?php echo esc_html($value->value()); ?>"
								   target="<?php echo $value->conf("url_target"); ?>"><?php echo esc_html($value->value()); ?></a>
                            <?php else: ?>
                                <?php esc_html_e(join(", ", (array)$value->values())) ?>
                            <?php endif; ?>
                        <?php endif; ?>
					</div>
				</div>
            <?php endforeach; ?>
            
            <?php do_action("wpjb_template_resume_meta_text", $resume) ?>
		</div>
        
        <?php
        $dList = [
            __("Education", "wpjobboard") => $resume->getEducation(),
            __("Experience", "wpjobboard") => $resume->getExperience()
        ];
        ?>
        
        <?php foreach ($dList as $title => $details): ?>
            <?php if (!empty($details)): ?>
				<div class="wpjb-text-box">
					<h3><?php esc_html_e($title) ?></h3>
                    <?php foreach ($details as $detail): ?>
						
						<div class="wpjb-resume-detail">
							<div class="wpjb-column-left">
								
								<strong><?php esc_html_e($detail->detail_title) ?></strong>
                                <?php if ($detail->grantor): ?>
									<span> @ <?php esc_html_e($detail->grantor) ?></span>
                                <?php endif; ?>
							
							</div>
							<div class="wpjb-column-right wpjb-motif">
                                <?php $glue = "" ?>
                                <?php if ($detail->started_at != "0000-00-00"): ?>
                                    <?php esc_html_e(wpjb_date_display("M Y", $detail->started_at)) ?>
                                    <?php $glue = "—"; ?>
                                <?php endif; ?>
                                
                                <?php if ($detail->is_current): ?>
                                    <?php echo $glue . " ";
                                    esc_html_e("Current", "wpjobboard") ?>
                                <?php elseif ($detail->completed_at != "0000-00-00"): ?>
                                    <?php echo $glue . " ";
                                    esc_html_e(wpjb_date_display("M Y", $detail->completed_at)) ?>
                                <?php endif; ?>
							</div>
                            <?php if ($detail->detail_description): ?>
								<div class="wpjb-clear"><?php echo wpjb_rich_text($detail->detail_description) ?></div>
                            <?php endif; ?>
                            
                            <?php do_action("wpjb_template_resume_detail_meta_text", $detail) ?>
						</div>
                    
                    <?php endforeach; ?>
				</div>
            <?php endif; ?>
        <?php endforeach; ?>
		
		<div class="wpjb-text-box">
            <?php foreach (
                $resume->getMeta([
                    "visibility" => 0,
                    "meta_type" => 3,
                    "empty" => false,
                    "field_type" => "ui-input-textarea"
                ]) as $k => $value
            ): ?>
				
				<h3><?php esc_html_e($value->conf("title")); ?></h3>
				<div class="wpjb-text">
                    <?php if ($resume->doScheme($k)): else: ?>
                        <?php wpjb_rich_text($value->value(), $value->conf("textarea_wysiwyg") ? "html" : "text"); ?>
                    <?php endif; ?>
				</div>
            
            <?php endforeach; ?>
            
            <?php do_action("wpjb_template_resume_meta_richtext", $resume) ?>
		</div>
		
		<div id="wpjb-scroll" class="wpjb-job-content">
			<h3><?php _e("Contact Candidate", "wpjobboard") ?></h3>
            
            <?php if ($c_message): ?>
				<div class="wpjb-flash-info"><?php esc_html_e($c_message) ?></div><?php endif; ?>
			
			<div>
                <?php if ($button->contact): ?>
					<a class="wpjb-button wpjb-form-toggle wpjb-form-resume-contact"
					   data-wpjb-form="wpjb-form-resume-contact"
					   href="<?php esc_attr_e(wpjr_link_to("resume", $resume, ["form" => "contact"])) ?>#wpjb-scroll"
					   rel="nofollow"><?php _e("Contact Candidate", "wpjobboard") ?> <span
								class="wpjb-glyphs wpjb-icon-down-open"></span></a>
                <?php endif; ?>
                
                <?php if ($button->login): ?>
					<a class="wpjb-button"
					   href="<?php esc_attr_e(wpjb_link_to("employer_login", null, ["redirect_to" => base64_encode($current_url)])) ?>"><?php _e("Login", "wpjobboard") ?></a>
                <?php endif; ?>
                
                <?php if ($button->register): ?>
					<a class="wpjb-button"
					   href="<?php esc_attr_e(wpjb_link_to("employer_new", null, ["redirect_to" => base64_encode($current_url)])) ?>"><?php _e("Register", "wpjobboard") ?></a>
                <?php endif; ?>
                
                <?php if ($button->purchase): ?>
					<a class="wpjb-button wpjb-form-toggle wpjb-form-resume-purchase"
					   data-wpjb-form="wpjb-form-resume-purchase"
					   href="<?php esc_attr_e(wpjr_link_to("resume", $resume, ["form" => "purchase"])) ?>#wpjb-scroll"
					   rel="nofollow"><?php _e("Purchase", "wpjobboard") ?> <span
								class="wpjb-glyphs wpjb-icon-down-open">&nbsp;</span></a>
                <?php endif; ?>
                
                <?php if ($button->verify): ?>
					<a class="wpjb-button"
					   href="<?php esc_attr_e(wpjb_link_to("employer_verify")) ?>"><?php _e("Request verification", "wpjobboard") ?></a>
                <?php endif; ?>
			</div>
            
            <?php foreach ($f as $k => $form): ?>
				<div id="wpjb-form-resume-<?php echo $k ?>"
				     class="wpjb-form-resume wpjb-form-slider wpjb-layer-inside <?php if (!$show->$k): ?>wpjb-none<?php endif; ?>">
                    
                    <?php if ($form_error): ?>
						<div class="wpjb-flash-error wpjb-flash-small">
							<span class="wpjb-glyphs wpjb-icon-attention"><?php esc_html_e($form_error) ?></span>
						</div>
                    <?php endif; ?>
					
					<form class="wpjb-form wpjb-form-nolines"
					      action="<?php esc_attr_e(wpjr_link_to("resume", $resume)) ?>#wpjb-scroll" method="post">
                        
                        <?php echo $form->renderHidden() ?>
                        <?php foreach ($form->getReordered() as $group): ?>
                            <?php /* @var $group stdClass */ ?>
                            
                            <?php if ($group->title): ?>
								<div class="wpjb-legend"><?php esc_html_e($group->title) ?></div>
                            <?php endif; ?>
							
							<fieldset class="wpjb-fieldset-<?php esc_attr_e($group->getName()) ?>">
                                <?php foreach ($group->getReordered() as $name => $field): ?>
                                    <?php /* @var $field Daq_Form_Element */ ?>
									<div class="<?php wpjb_form_input_features($field) ?>">
										
										<label class="wpjb-label">
                                            <?php esc_html_e($field->getLabel()) ?>
                                            <?php if ($field->isRequired()): ?><span
													class="wpjb-required">*</span><?php endif; ?>
										</label>
										
										<div class="wpjb-field">
                                            <?php wpjb_form_render_input($form, $field) ?>
                                            <?php wpjb_form_input_hint($field) ?>
                                            <?php wpjb_form_input_errors($field) ?>
										</div>
									
									</div>
                                
                                <?php endforeach; ?>
							</fieldset>
                        <?php endforeach; ?>
						
						<div class="wpjb-legend"></div>
						
						<fieldset>
							<input type="submit" class="wpjb-submit" value="<?php _e("Submit", "wpjobboard") ?>"/>
						</fieldset>
					
					
					</form>
				</div>
            <?php endforeach; ?>
		
		</div>
	
	</div>
    
    
    <?php
} else {
    $js = plugins_url() . '/incluyeme-login-extension/include/assets/js/';
    $img = plugins_url() . '/incluyeme-login-extension/include/assets/img/incluyeme-place.svg';
    $css = plugins_url() . '/incluyeme-login-extension/include/assets/css/';
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], '1.0.0');
    wp_register_script('bootstrapJs', $js . 'bootstrap.min.js', ['jquery', 'popper'], '1.0.0');
    wp_register_script('vueJS', $js . 'vueDEV.js', ['bootstrapJs', 'FAwesome'], '1.0.0');
    wp_register_script('vueD', $js . 'vueView2.0.6.js', ['vueJS', 'Axios'], '2.0.0');
    wp_register_script('Axios', $js . 'axios.min.js', [], '2.0.0');
    wp_register_script('bootstrap-notify', $js . 'iziToast.js', ['bootstrapJs'], '2.0.0');
//wp_register_script('materializeJS', $js . 'materialize.min.js');
    
    wp_register_style('bootstrap-css', $css . 'bootstrap.min.css', [], '1.0.0', false);
    wp_register_style('bootstrap-notify-css', $css . 'iziToast.min.css', [], '1.0.0', false);
    wp_register_script('FAwesome', 'https://kit.fontawesome.com/65c018cf75.js', [], '1.0.0', false);
    wp_enqueue_script('bootstrapJs');
    wp_enqueue_script('bootstrap-notify');
    wp_enqueue_script('vueD');
    
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_style('bootstrap-notify-css');
    wp_enqueue_script('fAwesome');
    $baseurl = wp_upload_dir();
    $baseurl = $baseurl['baseurl'];
    $incluyemeNames = 'incluyemeNamesCV';
    $incluyemeLoginFB = 'incluyemeLoginFB';
    $incluyemeLoginGoogle = 'incluyemeLoginGoogle';
    $incluyemeLoginCountry = 'incluyemeLoginCountry';
    $incluyemeLoginEstado = 'incluyemeLoginEstado';
    $incluyemeGoogleAPI = get_option($incluyemeLoginGoogle);
    $FBappId = get_option($incluyemeLoginFB);
    $FBversion = 'v7';
    
    ?>
	<style>
        #main-content .container:before {
            background: none !important;
        }

        .form-control {
            border: none !important;
        }

        #drop-zone {
            border: 2px dashed rgba(0, 0, 0, .3);
            border-radius: 20px;
            text-align: center;
            line-height: 180px;
            font-size: 20px;
            color: rgba(0, 0, 0, .3);
        }

        #drop-zone input {
            /*Important*/
            position: absolute;
            /*Important*/
            cursor: pointer;
            left: 0;
            top: 0;
            /*Important This is only comment out for demonstration purposes.
			opacity:0; */
        }

        /*Important*/
        #drop-zone.mouse-over {
            border: 2px dashed rgba(0, 0, 0, .5);
            color: rgba(0, 0, 0, .5);
        }


        /*If you dont want the button*/
        #clickHere {
            position: absolute;
            cursor: pointer;
            left: 50%;
            top: 50%;
            margin-left: -50px;
            margin-top: 20px;
            line-height: 26px;
            color: white;
            font-size: 12px;
            width: 100px;
            height: 26px;
            border-radius: 4px;
            background-color: #3b85c3;

        }

        #clickHere:hover {
            background-color: #4499DD;

        }

        #drop-zoneCV {
            border: 2px dashed rgba(0, 0, 0, .3);
            border-radius: 20px;
            text-align: center;
            line-height: 180px;
            font-size: 20px;
            color: rgba(0, 0, 0, .3);
        }

        #drop-zoneCV input {
            /*Important*/
            position: absolute;
            /*Important*/
            cursor: pointer;
            left: 0;
            top: 0;
            /*Important This is only comment out for demonstration purposes.
			opacity:0; */
        }

        /*Important*/
        #drop-zoneCV.mouse-over {
            border: 2px dashed rgba(0, 0, 0, .5);
            color: rgba(0, 0, 0, .5);
        }


        /*If you dont want the button*/
        #clickHereCV {
            position: absolute;
            cursor: pointer;
            left: 50%;
            top: 50%;
            margin-left: -50px;
            margin-top: 20px;
            line-height: 26px;
            color: white;
            font-size: 12px;
            width: 100px;
            height: 26px;
            border-radius: 4px;
            background-color: #3b85c3;

        }

        #clickHereCV:hover {
            background-color: #4499DD;

        }

        #drop-zoneCUD {
            border: 2px dashed rgba(0, 0, 0, .3);
            border-radius: 20px;
            text-align: center;
            line-height: 180px;
            font-size: 20px;
            color: rgba(0, 0, 0, .3);
        }

        #drop-zoneCUD input {
            /*Important*/
            position: absolute;
            /*Important*/
            cursor: pointer;
            left: 0;
            top: 0;
            /*Important This is only comment out for demonstration purposes.
			opacity:0; */
        }

        /*Important*/
        #drop-zoneCUD.mouse-over {
            border: 2px dashed rgba(0, 0, 0, .5);
            color: rgba(0, 0, 0, .5);
        }


        /*If you dont want the button*/
        #clickHereCUD {
            position: absolute;
            cursor: pointer;
            left: 50%;
            top: 50%;
            margin-left: -50px;
            margin-top: 20px;
            line-height: 26px;
            color: white;
            font-size: 12px;
            width: 100px;
            height: 26px;
            border-radius: 4px;
            background-color: #3b85c3;

        }

        #clickHereCUD:hover {
            background-color: #4499DD;

        }

        .myButton {
            box-shadow: 2px 2px 4px 0px #bfbfbf;
            background-color: #ffffff;
            border-radius: 4px;
            border: 1px solid #ffffff;
            display: inline-block;
            cursor: pointer;
            color: #bababa;
            padding: 16px 31px;
            height: 2.5rem;
        }

        .myButton:hover,
        .myButton:focus,
        .myButton:active,
        .myButton.active {
            background-color: #bababa !important;
        }

        .myButton2:hover,
        .myButton2:focus,
        .myButton2:active,
        .myButton2.active {
            background-color: #318de6 !important;
        }

        .myButton2 {
            background-color: #318de6 !important;
        }

        .btn-info:hover,
        .btn-info:focus,
        .btn-info:active,
        .btn-info.active {
            background-color: #318de6 !important;
        }

        .btn-info {
            background-color: #318de6 !important;
        }

        ,

        .btn-link {
            color: black !important;
        }

        .btn-link:hover,
        .btn-link:focus,
        .btn-link:active,
        .btn-link.active {
            background: none !important;
        }
	</style>
	<div id="incluyeme-login-wpjb">
        <?php
        if (in_array('administrator', $current_user->roles)) {
            ?>
			<div class="container pt-0">
				<div v-if="name" class="card">
					<div class="card-body">
						<h5 class="card-title">Etiquetas</h5>
						<form v-if="checkBoxesInpu">
							<div v-for="tag in tagsData" class="form-check" :key="tag.id">
								<label class="form-check-label" :for="tag.id">
									<input class="form-check-input" type="checkbox" v-model="tag.selected" :id="tag.id"
									       :name="tag.id">
									{{ tag.label }}
								</label>
							</div>
							<div class="m-2">
								<button @click="editTags" type="button" class="btn btn-success">Atras</button>
								<button @click="editTagsSave" type="button" class="btn btn-primary">Guardar</button>
							</div>
						</form>
						<div v-else id="tagsShow" class="d-flex">
							<div v-for="tag in tagsData" :key="tag.id" class="form-check" v-if="tag.selected">
								<label class="fw-bold" :for="tag.id">
									<strong>
										{{ tag.label }}
									</strong>
								</label>
							</div>
						</div>
						<button v-if="!checkBoxesInpu" @click="editTags" class="btn btn-primary m-2">Editar</button>
					</div>
				</div>
			</div>
        <?php } ?>
		<div id="incluyeme-login-comments" class="container pt-3">
			<x-incluyeme class="row">
				<x-incluyeme class="col-md-6" id="step2">
					<x-incluyeme class="row">
						<x-incluyeme class="col-12">
							<label for="names"><b>Nombre y apellido:</b> {{name}}</label>
						</x-incluyeme>
						<x-incluyeme class="col-12">
							<label><b>Género:</b> {{genre}} </label>
						</x-incluyeme>
						<x-incluyeme class="col-12">
							<label for="dateBirthDay"> <b>Fecha de Nacimiento:</b> {{dateBirthDay}}</label>
						</x-incluyeme>
						<div class="col-12">
							<label for="mPhone"><b>Teléfono Celular:</b> {{mPhone}} {{phone}}</label>
						</div>
						<div class="col-12">
							<label for="mPhone"><b>Teléfono Fijo:</b> {{fPhone}} {{fiPhone}}</label>
						</div>
						<div class="col-12">
							<label for="mPhone"><b><?php _e((get_option($incluyemeLoginEstado) ? get_option($incluyemeLoginEstado) : ' Provincia/Estado'), "incluyeme-login-extension"); ?>
									:</b> {{state}}</label>
						</div>
						<div class="col-12">
							<label for="mPhone"><b>Ciudad:</b> {{city || 'Sin datos'}}</label>
						</div>
						<div class="col-12">
							<label for="mPhone"><b>Calle:</b> {{street || 'Sin datos'}}</label>
						</div>
						<div class="col-12">
							<label><b>Area Preferida:</b> {{getPrefersJobsName(preferJobs)}}<label>
						</div>
						<div class="col-12" v-if="myCUD">
							<a v-if="myCUD"
							   target="_blank"
							   :href="myCUD"><?php echo get_option($incluyemeNames) ? get_option($incluyemeNames) : 'Certificado Único de Discapacidad'; ?></a>
						</div>
						<div class="col-12" v-if="myCV">
							<a v-if="myCV"
							   target="_blank"
							   :href="myCV">Curriculum Vitae</a>
						</div>
					</x-incluyeme>
				</x-incluyeme>
				
				<x-incluyeme class="col-md-6" v-if="myIMG" id="step7">
					<x-incluyeme class="row">
						<div class="col-12 text-center">
							<img style="max-height: 17rem;" v-if="myIMG" :src="myIMG" alt="Imagen de perfil">
						</div>
					</x-incluyeme>
				</x-incluyeme>
			</x-incluyeme>
			<template id="step6">
				<x-incluyeme class="row">
					<div class="col-12">
						<label class=''><b>disCapacidad</b></label>
					</div>
				</x-incluyeme>
				<x-incluyeme id="accordion">
					<x-incluyeme v-if="motriz" class="card">
						<x-incluyeme class="card-header p-0 m-0" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
								        aria-expanded="true" aria-controls="collapseOne">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Motriz</h5>
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collapseOne" class="collapse show" aria-labelledby="headingOne"
						             data-parent="#accordion">
							<x-incluyeme class="card-body">
								<div class="container pt-0">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span>¿Puedes permanecer de pie?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mPieS"
												       value="Si" v-model="mPie" name="mPie" disabled>
												<label class="form-check-label"
												       for="mPieS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mPie"
												       value="No" v-model="mPie" name="mPie" disabled>
												<label class="form-check-label"
												       for="mPie"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Puedes mantenerte sentado/a? </span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mSenS"
												       value="Si" v-model="mSen" name="mSen" disabled>
												<label class="form-check-label"
												       for="mSenS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mSen"
												       value="No" v-model="mSen" name="mSen" disabled>
												<label class="form-check-label"
												       for="mSen"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Puedes subir y bajar escaleras?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mEscaS"
												       value="Si" v-model="mEsca" name="mEsca" disabled>
												<label class="form-check-label"
												       for="mEscaS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mEsca"
												       value="No" v-model="mEsca" name="mEsca" disabled>
												<label class="form-check-label"
												       for="mEsca"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Tienes movilidad en tus brazos?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mBrazoS"
												       value="Si" v-model="mBrazo" name="mBrazo" disabled>
												<label class="form-check-label"
												       for="mBrazoS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mBrazo"
												       value="No" v-model="mBrazo" name="mBrazo" disabled>
												<label class="form-check-label"
												       for="mBrazo"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Puedes tomar peso?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="peso"
												       value="No" v-model="peso" name="peso" disabled>
												<label class="form-check-label"
												       for="peso"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="pesoKg"
												       value="Hasta 5 Kg" v-model="peso" name="peso" disabled>
												<label class="form-check-label"
												       for="pesoKg"
												       style="color: black"><?php _e("Hasta 5 Kg", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="peso10"
												       value="Hasta 10 Kg" v-model="peso" name="peso" disabled>
												<label class="form-check-label"
												       for="peso10"
												       style="color: black"><?php _e("Hasta 10 Kg", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="peso20"
												       value="Hasta 20 Kg" v-model="peso" name="peso" disabled>
												<label class="form-check-label"
												       for="peso20"
												       style="color: black"><?php _e("Hasta 20 Kg", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Utilizas silla de ruedas?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mRuedaS"
												       value="Si" v-model="mRueda" name="mRueda" disabled>
												<label class="form-check-label"
												       for="mRuedaS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mRueda"
												       value="No" v-model="mRueda" name="mRueda" disabled>
												<label class="form-check-label"
												       for="mRueda"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Utilizas ayudas técnicas para desplazarte?
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="desplazarte"
											       value="Bastón" v-model="desplazarte" name="desplazarte" disabled>
											<label class="form-check-label"
											       for="desplazarte"
											       style="color: black"><?php _e("Bastón", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="Muletas"
											       value="Muletas" v-model="desplazarte" name="desplazarte" disabled>
											<label class="form-check-label"
											       for="Muletas"
											       style="color: black"><?php _e("Muletas", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="Otros"
											       value="Otros" v-model="desplazarte" name="desplazarte" disabled>
											<label class="form-check-label"
											       for="Otros"
											       style="color: black"><?php _e("Otros", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Puedes realizar tareas de precisión con tus manos, por ejemplo,
										      digitación? </span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mDigiS"
												       value="Si" v-model="mDigi" name="mDigi" disabled>
												<label class="form-check-label"
												       for="mDigiS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="mDigi"
												       value="No" v-model="mDigi" name="mDigi" disabled>
												<label class="form-check-label"
												       for="mDigi"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
									</x-incluyeme>
								</div>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme v-if="visceral" class="card">
						<x-incluyeme class="card-header m-0 p-0" id="headingTwo">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
								        aria-expanded="false" aria-controls="collapseTwo">
									
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Visceral</h5>
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
						             data-parent="#accordion">
							<div class="card-body">
								<div class="container pt-0">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span> ¿Tienes alguna dificultad en trabajar en ambientes húmedos?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vHumedos"
												       value="Si" v-model="vHumedos" name="vHumedos" disabled>
												<label class="form-check-label"
												       for="vHumedos"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vHumedosS"
												       value="No" v-model="vHumedos" name="vHumedos" disabled>
												<label class="form-check-label"
												       for="vHumedosS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
								<span>¿Presentas alguna dificultad al trabajar en ambientes con alta o baja
temperatura? </span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vTemp"
												       value="Si" v-model="vTemp" name="vTemp" disabled>
												<label class="form-check-label"
												       for="vTemp"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vTempN"
												       value="No" v-model="vTemp" name="vTemp" disabled>
												<label class="form-check-label"
												       for="vTempN"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Tienes dificultades para trabajar en ambientes con polvo?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vPolvo"
												       value="Si" v-model="vPolvo" name="vPolvo" disabled>
												<label class="form-check-label"
												       for="vPolvo"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vPolvov"
												       value="No" v-model="vPolvo" name="vPolvo" disabled>
												<label class="form-check-label"
												       for="vPolvov"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Tienes la posibilidad de trabajar durante una jornada completa sin
dificultad?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vCompleta"
												       value="Si" v-model="vCompleta" name="vCompleta" disabled>
												<label class="form-check-label"
												       for="vCompleta"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vCompletaS"
												       value="No" v-model="vCompleta" name="vCompleta" disabled>
												<label class="form-check-label"
												       for="vCompletaS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Requieres alguna adaptación para realizar tu trabajo?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vAdap"
												       value="Jornada Parcial" v-model="vAdap" name="vAdap" disabled>
												<label class="form-check-label"
												       for="vAdap"
												       style="color: black"><?php _e("Jornada parcial", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vAdapS"
												       value="Turnos Fijos" v-model="vAdap" name="vAdap" disabled>
												<label class="form-check-label"
												       for="vAdapS"
												       style="color: black"><?php _e("Turnos fijos", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vAdapAS"
												       value="Permisos para salidas medicas" v-model="vAdap"
												       name="vAdap" disabled>
												<label class="form-check-label"
												       for="vAdapAS"
												       style="color: black"><?php _e("Permiso para salidas médicas", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<label class="form-check-label mr-2"
												       style="color: black; font-weight: 400"
												       for='vSalidas'><?php _e("Otro", "incluyeme-login-extension"); ?></label>
												<input class="form-check-input" type="text" id="vSalidas"
												       v-model="vAdap" name="vAdap" disabled>
											</x-incluyeme>
										</x-incluyeme>
									</x-incluyeme>
								</div>
							</div>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme v-if="auditiva" class="card">
						<x-incluyeme class="card-header m-0 p-0" id="headingThree">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collapseThree"
								        aria-expanded="false" aria-controls="collapseThree">
									
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Auditiva</h5>
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collapseThree" class="collapse" aria-labelledby="headingThree"
						             data-parent="#accordion">
							<x-incluyeme class="card-body">
								<div class="container pt-0">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span>¿Puedes discriminar distintos sonidos del ambiente?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aAmbient"
												       value="Si" v-model="aAmbient" name="aAmbient" disabled>
												<label class="form-check-label"
												       for="aAmbient"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aAmbientS"
												       value="No" v-model="aAmbient" name="aAmbient" disabled>
												<label class="form-check-label"
												       for="aAmbientS"
												       style="color: black"> <?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Utilizas lenguaje oral?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aOral"
												       value="Si" v-model="aOral" name="aOral" disabled>
												<label class="form-check-label"
												       for="aOral"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aOralN"
												       value="No" v-model="aOral" name="aOral" disabled>
												<label class="form-check-label"
												       for="aOralN"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Utilizas lengua de señas para comunicarte?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aSennas"
												       value="Si" v-model="aSennas" name="aSennas" disabled>
												<label class="form-check-label"
												       for="aSennas"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aSennasS"
												       value="No" v-model="aSennas" name="aSennas" disabled>
												<label class="form-check-label"
												       for="aSennasS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Puedes utilizar lectura labial?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aLabial"
												       value="Si" v-model="aLabial" name="aLabial" disabled>
												<label class="form-check-label"
												       for="aLabial"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aLabialS"
												       value="No" v-model="aLabial" name="aLabial" disabled>
												<label class="form-check-label"
												       for="aLabialS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿En un ambiente con distintas fuentes sonoras (por ejemplo: oficina) puedes establecer una comunicación oral fluida con otra persona?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aBajo"
												       value="Si" v-model="aBajo" name="aBajo" disabled>
												<label class="form-check-label"
												       for="aBajo"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aBajoS"
												       value="No" v-model="aBajo" name="aBajo" disabled>
												<label class="form-check-label"
												       for="aBajoS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Puedes establecer una comunicación fluida vía telefónica?(sin uso de mensajería o chat)</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aFluida"
												       value="Si" v-model="aFluida" name="aFluida" disabled>
												<label class="form-check-label"
												       for="aFluida"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aFluidaS"
												       value="No" v-model="aFluida" name="aFluida" disabled>
												<label class="form-check-label"
												       for="aFluidaS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Utilizas alguna ayuda técnica?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aImplante"
												       value="Implante" v-model="aImplante" name="aImplante" disabled>
												<label class="form-check-label"
												       for="aImplante"
												       style="color: black"><?php _e("Implante", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="aImplantes"
												       value="Audífonos" v-model="aImplante" name="aImplante" disabled>
												<label class="form-check-label"
												       for="aImplantes"
												       style="color: black"><?php _e("Audífonos", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<label class="form-check-label mr-2"
												       style="color: black; font-weight: 400"
												       for="aImplantesText"><?php _e("Otro", "incluyeme-login-extension"); ?></label>
												<input class="form-check-input" type="text" id="aImplantesText"
												       v-model="aImplante" name="aImplante" placeholder="" disabled>
											</x-incluyeme>
										</x-incluyeme>
									</x-incluyeme>
								</div>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme v-if='visual' class="card">
						<x-incluyeme class="card-header m-0 p-0" id="headingFive">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collapseFive"
								        aria-expanded="false" aria-controls="collapseFive">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Visual</h5>
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collapseFive" class="collapse" aria-labelledby="headingFive"
						             data-parent="#accordion">
							<x-incluyeme class="card-body">
								<div class="container pt-0">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span> ¿Tienes dificultades para distinguir objetos que estén lejos?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vLejos"
												       value="Si" v-model="vLejos" name="vLejos" disabled>
												<label class="form-check-label"
												       for="vLejos"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vLejosS"
												       value="No" v-model="vLejos" name="vLejos" disabled>
												<label class="form-check-label"
												       for="vLejosS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
								<span>¿Tienes dificultades en distinguir objetos o textos a una
distancia próxima?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vObservar"
												       value="Si" v-model="vObservar" name="vObservar" disabled>
												<label class="form-check-label"
												       for="vObservar"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vObservarS"
												       value="No" v-model="vObservar" name="vObservar" disabled>
												<label class="form-check-label"
												       for="vObservarS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Discriminas colores?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vColores"
												       value="Si" v-model="vColores" name="vColores" disabled>
												<label class="form-check-label"
												       for="vColores"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vColoresS"
												       value="No" v-model="vColores" name="vColores" disabled>
												<label class="form-check-label"
												       for="vColoresS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Puede identificar elementos visuales que se encuentren en
distintos planos, por ejemplo: adelante o atrás (perspectiva)?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vDPlanos"
												       value="Si" v-model="vDPlanos" name="vDPlanos" disabled>
												<label class="form-check-label"
												       for="vDPlanos"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vDPlanos"
												       value="No" v-model="vDPlanos" name="vDPlanos" disabled>
												<label class="form-check-label"
												       for="vDPlanosS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Utilizas alguna ayuda técnica?
										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vTecniA"
												       value="Lectores de pantalla
como Jaws o Lupa" v-model="vTecniA" name="vTecniA" disabled>
												<label class="form-check-label"
												       for="vTecniA"
												       style="color: black"><?php _e("Lectores de pantalla
como Jaws o Lupa", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vTecniAS"
												       value="Aumentadores de letras" v-model="vTecniA" name="vTecniA"
												       disabled>
												<label class="form-check-label"
												       for="vTecniAS"
												       style="color: black"><?php _e("Aumentadores de letras", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="vTecniASS"
												       value="Anteojos" v-model="vTecniA" name="vTecniAS" disabled>
												<label class="form-check-label"
												       for="vTecniASS"
												       style="color: black"><?php _e("Anteojos", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<label class="form-check-label mr-2"
												       style="color: black; font-weight: 400"
												       for="vTecniAvAS"><?php _e("Otro", "incluyeme-login-extension"); ?></label>
												<input class="form-check-input" type="text" id="vTecniAvAS"
												       v-model="vTecniA" name="vTecniAvAS"
												       disabled>
											</x-incluyeme>
										</x-incluyeme>
									</x-incluyeme>
								</div>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme v-if="intelectual" class="card">
						<x-incluyeme class="card-header m-0 p-0" id="headingFourt">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collatseFourt"
								        aria-expanded="false" aria-controls="collatseFourt">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Intelectual</h5>
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collatseFourt" class="collapse" aria-labelledby="headingFourt"
						             data-parent="#accordion">
							<x-incluyeme class="card-body">
								<div class="container pt-0">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span>¿Sabes leer y escribir?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteEscri"
												       value="Si" v-model="inteEscri" name="inteEscri" disabled>
												<label class="form-check-label"
												       for="inteEscri"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteEscriS"
												       value="No" v-model="inteEscri" name="inteEscri" disabled>
												<label class="form-check-label"
												       for="inteEscriS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Usas el transporte público como bus, micro, metro, combi, subte, tren, etc.?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTransla"
												       value="Si" v-model="inteTransla" name="inteTransla" disabled>
												<label class="form-check-label"
												       for="inteTransla"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTranslaS"
												       value="No" v-model="inteTransla" name="inteTransla" disabled>
												<label class="form-check-label"
												       for="inteTranslaS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Cuando te equivocas te enoja que te lo digan?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteActividad"
												       value="Si" v-model="inteActividad" name="inteActividad" disabled>
												<label class="form-check-label"
												       for="inteActividad"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteActividadS"
												       value="No" v-model="inteActividad" name="inteActividad" disabled>
												<label class="form-check-label"
												       for="inteActividadS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Te enoja si en tu trabajo te cambian las tareas?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteMolesto"
												       value="Si" v-model="inteMolesto" name="inteMolesto" disabled>
												<label class="form-check-label"
												       for="inteMolesto"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteMolestoS"
												       value="No" v-model="inteMolesto" name="inteMolesto" disabled>
												<label class="form-check-label"
												       for="inteMolestoS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Te gusta trabajar solo?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajar"
												       value="Si" v-model="inteTrabajar" name="inteTrabajar" disabled>
												<label class="form-check-label"
												       for="inteTrabajar"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarS"
												       value="No" v-model="inteTrabajar"
												       name="inteTrabajar" disabled>
												<label class="form-check-label"
												       for="inteTrabajarS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Te gusta trabajar con otras personas?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarOP"
												       value="Si" v-model="inteTrabajarOP" name="inteTrabajarOP"
												       disabled>
												<label class="form-check-label"
												       for="inteTrabajarOP"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarOPS"
												       value="No" v-model="inteTrabajarOP"
												       name="inteTrabajarOP" disabled>
												<label class="form-check-label"
												       for="inteTrabajarOPS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>Prefieres trabajar en: ¿Dónde te gusta trabajar más?

										</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarSolo"
												       value="Lugares cerrados (por ejemplo oficinas)"
												       v-model="inteTrabajarSolo"
												       name="inteTrabajarSolo" disabled>
												<label class="form-check-label"
												       for="inteTrabajarSolo"
												       style="color: black"><?php _e("Lugares cerrados (por ejemplo oficinas)", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarSoloS"
												       value="Ambientes
exteriores (por ejemplo jardines, parques, centros deportivos, otros)" v-model="inteTrabajarSolo"
												       name="inteTrabajarSolo" disabled>
												<label class="form-check-label"
												       for="inteTrabajarSoloS"
												       style="color: black"><?php _e("Ambientes
exteriores (por ejemplo jardines, parques, centros deportivos, otros)", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarSoloS2"
												       value="Me da lo mismo o no lo sé" v-model="inteTrabajarSolo"
												       name="inteTrabajarSolo" disabled>
												<label class="form-check-label"
												       for="inteTrabajarSoloS2"
												       style="color: black"><?php _e("Me da lo mismo o no lo sé", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
									</x-incluyeme>
								</div>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme v-if="psiquica" class="card">
						<x-incluyeme class="card-header m-0 p-0" id="headingFive">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collatseFive"
								        aria-expanded="false" aria-controls="collatseFive">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;">Psíquica</h5>
								</button>
							</h5>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme v-if="habla" class="card">
						<x-incluyeme class="card-header m-0 p-0" id="headingSix">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collatseSix"
								        aria-expanded="false" aria-controls="collatseSix">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;">Habla</h5>
								</button>
							</h5>
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="row mt-3">
					<div class="col-12">
						<label for="exampleFormControlTextarea1"><b>Mas informacion:</b></label>
						<label>{{moreDis}}</label>
					</div>
				</x-incluyeme>
			</template>
			<template id="step8" v-if="titleEdu.length > 0">
				<x-incluyeme class="row">
					<x-incluyeme class="col-12">
						<label><b>Educación</b><label>
					</x-incluyeme>
				</x-incluyeme>
				<ul class="pb-0">
					<div v-for="(fieldName, pos) in formFields">
						<li v-if="titleEdu[pos]">
							<div class="row">
								<x-incluyeme class="col-12">
									<label for="country_edu"><b>Pais:</b> {{getNameCountry(country_edu[pos])}}</label>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<label for="university_edu"><b>Institución Educativa:</b>
										{{university_edu[pos] || "Sin información"}}</label>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<label for="university_eduText"><b>Otro:</b>
										{{university_otro[pos] || "Sin información"}}</label>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<label for="studies"><b>Area de Estudio</b> {{getNameArea(studies[pos])}}</label>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<label for="titleEdu"><b>Título:</b> {{titleEdu[pos]}}</label>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<label for="eduLevel"><b>Nivel Educativo:</b> {{eduLevel[pos]}}</label>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<label for="dateStudiesD"><b>Desde:</b> {{dateStudiesD[pos]}}</label>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<label for="dateStudiesH"><b>Hasta:</b> {{dateStudieB[pos] ? "En curso" :
									                                        dateStudiesH[pos] }}</label>
								</x-incluyeme>
							</div>
							<hr class="w-100" v-if="formFields.length !== 1">
						</li>
					</div>
				</ul>
			</template>
			<template id="step9" v-if="employed.length > 0">
				<x-incluyeme class="row">
					<x-incluyeme class="col-12">
						<label><b>Experiencia Laboral</b><label>
					</x-incluyeme>
				</x-incluyeme>
				<ul v-for="(formFields2, pos) in formFields2" :key="pos" class="pb-0">
					<li v-if="employed[pos] || jobs[pos]">
						<x-incluyeme class="row">
							<x-incluyeme class="col-12">
								<label for="companies"><b>Empresa:</b> {{employed[pos]}}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="studies"><b>Area:</b> {{getNameArea(areaEmployed[pos])}}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="studies"><b>Puesto:</b> {{jobs[pos]}}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="studies"><b>Nivel de Experiencia:</b> {{getLevelName(levelExperience[pos])}}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="dateStudiesD"><b>Desde:</b> {{dateStudiesDLaboral[pos]}}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="dateStudiesH"><b>Hasta:</b> {{actuWork[pos] ? "Actualmente trabajo aqui" :
								                                        dateStudiesHLaboral[pos] }}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="dateStudiesH"><b>Descripción del Puesto:</b> {{jobsDescript[pos] }}</label>
							</x-incluyeme>
						</x-incluyeme>
						<hr class="w-100" v-if="formFields2.length !== 1">
					</li>
				</ul>
			</template>
			<template id="step10" v-if="idioms.length > 0">
				<x-incluyeme class="row">
					<x-incluyeme class="col-12">
						<label><b>Idiomas</b><label>
					</x-incluyeme>
				</x-incluyeme>
				<ul class="pb-0" v-for="(formFields3, pos) in formFields3">
					<li v-if="idioms[pos]">
						<x-incluyeme class="row">
							<x-incluyeme class="col-12">
								<label for="idioms"><b>Idioma:</b> {{getIdiomName(idioms[pos])}}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="lecLevel" class=""><b>Nivel de Lectura:</b>
									{{getIdiomNameL(lecLevel[pos])}}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="lecLevel" class=""><b>Nivel de Escrito:</b>
									{{getIdiomNameL(redLevel[pos])}}</label>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<label for="lecLevel" class=""><b>Nivel Oral:</b>
									{{getIdiomNameL(oralLevel[pos])}}</label>
							</x-incluyeme>
						</x-incluyeme>
						<hr class="w-100" v-if="formFields3.length !== 1">
					</li>
				</ul>
			</template>
		</div>
        <?php if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['application_id'])) { ?>
			<div class="container pt-0">
				<div v-if="name" class="card">
					<div class="card-body">
						<h5 class="card-title">Comentarios del reclutador</h5>
						<form>
							<div class="form-group">
                                <?php if (in_array('administrator', $current_user->roles) || in_array('employer', $current_user->roles)) { ?>
									<textarea v-model="comments" class="form-control border"
									          id="exampleFormControlTextarea1"
									          rows="3"></textarea>
									<div class="m-2 text-left">
										<button @click="saveComments" type="button"
										        class="btn btn-primary">Guardar
										</button>
									</div>
                                <?php } ?>
							</div>
						</form>
					</div>
					<div class="card-footer text-muted">
						Estos comentarios NO son visibles para los candidatos
					</div>
				</div>
			</div>
        <?php } ?>
	</div>
	<script>
        function startApp() {
            app.setID('<?php echo $resume->id ?>', '<?php echo plugins_url() ?>', '<?php echo $_GET['application_id'] ?? null?>');
        }
	</script>
<?php }

