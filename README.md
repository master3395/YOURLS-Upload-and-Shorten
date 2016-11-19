YOURLS Plugin: Upload and Shorten
=================================

Plugin for [YOURLS](http://yourls.org) (version 1.7 or newer)

Description
-----------
This plugin lets you upload a file to your webserver and automagically creates a YOURLS short-URL to it. After that you can share that file by its short link as well as its full URL.

Features
--------
  * Different ways to change the filename during the upload
  * Make a note about it for yourself in the YOURLS database (by default the title field is filled with the original filename and the alteration method)
  * Keep track of views/downloads of the file via YOURLS´s history function
  * Localization support (currently available: English, Spanish, German, more to come...)

Requirements
------------
What you need:

  * A webserver with PHP support
  * A functional installation of [YOURLS](http://yourls.org)
  * This Plugin ;-)
  * A bit of understanding what it does and what you can do with it ;-)

Installation
------------
1. Navigate to the folder `./user/plugins/` inside your YOURLS-install directory

* Use any of these two ways to install:
    - **Either** clone this repo using `git`.
    - **Or** create a new folder named ´Upload-and-Shorten´ under your plugin-directory, download all files from here and drop them into that directory. 

* Prepare your configuration:
    * If necessary create a directory where your files can be accessed from the webserver
    * Depending on your webserver´s setup you may have to modify the permissions of that directory
    * Now open `./user/config.php` in your YOURLS-directory with any text editor and ...
    * add two definition lines:  
    `# URL where your files will appear on the web:`  
    `define( 'SHARE_URL', 'http://my.domain.tld/directory/' );`  
    `# physical path of the files on your server:`  
    `define( 'SHARE_DIR', '/full/path/to/httpd/directory/' );`  
    
* Go to the Plugins administration page (*eg.* `http://sho.rt/admin/plugins.php`) and activate the plugin.

* Have fun!

* Consider helping with translations.

License
-------
This plugin is **free for personal use** only.  
If you want to make money with it you have to contact me first.

Localization
------------
This plugin supports **localization** (translations in your language).  
*To use this feature you need at least YOURLS v1.7 from March 1, 2015. Earlier versions will basically do the work, but they don't translate due to a minor bug in the YOURLS-code. Just upgrade to the latest YOURLS version.*

By default the plugin talks English. Translation files for other languages (currently Spanish and German, as of version 1.4) are included in the folder `l10n/`. You just have to define your locale in your `user/config.php` like this:
> define( 'YOURLS_LANG', 'de_DE' ); 

Looking for translators
-----------------------
If you're able and willing to provide or improve translations, please [read this](http://blog.yourls.org/2013/02/workshop-how-to-create-your-own-translation-file-for-yourls/) and contact me for further instructions.  
Any help will be greatly appreciated by your fellow countrymen!

Donations
---------
If you like this piece of software, remember someone spends his time for providing it. If you want say thanks for that, just [buy him a coffee](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H5B9UKVYP88X4). This will certainly motivate him to push further enhancements. Just for You!  
... and him ![](http://members.aon.at/localhost/uf.de/smiley_bier.gif)

