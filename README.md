# 📤 YOURLS Upload and Shorten Plugin

[![YOURLS Version](https://img.shields.io/badge/YOURLS-1.7%2B-blue.svg)](http://yourls.org)
[![PHP Version](https://img.shields.io/badge/PHP-7.4--8.6-green.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-Personal%20Use-orange.svg)](#license)
[![Version](https://img.shields.io/badge/Version-2.0.0-brightgreen.svg)](#changelog)

> *Original Author: Fredl*

A powerful YOURLS plugin that allows you to upload files to your server and automatically create short URLs for them. Perfect for sharing files, documents, images, and more with clean, trackable links.

## ✨ Features

### 🚀 Core Functionality
- **File Upload & Shortening**: Upload files and get instant short URLs
- **Admin Panel Integration**: Full admin interface with settings management
- **Frontend Upload Support**: Allow public users to upload files (configurable)
- **File Management**: View, manage, and delete uploaded files
- **Download Tracking**: Track file downloads through YOURLS analytics

### 🎛️ Admin Features
- **Storage Location Management**: Configure where files are stored
- **File Size Limits**: Set maximum file sizes for uploads
- **File Type Restrictions**: Control allowed file extensions
- **Retention Settings**: Configure automatic file cleanup
- **Frontend Controls**: Enable/disable public uploads

### 🌐 Frontend Features
- **Public Upload Interface**: Clean, responsive upload form
- **Drag & Drop Support**: Modern file upload experience
- **Progress Indicators**: Visual feedback during uploads
- **Copy to Clipboard**: Easy URL sharing
- **Mobile Responsive**: Works perfectly on all devices

### 🔒 Security & Performance
- **CSRF Protection**: Secure form submissions
- **File Validation**: MIME type and content validation
- **Path Traversal Prevention**: Secure file handling
- **Rate Limiting**: Prevent abuse
- **Clean URL Support**: SEO-friendly URLs without .php extensions

## 📋 Requirements

- **YOURLS**: Version 1.7 or newer (tested up to 1.10.2)
- **PHP**: Version 7.4 or newer (tested up to 8.6)
- **Web Server**: Apache/Nginx with mod_rewrite support
- **Permissions**: Write access to upload directory

### ✅ Tested Environments

This plugin has been tested and verified to work on:

| Operating System | Web Server | Control Panel | Status |
|------------------|------------|---------------|---------|
| **AlmaLinux 9.6** | OpenLiteSpeed | CyberPanel | ✅ Verified |
| **AlmaLinux 9.6** | LiteSpeed Enterprise | CyberPanel | ✅ Verified |
| **AlmaLinux 10** | OpenLiteSpeed | CyberPanel | ✅ Verified |
| **AlmaLinux 10** | LiteSpeed Enterprise | CyberPanel | ✅ Verified |

> **Note**: The plugin is fully compatible with both OpenLiteSpeed and LiteSpeed Enterprise through CyberPanel, providing seamless integration with your hosting environment.

## 🚀 Installation

### 1. Download the Plugin
```bash
# Navigate to your YOURLS plugins directory
cd /path/to/yourls/user/plugins/

# Clone the plugin
git clone https://github.com/newstargeted/YOURLS-Upload-and-Shorten.git YOURLS-Upload-and-Shorten-master
```

### 2. Set Permissions
```bash
# Set proper ownership and permissions
chown -R yourls_user:yourls_group YOURLS-Upload-and-Shorten-master/
chmod -R 755 YOURLS-Upload-and-Shorten-master/
chmod 777 YOURLS-Upload-and-Shorten-master/uploads/
```

### 3. Activate the Plugin
1. Go to your YOURLS admin panel: `https://yourls.example.com/admin/plugins.php`
2. Find "Upload and Shorten" in the plugin list
3. Click "Activate"
4. The plugin will automatically create necessary database tables

### 4. Configure Settings
1. Navigate to **Upload Settings** in the admin panel
2. Configure your preferred settings:
   - Max file size
   - Allowed file types
   - Storage location
   - Frontend upload settings
3. Save your configuration

## ⚙️ Configuration

### Admin Settings

Access the settings via: **Admin Panel → Plugins → Upload Settings**

| Setting | Description | Default |
|---------|-------------|---------|
| **Max File Size** | Maximum file size for uploads | 10 MB |
| **Allowed File Types** | Comma-separated list of allowed extensions | jpg,jpeg,png,gif,pdf,doc,docx,txt,zip |
| **File Retention** | How long to keep files before deletion | Never |
| **Storage Location** | Directory where files are stored | `/uploads/` |
| **Frontend Uploads** | Allow public users to upload files | Disabled |
| **Frontend Max Size** | Maximum file size for frontend uploads | 5 MB |
| **Frontend File Types** | Allowed file types for frontend uploads | jpg,jpeg,png,gif,pdf,txt |

### File Storage

Files are stored in the web-accessible `/uploads/` directory by default. The plugin automatically:
- Creates the upload directory if it doesn't exist
- Sets proper permissions
- Generates unique filenames to prevent conflicts
- Stores file metadata in the database

## 🎯 Usage

### Admin Upload
1. Go to **Admin Panel → Upload & Shorten**
2. Select a file from your computer
3. Click "Upload & Shorten"
4. Get your short URL instantly

### Frontend Upload (if enabled)
1. Visit your YOURLS frontend
2. Use the "Upload & Shorten File" section
3. Select a file and click "Upload & Shorten"
4. Copy the generated short URL

### File Management
- View all uploaded files in **Admin Panel → Uploaded Files**
- Delete files individually or in bulk
- Monitor download statistics
- Manage file retention settings

## 🌍 Internationalization

The plugin supports multiple languages:

| Language | Code | Status |
|----------|------|--------|
| English | `en_US` | ✅ Complete |
| German | `de_DE` | ✅ Complete |
| French | `fr_FR` | ✅ Complete |
| Spanish | `es_ES` | ✅ Complete |
| Chinese (Simplified) | `zh_CN` | ✅ Complete |
| Norwegian (Bokmål) | `nb_NO` | ✅ Complete |

To use a specific language, add this to your `user/config.php`:
```php
define('YOURLS_LANG', 'de_DE'); // Replace with your preferred language code
```

## 🔧 Advanced Configuration

### Custom Storage Location
You can customize where files are stored by modifying the storage location in the admin settings. The path should be:
- **Web-accessible**: Files need to be accessible via HTTP
- **Writable**: The web server must have write permissions
- **Secure**: Outside the web root for security (recommended)

### File Retention Policies
Configure automatic file cleanup:
- **Never**: Keep files indefinitely
- **24 Hours**: Delete after 1 day
- **7 Days**: Delete after 1 week
- **31 Days**: Delete after 1 month
- **90 Days**: Delete after 3 months
- **Custom**: Set your own retention period

### Security Considerations
- Files are validated for type and content
- Path traversal attacks are prevented
- CSRF protection is enabled
- Rate limiting prevents abuse
- Upload directory is protected with .htaccess

### CyberPanel & LiteSpeed Compatibility
The plugin includes .htaccess rules that are fully compatible with:
- **OpenLiteSpeed**: Standard Apache-compatible directives
- **LiteSpeed Enterprise**: Enhanced with optional LiteSpeed-specific optimizations
- **CyberPanel**: Seamless integration with CyberPanel's file management
- **AlmaLinux**: Tested and optimized for AlmaLinux 9.6 and 10

## 🐛 Troubleshooting

### Common Issues

**File uploads not working:**
- Check directory permissions (should be 755 for directories, 644 for files)
- Verify upload directory exists and is writable
- Check PHP upload limits in php.ini

**Short URLs not redirecting:**
- Ensure the upload directory is web-accessible
- Check that files are being moved to the correct location
- Verify .htaccess rules are working

**Frontend uploads not showing:**
- Check that "Enable Frontend Uploads" is set to "Yes" in admin settings
- Verify the custom frontend is loading the plugin correctly
- Check for PHP errors in the error log

### Debug Mode
Enable debug mode by adding this to your `user/config.php`:
```php
define('YOURLS_DEBUG', true);
```

## 📊 Changelog

### Version 2.0.0 (Current)
- ✨ **Major Enhancement**: Complete rewrite and modernization
- 🎛️ **Admin Interface**: Full admin panel with settings management
- 🌐 **Frontend Support**: Public upload interface for custom themes
- 🔒 **Security**: Enhanced security with CSRF protection and validation
- 📱 **Mobile**: Fully responsive design
- 🌍 **i18n**: Norwegian Bokmål translation added
- 🧹 **Code Quality**: Modular structure, under 500 lines per file
- ⚡ **Performance**: Optimized database queries and file handling

### Version 1.x (Original)
- Basic file upload and shortening functionality
- Admin panel integration
- Multiple language support
- File management features

## 🤝 Contributing

We welcome contributions! Here's how you can help:

1. **Report Bugs**: Use the issue tracker to report problems
2. **Suggest Features**: Propose new functionality
3. **Translate**: Help with language translations
4. **Code**: Submit pull requests for improvements
5. **Documentation**: Improve documentation and examples

## 📄 License

**Free for personal use only.**  

Commercial use requires permission. Contact us for licensing information.

## 🙏 Credits

- **Original Author**: [fredl99](https://github.com/fredl99/YOURLS-Upload-and-Shorten)
- **Enhanced by**: [News Targeted](https://newstargeted.com)
- **Original Repository**: [fredl99/YOURLS-Upload-and-Shorten](https://github.com/fredl99/YOURLS-Upload-and-Shorten)

## 📞 Support

- **Original Plugin**: [fredl99/YOURLS-Upload-and-Shorten](https://github.com/fredl99/YOURLS-Upload-and-Shorten)
- **Issues & Support**: [Contact fredl99](https://github.com/fredl99/YOURLS-Upload-and-Shorten)
- **Enhanced Version**: [News Targeted](https://newstargeted.com/contact)

---

<div align="center">


[![News Targeted](https://img.shields.io/badge/News%20Targeted-Professional%20Services-red.svg)](https://newstargeted.com)

</div>