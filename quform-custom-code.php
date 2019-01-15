<?php
/*
 * Plugin Name: Quform Custom Code
 * Description: Custom code for Quform.
 * Authors: Terrence Porretto & Jorge Naquche 
 * Version: 1.0
 */
add_action('quform_pre_display_3', function (Quform_Form $form) {

    if(isset($_GET['aid'])) { // If article ID is available = this is an edit
        $aid = htmlspecialchars($_GET["aid"]);
    }

    global $wpdb;
    // Primary Catigory Selection
    $pc_results = $wpdb->get_results( "SELECT id, name FROM master_media.type WHERE id > 14 AND ID != 60", OBJECT );
    $pc_results = json_decode(json_encode($pc_results), true);
    $select_pc = $form->getElement('quform_3_109');
    
    if ($select_pc) {
        foreach ($pc_results as $pc_value) {
            $options_pc[] = array(
                'label' => $pc_value['name'], 
                'value' => $pc_value['id'], 
                'id' => $pc_value['id'],
                'icon' => 'fa fa-circle',
                'iconSelected' => 'fa fa-check'
            );
        }
        $select_pc->setOptions($options_pc);
    }

    // Catigory Selection
    $type_results = $wpdb->get_results( "SELECT id, name FROM master_media.type WHERE id > 14 AND ID != 60", OBJECT );
    $type_results = json_decode(json_encode($type_results), true);
    $select_type = $form->getElement('quform_3_7');
    
    if ($select_type) {
        foreach ($type_results as $type_value) {
            $options_type[] = array(
                'label' => $type_value['name'], 
                'value' => $type_value['id'], 
                'id' => $type_value['id'],
                'icon' => 'fa fa-circle',
                'iconSelected' => 'fa fa-check'
            );
        }
        $select_type->setOptions($options_type);
    }
    // Catigory Type Selection
    /*
    $cat_type_results = $wpdb->get_results( "SELECT id, name FROM master_media.type WHERE id < 14 OR ID = 60", OBJECT );
    $cat_type_results = json_decode(json_encode($cat_type_results), true);
    $cat_select_type = $form->getElement('quform_3_110');
    
    if ($cat_select_type) {
        foreach ($cat_type_results as $cat_type_value) {
            $cat_options_type[] = array(
                'label' => $cat_type_value['name'], 
                'value' => $cat_type_value['id'], 
                'id' => $cat_type_value['id'],
                'icon' => 'fa fa-circle',
                'iconSelected' => 'fa fa-check'
            );
        }
        $cat_select_type->setOptions($cat_options_type);
    }
    */
    // Tags
    $tag_results = $wpdb->get_results( "SELECT id, name FROM master_media.tag", OBJECT );
    $tag_results = json_decode(json_encode($tag_results), true);
    $select_tag = $form->getElement('quform_3_8');
    
    if ($select_tag) {
        foreach ($tag_results as $tag_value) {
            $options_tag[] = array(
                'label' => $tag_value['name'], 
                'value' => $tag_value['id'], 
                'id' => $tag_value['id'],
                'icon' => 'fa fa-circle',
                'iconSelected' => 'fa fa-check'
            );
        }
        $select_tag->setOptions($options_tag);
    }
    // Content Level
    $cl_results = $wpdb->get_results( "SELECT id, name FROM master_media.premium", OBJECT );
    $cl_results = json_decode(json_encode($cl_results), true);
    $select_cl = $form->getElement('quform_3_99');
    
    if ($select_cl) {
        foreach ($cl_results as $cl_value) {
            $options_cl[] = array(
                'label' => $cl_value['name'], 
                'value' => $cl_value['id'], 
                'id' => $cl_value['id'],
                'icon' => 'fa fa-circle',
                'iconSelected' => 'fa fa-check'
            );
        }
        $select_cl->setOptions($options_cl);
    }
    // Author Select
    $author_results = $wpdb->get_results( "SELECT username, name, id FROM master_media.author", OBJECT );
    $au_results = json_decode(json_encode($author_results), true);
    $select_author = $form->getElement('quform_3_107');

    if ($select_author) {
        foreach ($au_results as $au_value) {
            $options_author[] = array(
                'label' => $au_value['name'], 
                'value' => $au_value['id'], 
                'id' => $au_value['username'],
                'icon' => 'fa fa-circle',
                'iconSelected' => 'fa fa-check'
            );
        }
        $select_author->setOptions($options_author);
    }
    // Final Decision
    $final_decision_results = $wpdb->get_results( "SELECT id, name FROM master_media.status_master ORDER BY id DESC", OBJECT );
    $final_decision_results = json_decode(json_encode($final_decision_results), true);
    $final_decision = $form->getElement('quform_3_35');
    
    if ($final_decision) {
        foreach ($final_decision_results as $fd_value) {
            $options_fd[] = array(
                'label' => $fd_value['name'], 
                'value' => $fd_value['id'], 
                'id' => $fd_value['id'],
                'icon' => 'fa fa-circle',
                'iconSelected' => 'fa fa-check'
            );
        }
        $final_decision->setOptions($options_fd);
    }

    $body_fill = "";
    $editorid_1 = "quform_3_21";
    $editorid_2 = "quform_3_4";
    $editorid_3 = "quform_3_69";
    $editorid_4 = "quform_3_71";
    $editorid_5 = "quform_3_25";
    $editorid_6 = "quform_3_73";
    $editorid_7 = "quform_3_45";
    $editorid_8 = "quform_3_75";
    $editorid_9 = "quform_3_47";
    $editorid_10 = "quform_3_77";
    $editorid_11 = "quform_3_67";
    $editorid_12 = "quform_3_79";
    $editorid_13 = "quform_3_64";
    $editorid_14 = "quform_3_81";
    $editorid_15 = "quform_3_61";
    $editorid_16 = "quform_3_83";
    $editorid_17 = "quform_3_58";
    $editorid_18 = "quform_3_85";
    $editorid_19 = "quform_3_55";

    $editor_settings =  array ('wpautop'          => true,   // Whether to use wpautop for adding in paragraphs. Note that the paragraphs are added automatically when wpautop is false.
                                'media_buttons'    => false,   // Whether to display media insert/upload buttons
                                'textarea_rows'    => get_option( 'default_post_edit_rows', 10 ),  // The number of rows to display for the textarea
                                'tabindex'         => '',     // The tabindex value used for the form field
                                'editor_css'       => '',     // Additional CSS styling applied for both visual and HTML editors buttons, needs to include <style> tags, can use "scoped"
                                'editor_class'     => '',     // Any extra CSS Classes to append to the Editor textarea
                                'teeny'            => false,  // Whether to output the minimal editor configuration used in PressThis
                                'dfw'              => false,  // Whether to replace the default fullscreen editor with DFW (needs specific DOM elements and CSS)
                                'tinymce'          => true,   // Load TinyMCE, can be used to pass settings directly to TinyMCE using an array
                                'quicktags'        => true,   // Load Quicktags, can be used to pass settings directly to Quicktags using an array. Set to false to remove your editor's Visual and Text tabs.
                                'drag_drop_upload' => false);  // Enable Drag & Drop Upload Support (since WordPress 3.9)

    $editor_settings['textarea_name'] = $editorid_1;
    $settings_1 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_2;
    $settings_2 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_3;
    $settings_3 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_4;
    $settings_4 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_5;
    $settings_5 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_6;
    $settings_6 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_7;
    $settings_7 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_8;
    $settings_8 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_9;
    $settings_9 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_10;
    $settings_10 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_11;
    $settings_11 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_12;
    $settings_12 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_13;
    $settings_13 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_14;
    $settings_14 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_15;
    $settings_15 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_16;
    $settings_16 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_17;
    $settings_17 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_18;
    $settings_18 = $editor_settings;

    $editor_settings['textarea_name'] = $editorid_19;
    $settings_19 = $editor_settings;
// IF we have an article ID this is an edit. TODO: figure out a way to block editors that have no rights
    if($aid){
            $aid_results = $wpdb->get_results( "SELECT id, title, seo_slug, author_id, lg_id, intro, sts, summary, conclusion, premium, canonical_link FROM master_media.article WHERE id = $aid", ARRAY_A );
            $aid_results_sections = $wpdb->get_results( "SELECT aid.id, aid.title, aid.intro, atext.id, atext.h2, atext.h2_body, atext.h3, atext.h3_body, atext.section FROM master_media.article AS aid INNER JOIN master_media.article_text AS atext ON atext.article_id = aid.id WHERE aid.id = $aid", ARRAY_A );
            $aid_results_types = $wpdb->get_results( "SELECT aid.id, atype.article_id, atype.type_id, atype.primary_type FROM master_media.article AS aid INNER JOIN master_media.article_type AS atype ON atype.article_id = aid.id WHERE aid.id = $aid AND atype.primary_type = 0", ARRAY_A );
            $aid_results_pcs = $wpdb->get_results( "SELECT aid.id, atype.article_id, atype.type_id, atype.primary_type FROM master_media.article AS aid INNER JOIN master_media.article_type AS atype ON atype.article_id = aid.id WHERE aid.id = $aid AND atype.primary_type = 1", ARRAY_A );
            $aid_results_tags = $wpdb->get_results( "SELECT aid.id, atag.article_id, atag.tag_id FROM master_media.article AS aid INNER JOIN master_media.article_tag AS atag ON atag.article_id = aid.id WHERE aid.id = $aid", ARRAY_A );
            $aid_results_resources = $wpdb->get_results("SELECT aid.id, mr.article_id, mr.type, mr.filename, mr.id AS mrid FROM master_media.article AS aid INNER JOIN master_media.resource AS mr ON mr.article_id = aid.id WHERE aid.id = $aid ORDER BY mrid DESC", ARRAY_A);
            $aid_results_author = $wpdb->get_results("SELECT aid.id, aid.author_id, aut.id, aut.username, aut.name FROM master_media.article AS aid INNER JOIN master_media.author AS aut ON aut.id = aid.author_id WHERE aid.id = $aid", ARRAY_A);

            if ($aid_results[0]['intro']) {
            $editorid_1_intro = $aid_results[0]['intro'];
            }
            if ($aid_results_sections[0]['h2_body'] || $aid_results_sections[0]['h3_body']) {
            $editorid_2_h2 = $aid_results_sections[0]['h2_body'];
            $editorid_2_h3 = $aid_results_sections[0]['h3_body'];
            }
            if ($aid_results_sections[1]['h2_body'] || $aid_results_sections[1]['h3_body']) {
            $editorid_3_h2 = $aid_results_sections[1]['h2_body'];
            $editorid_3_h3 = $aid_results_sections[1]['h3_body'];
            }
            if ($aid_results_sections[2]['h2_body'] || $aid_results_sections[2]['h3_body']) {
            $editorid_4_h2 = $aid_results_sections[2]['h2_body'];
            $editorid_4_h3 = $aid_results_sections[2]['h3_body'];
            }
            if ($aid_results_sections[3]['h2_body'] || $aid_results_sections[3]['h3_body']) {
            $editorid_5_h2 = $aid_results_sections[3]['h2_body'];
            $editorid_5_h3 = $aid_results_sections[3]['h3_body'];
            }
            if ($aid_results_sections[4]['h2_body'] || $aid_results_sections[4]['h3_body']) {
            $editorid_6_h2 = $aid_results_sections[4]['h2_body'];
            $editorid_6_h3 = $aid_results_sections[4]['h3_body'];
            }
            if ($aid_results_sections[5]['h2_body'] || $aid_results_sections[5]['h3_body']) {
            $editorid_7_h2 = $aid_results_sections[5]['h2_body'];
            $editorid_7_h3 = $aid_results_sections[5]['h3_body'];
            }
            if ($aid_results_sections[6]['h2_body'] || $aid_results_sections[6]['h3_body']) {
            $editorid_8_h2 = $aid_results_sections[6]['h2_body'];
            $editorid_8_h3 = $aid_results_sections[6]['h3_body'];
            }
            if ($aid_results_sections[7]['h2_body'] || $aid_results_sections[7]['h3_body']) {
            $editorid_9_h2 = $aid_results_sections[7]['h2_body'];
            $editorid_9_h3 = $aid_results_sections[7]['h3_body'];
            }
            if ($aid_results_sections[8]['h2_body'] || $aid_results_sections[8]['h3_body']) {
            $editorid_10_h2 = $aid_results_sections[8]['h2_body'];
            $editorid_10_h3 = $aid_results_sections[8]['h3_body'];
            }
        
            wp_editor($editorid_1_intro, $editorid_1, $settings_1);
            wp_editor($editorid_2_h2, $editorid_2, $settings_2);
            wp_editor($editorid_2_h3, $editorid_3, $settings_3);
            wp_editor($editorid_3_h2, $editorid_4, $settings_4);
            wp_editor($editorid_3_h3, $editorid_5, $settings_5);
            wp_editor($editorid_4_h2, $editorid_6, $settings_6);
            wp_editor($editorid_4_h3, $editorid_7, $settings_7);
            wp_editor($editorid_5_h2, $editorid_8, $settings_8);
            wp_editor($editorid_5_h3, $editorid_9, $settings_9);
            wp_editor($editorid_6_h2, $editorid_10, $settings_10);
            wp_editor($editorid_6_h3, $editorid_11, $settings_11);
            wp_editor($editorid_7_h2, $editorid_12, $settings_12);
            wp_editor($editorid_7_h3, $editorid_13, $settings_13);
            wp_editor($editorid_8_h2, $editorid_14, $settings_14);
            wp_editor($editorid_8_h3, $editorid_15, $settings_15);
            wp_editor($editorid_9_h2, $editorid_16, $settings_16);
            wp_editor($editorid_9_h3, $editorid_17, $settings_17);
            wp_editor($editorid_10_h2, $editorid_18, $settings_18);
            wp_editor($editorid_10_h3, $editorid_19, $settings_19);

            $form->setValues(array(
                'quform_3_3' => $aid_results[0]['title'],
                'quform_3_115' => $aid_results[0]['seo_slug'],
                'quform_3_22'=> $aid_results[0]['summary'],
                'quform_3_89'=> $aid_results[0]['conclusion'],
                // Article Titles and Subtitles
                'quform_3_23'=> $aid_results_sections[0]['h2'],
                'quform_3_68'=> $aid_results_sections[0]['h3'],
                'quform_3_24'=> $aid_results_sections[1]['h2'],
                'quform_3_70'=> $aid_results_sections[1]['h3'],
                'quform_3_44'=> $aid_results_sections[2]['h2'],
                'quform_3_72'=> $aid_results_sections[2]['h3'],
                'quform_3_46'=> $aid_results_sections[3]['h2'],
                'quform_3_74'=> $aid_results_sections[3]['h3'],
                'quform_3_66'=> $aid_results_sections[4]['h2'],
                'quform_3_76'=> $aid_results_sections[4]['h3'],
                'quform_3_63'=> $aid_results_sections[5]['h2'],
                'quform_3_78'=> $aid_results_sections[5]['h3'],
                'quform_3_60'=> $aid_results_sections[6]['h2'],
                'quform_3_80'=> $aid_results_sections[6]['h3'],
                'quform_3_57'=> $aid_results_sections[7]['h2'],
                'quform_3_82'=> $aid_results_sections[7]['h3'],
                'quform_3_54'=> $aid_results_sections[8]['h2'],
                'quform_3_84'=> $aid_results_sections[8]['h3'],
                'quform_3_35' => $aid_results[0]['sts'],
                'quform_3_20' => $aid_results[0]['featured'],
                'quform_3_99' => $aid_results[0]['premium'],
                'quform_3_116' => $aid_results[0]['canonical_link']
            ));

            $form->setValue('quform_3_109', $aid_results_pcs[0]['type_id']);

            $author_value = $form->getElement('quform_3_107');

            if ($author_value) {
                $author_value->setValue($aid_results_author[0]['id']);
            }

            $stype = $form->getElement('quform_3_7');
            if ($stype) {
                $stypes = array();
                foreach ($aid_results_types as $aid_results_type) {
                    $stypes[] = $aid_results_type['type_id'];
                }
                $stype->setValue($stypes);
            }

            $cat_stype = $form->getElement('quform_3_110');
            if ($cat_stype) {
                $cat_stypes = array();
                foreach ($aid_results_types as $aid_results_type) {
                    $cat_stypes[] = $aid_results_type['type_id'];
                }
                $cat_stype->setValue($cat_stypes);
            }

            $stag = $form->getElement('quform_3_8');
            if ($stag) {
                $stags = array();
            
                foreach ($aid_results_tags as $aid_results_tag) {
                    $stags[] = $aid_results_tag['tag_id'];
                }
            
                $stag->setValue($stags);
            }

            $resource = "<div id='article_media_resources' class='row'>";
            if($aid_results_resources) {
                foreach ($aid_results_resources as $aid_results_resource) { // Embed Links
                    if($aid_results_resource['type'] == 1){ // Audio
                        $resource .= '<div class="col-md-3"><div class="delete_source"><i class="fa fa-times-circle fa-3x"></i></div><a class="article_resource_link" id="' . $aid_results_resource['mrid'] . '" href="' . $aid_results_resource['filename'] . '" target="_blank" ><span class="fa fa-file-audio-o" alt="' . $aid_results_resource['filename'] . '"></span></a></div>';
                    }
                    if($aid_results_resource['type'] == 2){ // Video
                        $resource .= '<div class="col-md-3"><div class="delete_source"><i class="fa fa-times-circle fa-3x"></i></div><a class="article_resource_link" id="' . $aid_results_resource['mrid'] . '" href="' . $aid_results_resource['filename'] . '" target="_blank" ><span class="fa fa-video-camera" alt="' . $aid_results_resource['filename'] . '"></span></a></div>';
                        if($aid_results_author[0]['id'] == 309) {
                        $resource .= '<div id="article_preview_player"><link href="https://vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">';
                        $resource .= '<video id="my-video" class="video-js vjs-16-9 vjs-big-play-centered" controls preload="auto" width="720" poster="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/file-video-icon.png" data-setup="{}">';
                        $resource .= '<source src="' . $aid_results_resource['filename'] . '" type="video/mp4"><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p></video><script src="https://vjs.zencdn.net/7.1.0/video.js"></script></div>';
                        }
                    }
                    if($aid_results_resource['type'] == 3){ // Images
                        // $form->setValue('quform_3_112', $aid_results_resource['filename']);
                        $resource .= '<div class="col-md-3"><div class="delete_source"><i id="delete_image" class="fa fa-times-circle fa-3x"></i></div><a class="article_resource_obj" id="' . $aid_results_resource['mrid'] . '" href="' . $aid_results_resource['filename'] . '" target="_blank" ><img src="' . $aid_results_resource['filename'] . '" width="55%" height="55%" alt="' . $aid_results_resource['filename'] . '" style="object-fit: cover;"></a></div>';
                    }
                    if($aid_results_resource['type'] == 4 ){ // Attachments
                        $resource .= '<div class="col-md-3"><div class="delete_source"><i class="fa fa-times-circle fa-3x"></i></div><a class="article_resource_atth" id="' . $aid_results_resource['mrid'] . '" href="' . $aid_results_resource['filename'] . '" target="_blank" ><span class="fa fa-file-pdf-o" alt="' . $aid_results_resource['filename'] . '"></span></a></div>';
                    }
                }
                
            echo $resource . "</div>";
            } else {
                echo $resource . " --- nothing attached</div>";
            }

            echo "<h3>ID => $aid</h3>";           
    } else {
        wp_editor($body_fill, $editorid_1, $settings_1);
        wp_editor($body_fill, $editorid_2, $settings_2);
        wp_editor($body_fill, $editorid_3, $settings_3);
        wp_editor($body_fill, $editorid_4, $settings_4);
        wp_editor($body_fill, $editorid_5, $settings_5);
        wp_editor($body_fill, $editorid_6, $settings_6);
        wp_editor($body_fill, $editorid_7, $settings_7);
        wp_editor($body_fill, $editorid_8, $settings_8);
        wp_editor($body_fill, $editorid_9, $settings_9);
        wp_editor($body_fill, $editorid_10, $settings_10);
        wp_editor($body_fill, $editorid_11, $settings_11);
        wp_editor($body_fill, $editorid_12, $settings_12);
        wp_editor($body_fill, $editorid_13, $settings_13);
        wp_editor($body_fill, $editorid_14, $settings_14);
        wp_editor($body_fill, $editorid_15, $settings_15);
        wp_editor($body_fill, $editorid_16, $settings_16);
        wp_editor($body_fill, $editorid_17, $settings_17);
        wp_editor($body_fill, $editorid_18, $settings_18);
        wp_editor($body_fill, $editorid_19, $settings_19);
    }
});

// Start Post Form Processing 
add_action('quform_post_process_3', function (array $result, Quform_Form $form) {

    global $wpdb;

    // $author = get_current_user_id();
    
    $article_id = $form->getValueText('quform_3_52');

    // Start Update Post Process 
    if(isset($article_id) && !empty($article_id)) { // If article ID is available = this is an edit

    $all_categories = $form->getValue('quform_3_109') . "," . $form->getValueText('quform_3_7');

    //UPDATE article
	$sp_update_statement = $wpdb->prepare("CALL master_media.sp_update_media_article(%d,%s,%s,%d,%s,%s,%s,%d,%s,%s,%d,%d,%d,%s)",
        $article_id, 
        $form->getValue('quform_3_3'), // Title
        $form->getValue('quform_3_115'), // SEO Slug
        $form->getValue('quform_3_107'), // Author
        $form->getValue('quform_3_21'), // Intro
        $form->getValue('quform_3_22'), // Summary
        $form->getValue('quform_3_89'), // Conclusion
        $form->getValue('quform_3_34'), // Language
        $form->getValueText('quform_3_8'), // Tag
        $all_categories, // Category Type
        $form->getValue('quform_3_35'), // Final Process
        $form->getValue('quform_3_20'), // Featured
        $form->getValue('quform_3_99'), // User Content Level
        $form->getValue('quform_3_116'));// Cononical Links

    $wpdb->query($sp_update_statement);

    // Update Primary Article Category
    $sp_update_pc = $wpdb->prepare("CALL master_media.sp_set_primary_type(%d,%d)",
    $article_id,
    $form->getValue('quform_3_109')); // Primary Category

    $wpdb->query($sp_update_pc);

    // Check for aid 1st then check for fields ONLY FOR UPDATES
	// Section 2
	if ($form->getValue('quform_3_23') || $form->getValue('quform_3_4') || $form->getValue('quform_3_68') || $form->getValue('quform_3_69')) {
        $sp_update_sql_sec2 = $wpdb->prepare("CALL master_media.sp_update_article_text(%d,%d,%s,%s,%s,%s)",
        $article_id,2,$form->getValue('quform_3_23'),$form->getValue('quform_3_4'),$form->getValue('quform_3_68'),$form->getValue('quform_3_69')); // H3 Body 2
        $wpdb->query($sp_update_sql_sec2);
    } else {
        $sp_delete_sql_sec2 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",
        $article_id,
        2);
    	$wpdb->query($sp_delete_sql_sec2);
    }
	// Section 3
    if ($form->getValue('quform_3_24') || $form->getValue('quform_3_71') || $form->getValue('quform_3_70') || $form->getValue('quform_3_25')) {
        $sp_update_sql_sec3 = $wpdb->prepare("CALL master_media.sp_update_article_text(%d,%d,%s,%s,%s,%s)",$article_id,3,$form->getValue('quform_3_24'),$form->getValue('quform_3_71'),$form->getValue('quform_3_70'),$form->getValue('quform_3_25'));
        $wpdb->query($sp_update_sql_sec3);
    } else {
    	$sp_delete_sql_sec3 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",$article_id,3);
    	$wpdb->query($sp_delete_sql_sec3);
    }
    // Section 4
    if ($form->getValue('quform_3_44') || $form->getValue('quform_3_73') || $form->getValue('quform_3_72') || $form->getValue('quform_3_45')) {
        $sp_update_sql_sec4 = $wpdb->prepare("CALL master_media.sp_update_article_text(%d,%d,%s,%s,%s,%s)",$article_id,4,$form->getValue('quform_3_44'),$form->getValue('quform_3_73'),$form->getValue('quform_3_72'),$form->getValue('quform_3_45'));
        $wpdb->query($sp_update_sql_sec4);
    } else {
    	$sp_delete_sql_sec4 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",$article_id,4);
    	$wpdb->query($sp_delete_sql_sec4);
    }
    // Section 5
    if ($form->getValue('quform_3_46') || $form->getValue('quform_3_75') || $form->getValue('quform_3_74') || $form->getValue('quform_3_47')) {
        $sp_update_sql_sec5 = $wpdb->prepare("CALL master_media.sp_update_article_text(%d,%d,%s,%s,%s,%s)",$article_id,5,$form->getValue('quform_3_46'),$form->getValue('quform_3_75'),$form->getValue('quform_3_74'),$form->getValue('quform_3_47'));
        $wpdb->query($sp_update_sql_sec5);
    } else {
    	$sp_delete_sql_sec5 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",$article_id,5);
    	$wpdb->query($sp_delete_sql_sec5);
    }
    // Section 6
    if ($form->getValue('quform_3_66') || $form->getValue('quform_3_77') || $form->getValue('quform_3_76') || $form->getValue('quform_3_67')) {
        $sp_update_sql_sec6 = $wpdb->prepare("CALL master_media.sp_update_article_text(%d,%d,%s,%s,%s,%s)",$article_id,6,$form->getValue('quform_3_66'),$form->getValue('quform_3_77'),$form->getValue('quform_3_76'),$form->getValue('quform_3_67'));
        $wpdb->query($sp_update_sql_sec6);
    } else {
    	$sp_delete_sql_sec6 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",$article_id,6);
    	$wpdb->query($sp_delete_sql_sec6);
    }
    // Section 7
    if ($form->getValue('quform_3_63') || $form->getValue('quform_3_79') || $form->getValue('quform_3_78') || $form->getValue('quform_3_64')) {
        $sp_update_sql_sec7 = $wpdb->prepare("CALL master_media.sp_update_article_text(%d,%d,%s,%s,%s,%s)",$article_id,7,$form->getValue('quform_3_63'),$form->getValue('quform_3_79'),$form->getValue('quform_3_78'),$form->getValue('quform_3_64'));
        $wpdb->query($sp_update_sql_sec7);
    } else {
    	$sp_delete_sql_sec7 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",$article_id,7);
    	$wpdb->query($sp_delete_sql_sec7);
    }
    // Section 8
    if ($form->getValue('quform_3_60') || $form->getValue('quform_3_81') || $form->getValue('quform_3_80') || $form->getValue('quform_3_61')) {
        $sp_update_sql_sec8 = $wpdb->prepare("CALL master_media.sp_update_article_text(%d,%d,%s,%s,%s,%s)",$article_id,8,$form->getValue('quform_3_60'),$form->getValue('quform_3_81'),$form->getValue('quform_3_80'),$form->getValue('quform_3_61'));
        $wpdb->query($sp_update_sql_sec8);
    } else {
    	$sp_delete_sql_sec8 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",$article_id,8);
    	$wpdb->query($sp_delete_sql_sec8);
    }
    // Section 9
    if ($form->getValue('quform_3_57') || $form->getValue('quform_3_83') || $form->getValue('quform_3_82') || $form->getValue('quform_3_58')) {
        $sp_update_sql_sec9 = $wpdb->prepare("CALL master_media.sp_update_article_text(%d,%d,%s,%s,%s,%s)",$article_id,9,$form->getValue('quform_3_57'),$form->getValue('quform_3_83'),$form->getValue('quform_3_82'),$form->getValue('quform_3_58'));
        $wpdb->query($sp_update_sql_sec9);
    } else {
    	$sp_delete_sql_sec9 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",$article_id,9);
    	$wpdb->query($sp_delete_sql_sec9);
    }
    // Section 10 Final Section 
    if ($form->getValue('quform_3_54') || $form->getValue('quform_3_85') || $form->getValue('quform_3_84') || $form->getValue('quform_3_55')) {
        $sp_update_sql_sec10 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,10,$form->getValue('quform_3_54'),$form->getValue('quform_3_85'),$form->getValue('quform_3_84'),$form->getValue('quform_3_55'));
        $wpdb->query($sp_update_sql_sec10);
    } else {
    	$sp_delete_sql_sec10 = $wpdb->prepare("CALL master_media.sp_delete_article_text(%d,%d)",$article_id,10);
    	$wpdb->query($sp_delete_sql_sec10);
    }
    // Audio Link
    if ($form->getValueText('quform_3_43')) {
        $sp_load_audio_link = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,1,$form->getValueText('quform_3_43'));
        $wpdb->query($sp_load_audio_link);
    }
    // Video Link
    if ($form->getValueText('quform_3_51')) {
        $sp_load_video_link = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,2,$form->getValueText('quform_3_51'));
        $wpdb->query($sp_load_video_link);
    }
    // Image Upload URL
    if ($form->getValueText('quform_3_101')) {
        $sp_load_image_upload = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,3,$form->getValueText('quform_3_101'));
        $wpdb->query($sp_load_image_upload);
    }
    if ($form->getValueText('quform_3_112')) {
        $sp_load_image_url = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,3,$form->getValueText('quform_3_112'));
        $wpdb->query($sp_load_image_url);
    }
    // Attachment Upload URL
    if ($form->getValueText('quform_3_27')) {
        $sp_load_attachment_upload = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,4,$form->getValueText('quform_3_27'));
        $wpdb->query($sp_load_attachment_upload);
    }
} else {  // End Update Article IF Statment 

    $all_categories = $form->getValue('quform_3_109') . "," . $form->getValueText('quform_3_7');

    $sp_load_statement = $wpdb->prepare("CALL master_media.sp_load_WP_media_article(%s,%s,%d,%s,%s,%s,%s,%s,%s,%s,%d,%s,%s,%d,%d,%d,%s,@article_id)",
    $form->getValue('quform_3_3'), // Title
    $form->getValue('quform_3_115'), // SEO Slug
    $form->getValueText('quform_3_107'), // Author
    $form->getValue('quform_3_21'), // Intro
    $form->getValue('quform_3_23'), // H2 Title 2
    $form->getValue('quform_3_4'),  // H2 Body 2
    $form->getValue('quform_3_68'), // H3 Title 2
    $form->getValue('quform_3_69'), // H3 Body 2
    $form->getValue('quform_3_22'), // Summary
    $form->getValue('quform_3_89'), // Conclusion
    $form->getValue('quform_3_34'), // Language
    $form->getValueText('quform_3_8'), // Tag
    $all_categories, // Type
    $form->getValue('quform_3_35'), // Status
    $form->getValue('quform_3_20'), // Featured
    $form->getValue('quform_3_99'), // User Content Level
    $form->getValue('quform_3_116')); // Cononical Link

    $wpdb->query($sp_load_statement);
    
    $sp_result = $wpdb->get_results("SELECT @article_id as aid");
    $article_id = $sp_result[0]->aid;

    // Insert Primary Article Category
    $sp_update_pc = $wpdb->prepare("CALL master_media.sp_set_primary_type(%d,%d)",
    $article_id,
    $form->getValue('quform_3_109')); // Primary Category

    $wpdb->query($sp_update_pc);

    //if next section exists
    // Section 3
    if ($form->getValue('quform_3_24') || $form->getValue('quform_3_71') || $form->getValue('quform_3_70') || $form->getValue('quform_3_25')) {
        $sp_load_sql_sec3 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,3,$form->getValue('quform_3_24'),$form->getValue('quform_3_71'),$form->getValue('quform_3_70'),$form->getValue('quform_3_25'));
        $wpdb->query($sp_load_sql_sec3);
    }
    // Section 4
    if ($form->getValue('quform_3_44') || $form->getValue('quform_3_73') || $form->getValue('quform_3_72') || $form->getValue('quform_3_45')) {
        $sp_load_sql_sec4 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,4,$form->getValue('quform_3_44'),$form->getValue('quform_3_73'),$form->getValue('quform_3_72'),$form->getValue('quform_3_45'));
        $wpdb->query($sp_load_sql_sec4);
    }
    // Section 5
    if ($form->getValue('quform_3_46') || $form->getValue('quform_3_75') || $form->getValue('quform_3_74') || $form->getValue('quform_3_47')) {
        $sp_load_sql_sec5 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,5,$form->getValue('quform_3_46'),$form->getValue('quform_3_75'),$form->getValue('quform_3_74'),$form->getValue('quform_3_47'));
        $wpdb->query($sp_load_sql_sec5);
    }
    // Section 6
    if ($form->getValue('quform_3_66') || $form->getValue('quform_3_77') || $form->getValue('quform_3_76') || $form->getValue('quform_3_67')) {
        $sp_load_sql_sec6 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,6,$form->getValue('quform_3_66'),$form->getValue('quform_3_77'),$form->getValue('quform_3_76'),$form->getValue('quform_3_67'));
        $wpdb->query($sp_load_sql_sec6);
    }
    // Section 7
    if ($form->getValue('quform_3_63') || $form->getValue('quform_3_79') || $form->getValue('quform_3_78') || $form->getValue('quform_3_64')) {
        $sp_load_sql_sec7 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,7,$form->getValue('quform_3_63'),$form->getValue('quform_3_79'),$form->getValue('quform_3_78'),$form->getValue('quform_3_64'));
        $wpdb->query($sp_load_sql_sec7);
    }
    // Section 8
    if ($form->getValue('quform_3_60') || $form->getValue('quform_3_81') || $form->getValue('quform_3_80') || $form->getValue('quform_3_61')) {
        $sp_load_sql_sec8 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,8,$form->getValue('quform_3_60'),$form->getValue('quform_3_81'),$form->getValue('quform_3_80'),$form->getValue('quform_3_61'));
        $wpdb->query($sp_load_sql_sec8);
    }
    // Section 9
    if ($form->getValue('quform_3_57') || $form->getValue('quform_3_83') || $form->getValue('quform_3_82') || $form->getValue('quform_3_58')) {
        $sp_load_sql_sec9 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,9,$form->getValue('quform_3_57'),$form->getValue('quform_3_83'),$form->getValue('quform_3_82'),$form->getValue('quform_3_58'));
        $wpdb->query($sp_load_sql_sec9);
    }
    // Section 10 Final Section 
    if ($form->getValue('quform_3_54') || $form->getValue('quform_3_85') || $form->getValue('quform_3_84') || $form->getValue('quform_3_55')) {
        $sp_load_sql_sec10 = $wpdb->prepare("CALL master_media.sp_load_article_text(%d,%d,%s,%s,%s,%s)",$article_id,10,$form->getValue('quform_3_54'),$form->getValue('quform_3_85'),$form->getValue('quform_3_84'),$form->getValue('quform_3_55'));
        $wpdb->query($sp_load_sql_sec10);
    }
    // Audio Link
    if ($form->getValueText('quform_3_43')) {
        $sp_load_audio_link = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,1,$form->getValueText('quform_3_43'));
        $wpdb->query($sp_load_audio_link);
    }
    // Video Link
    if ($form->getValueText('quform_3_51')) {
        $sp_load_video_link = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,2,$form->getValueText('quform_3_51'));
        $wpdb->query($sp_load_video_link);
    }
    // Image Upload URL
    if ($form->getValueText('quform_3_101')) {
        $sp_load_image_upload = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,3,$form->getValueText('quform_3_101'));
        $wpdb->query($sp_load_image_upload);
    }
    if ($form->getValueText('quform_3_112')) {
        $sp_load_image_url = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,3,$form->getValueText('quform_3_112'));
        $wpdb->query($sp_load_image_url);
    }
    // Attachment Upload URL
    if ($form->getValueText('quform_3_27')) {
        $sp_load_attachment_upload = $wpdb->prepare("CALL master_media.sp_load_resource(%d,%d,%s)",$article_id,4,$form->getValueText('quform_3_27'));
        $wpdb->query($sp_load_attachment_upload);
    }
}
    return $result;
}, 10, 2);