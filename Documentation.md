List of Pages and Systems on the Site
===
##root
###header.php
* Page header that contains
  - sitewide scripts
  - nav bar (to be implemented)
  - login bar
* Will be included in almost every single page

###index.php
* Main Page
* All posts will be loaded here

###uac.php
* Script for _user account control_
* Variables for current user

##scripts/js
###jquery.min.js
  * jQuery library
  
###jquery.form.min.js
  * jQuery form library
  
###posts.js
  * Post functions that send data to `scripts/php/new.php` or `scripts/php/edit.php`
    - openEdit (opens editing panel)
    - saveEdit (sends edit to `edit.php`)
    - del (sends del comamnd to `edit.php`)
    - newPost (sends data to `new.php`)
    
###uac.js
  * Account functions that send data to `scripts/php/ajax_acct.php`
    - Login
    - Logout

##scripts/php
###ajax_acct.php
  * User management functions
    - Login
    - Logout
    - New user (to be implemented)
  * To be called with Ajax

###new.php
  * POST data is sent to script
  * Script makes a new entry in db

###edit.php
  * GET command is sent
  * Script uses POST data to execute based on command
