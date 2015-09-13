<?php
/*
Plugin Name: Upload & Shorten
Plugin URI: https://github.com/fredl99/YOURLS-Upload-and-Shorten
Description: Upload a file and create a short-YOURL for it in one step.
Version: 1.3/testing
Author: Fredl
Author URI: https://github.com/fredl99
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();


// Register our plugin admin page
yourls_add_action( 'plugins_loaded', 'my_upload_and_shorten_add_page' );

function my_upload_and_shorten_add_page() {
	// load custom text domain
	yourls_load_custom_textdomain( 'upload-and-shorten', dirname(__FILE__) . '/i18n/' );
	// create entry in the admin's plugin menu
	yourls_register_plugin_page( 'upload-and-shorten', 'Upload & Shorten', 'my_upload_and_shorten_do_page' );
	// parameters: page slug, page title, and function that will display the page itself
}

function my_say__($message) {
	$my_upload_and_shorten_domain = 'upload-and-shorten';
	return yourls_esc_html__($message, $my_upload_and_shorten_domain );
	}
	
// Display admin page
function my_upload_and_shorten_do_page() {
	// Check if a form was submitted
	if(isset($_POST['submit'])) $my_save_files_message = my_upload_and_shorten_save_files();

	// input form
	echo '
	<h2>'.my_say__("Upload & Shorten").'</h2>
	<p>'.my_say__("Here you can upload a file to your webserver and create a short-URL for it.").'</p>

	<form method="post" enctype="multipart/form-data"> 
	<fieldset>

	<p><label for="file_upload">'.my_say__("Select file to upload: ").'</label> <input type="file" id="file_upload" name="file_upload" /></p>
	
	<p><label for="custom_keyword">'.my_say__("Optional custom keyword: ").'</label> <input type="text" id="custom_keyword" name="custom_keyword" /></p>
	
	<p><label for="custom_title">'.my_say__("Optional custom title: ").'</label> <input type="text" id="custom_title" name="custom_title" value="'.$my_filename.'" /></p>
	
	<p><input type="checkbox" id="randomize_filename" name="randomize_filename" checked="checked" /><label for="randomize_filename">'.my_say__("Randomize filename ").'</label> <small>(mypicture.jpg -> http://domain.tld/9a3e97434689.jpg)</small></p>
	
	<p><input type="checkbox" id="drop_extension" name="drop_extension" /><label for="drop_extension">'.my_say__("Drop the filename's extension ").'</label> <small>(mypicture.jpg -> http://domain.tld/mypicture or http://domain.tld/9a3e97434689)</small></p>
	
	<p><input type="submit" name="submit" value="'.my_say__("  Go!  ").'" /></p>
	
	</fieldset></form>

	<p><strong>'.$my_save_files_message.'</strong></p>
	
	<div id="footer">'	.my_say__("This plugin is hosted at ")
				.'<a href="https://github.com/fredl99/YOURLS-Upload-and-Shorten" target="_blank">GitHub</a>'
				.my_say__("If you like it, remember someone spends his time on it. ")
				.'<a href="https://fredls.net/donate" target="_blank">'
				.my_say__("Click here")
				.'</a>'
				.my_say__(" to buy him a coffee and motivate him for further improvements. ;-)")
				.'</div>'
	}

// Update option in database
function my_upload_and_shorten_save_files() {

	// did the user select any file?
	if ($_FILES['file_upload']['error'] == UPLOAD_ERR_NO_FILE) {
		return my_say__('You need to select a file to upload.');
	}
	
	// yes!
	$my_url = SHARE_URL;	// has to be defined in user/config.php like this: 
					// define( 'SHARE_URL', 'http://my.domain.tld/directory/' );

	$my_uploaddir = SHARE_DIR;	// has to be defined in user/config.php like this: 
					// define( 'SHARE_DIR', '/full/path/to/httpd/directory/' );	

	$my_filename = pathinfo($_FILES['file_upload']['name'], PATHINFO_FILENAME);
	$my_extension = '';
        if(! isset($_POST['drop_extension'])) {
	// If this option is checked then leave away the filename's extension to obfuscate the filetype. 
	// Beware: Some webservers won't send an appropriate HTTP-Header then!
	// Negative logic: only set the extension, if the option is NOT selected:
		$my_extension = '.' . pathinfo($_FILES['file_upload']['name'], PATHINFO_EXTENSION);
	}

	if(isset($_POST['randomize_filename'])) {
		// make up a random name for the uploaded file
		// see http://www.mattytemple.com/projects/yourls-share-files/?replytocom=26686#respond
		$my_safe_filename = substr(md5($my_filename.strtotime("now")), 0, 12);
		// end randomize filename
	}
	else {
		// original code:
		$my_filename_trim = trim($my_filename);
		$my_RemoveChars  = array( "([\40])" , "([^a-zA-Z0-9-])", "(-{2,})" ); 
		$my_ReplaceWith = array("-", "", "-"); 
		$my_safe_filename = preg_replace($my_RemoveChars, $my_ReplaceWith, $my_filename_trim); 
		// end original code
	}

	// avoid duplicate filenames
	$my_count = 2;
	$my_path = $my_uploaddir.$my_safe_filename.$my_extension;
	$my_final_file_name = $my_safe_filename.$my_extension;
	while(file_exists($my_path)) {
		$my_path = $my_uploaddir.$my_safe_filename.'-'.$my_count.$my_extension;
		$my_final_file_name = $my_safe_filename.'-'.$my_count.$my_extension;
		$my_count++;	
	}

	// move the file from /tmp/ to destination and initiate link creation
	if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $my_path)) {
		// On success:
		// obey custom keyword, if given:
		$my_custom_keyword = NULL;
		if(isset($_POST['custom_keyword']) && $_POST['custom_keyword'] != '') {
			$my_custom_keyword = $_POST['custom_keyword'];
		}
		// change custom title, if given. Default is original filename, but if empty then use 'No title':
		$my_custom_title = 'No title';
		if(isset($_POST['custom_title']) && $_POST['custom_title'] != '') {
			$my_custom_title = $_POST['custom_title'];
		}
		
		// let YOURLS create the link:
		$my_short_url = yourls_add_new_link($my_url.$my_final_file_name, $my_custom_keyword, $my_custom_title);
		
		return 	my_say__('Upload finished. These are the links to your file ') . '"' .$my_filename.'.'.$my_extension . '":<br />' . 
			my_say__('Direct URL: '). '<a href="' .$my_url.$my_final_file_name. '" target="_blank">' .$my_url.$my_final_file_name. '</a><br />' .
			my_say__('Short URL: ') . '<a href="' .$my_short_url['shorturl'] . '" target="_blank">' . $my_short_url['shorturl'] . '</a>';
	}
	else {
		return my_say__('Upload failed! Something went wrong, sorry! :(');
	}
}
