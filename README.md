YOURLS Plugin: Upload and Shorten
=================================

Plugin for [YOURLS](http://yourls.org) (version 1.7 or newer)

Description
-----------
Upload a file to your webserver and create a short-URL for it in one step. You can share your files using short links as well as full URL´s.  

Features
--------
  * Change filenames in different ways during the upload
  * Make notes for yourself in the YOURLS database entry 
  * (by default the title field is filled with the original filename and how it was altered)
  * Keep track of views/downloads via YOURLS´s history function
  * Localization support (currently available: English, Spanish, German, more to come...)

Requirements
------------
  * A webserver with PHP support
  * A working [YOURLS](http://yourls.org) installation
  * A bit of understanding what it does and what you can do with it ;)

Installation
------------
1. Navigate to the folder `./user/plugins/` inside your YOURLS-install directory

2. * *Either* clone this repo using `git` *or* 
   * create a new folder named ´Upload-and-Shorten´ under your plugin-directory
   * then download all files from here and drop them into that directory. 

3. * open `./user/config.php` in your YOURLS-directory with any text editor
   * add two definitions at the end of that file:  
   `define( 'SHARE_URL', 'http://my.domain.tld/directory/' );`  
   `define( 'SHARE_DIR', '/full/path/to/httpd/directory/' );`  
   (both must point to the (existing) directory where your files should be uploaded and accessed from the web)
   * If necessary create a folder matching the name you defined in the above setting 
   * Depending on your webserver´s setup you may have to 'chmod +rw /full/path/to/httpd/directory' 

4. Go to the Plugins administration page (*eg* `http://sho.rt/admin/plugins.php`) and activate the plugin.

5. Have fun!

6. Consider helping with translations.

License
-------
Free for personal use only. If you want to make money with it you have to contact me first.

Localization
------------
This plugin supports **localization** (translations in your language). 
**For this to work you need at least YOURLS v1.7 from March 1, 2015**. Earlier versions will basically work fine, except they will not translate into other languages because of a minor bug in the YOURLS-code. Just upgrade to the latest YOURLS version. 

The plugin talks English as default. Translation files for other languages (currently as of version 1.4: Spanish and German) are included in the folder `l10n/`. Remember to define your locale in your `user/config.php` like this:
> define( 'YOURLS_LANG', 'de_DE' ); 

Looking for translators
-----------------------
If you're able and willing to provide or improve translations, please [read this](http://blog.yourls.org/2013/02/workshop-how-to-create-your-own-translation-file-for-yourls/). If you need further instructions please contact me. Any help will be greatly appreciated by your fellow countrymen!

Donations
---------
The more you use it the more you'll like it. And if you do, remember someone spends his time for improving it. If you want say thanks for that, just [buy him a coffee](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H5B9UKVYP88X4). This will certainly motivate him to push further enhancements.  
Just for You!  ![](http://members.aon.at/localhost/uf.de/smiley_bier.gif) and him :)

