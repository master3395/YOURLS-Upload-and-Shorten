YOURLS Plugin: Upload and Shorten
=================================

Plugin for [YOURLS](http://yourls.org) `1.7+`.

Description
-----------
Upload files to your server and create short-URLs to them in one step. Now you can share your files using shortlinks as well as URL´s. 

Installation
------------
1. Navigate to the folder `./user/plugins/` inside your YOURLS-install directory

2. - **Either** clone this repo using `git`  
   - **or** create a new folder named ´Upload-and-Shorten´ within your plugin-directory and download all files from here *into that directory*. 

3. - open `./user/config.php` in your YOURLS-directory with any text editor
   - add two definitions at the end of that file and save it:  
 `# The web URL path where YOURLS short-links will redirect to:`  
 `define( 'SHARE_URL', 'http://my.domain.tld/directory/' );`  
 `# The physical path where the plugin drops your files into:`  
 `define( 'SHARE_DIR', '/full/path/to/httpd/directory/' );` 
4. If necessary create a folder matching the name you defined in the last line above
   - Make sure your webserver has read+write permissions to that directory. Explaining that exceeds the scope of this readme, please refer to the manual of your server, operating system or hosting provider. On a Linux box something like  
 `chown :www-data /full/path/to/httpd/directory &&  chmod g+rwx /full/path/to/httpd/directory`  
 should do the trick, but please don't rely on it.  
 **A correct server configuration is important for its functionality, but essential for its safety!**

4. Go to the Plugins administration page (*eg* `http://sho.rt/admin/plugins.php`) and activate the plugin.

5. Have fun!

6. Consider helping with translations.

Localization (l10n)
--------------------
This plugin supports **localization** (translations into your language). 
**For this to work you need at least YOURLS v1.7 from March 1, 2015**. It will basically work fine with earlier versions, except that translations won't work because of a minor bug in the YOURLS-code. Just upgrade to the latest YOURLS version and it will do. 

Per default it talks English. German and Spanish translation files are included in the folder `i18n/`. Remember to define your locale in `user/config.php` like this:  
`define( 'YOURLS_LANG', 'de_DE' );`  

Looking for translators
-----------------------
If you're willing to provide translations, please [read this](http://blog.yourls.org/2013/02/workshop-how-to-create-your-own-translation-file-for-yourls/). If necessary you can contact me for further instructions. Any help is  appreciated, at most by your fellow countrymen!

Donations
---------
There are many ways to integrate this plugin into your daily routines. The more you use it the more you will discover. The more you discover the more you will like it.  
If you do, remember someone spends his time for improving it. If you want say thanks for that, just [buy him a coffee](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=H5B9UKVYP88X4). That will certainly motivate him to make further enhancements. Just for You! ...  
![](http://members.aon.at/localhost/uf.de/smiley_bier.gif) and him :)

License
-------
Free for personal use only.  
If you want to make money with it you have to contact me first.
