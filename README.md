# SartajPHP-Framework
Event Driven PHP Web Development

How to install it?
With Composer:----
Add to your composer.json:

{
    "require": {
        "sartajphp/sartajphp": "~4.4"
    }
}

then
composer install
    OR
composer update

With Download Zip file from github :--------
After download copy res and demo folder in your root folder. res folder is called frameowrk folder and demo folder is called 
project folder. You can create your component, classes etc. all reusable code in res folder and customise code in 
project folder. Learn more:- http://www.sartajphp.com/

If Ioncube loader is not installed on your server, Install it 
from http://www.ioncube.com/loaders.php .
Enable rewrite module in Apache server for .htaccess file.
Now type http://localhost/demo/ in browser and press enter to run demo project.

Important Files:-
1. comp.php : Database, Email, Master Designs and other global Settings
2. reg.php :  Register Application with Controller.
3. setg.php:  res(SartajPHP Framework) folder path settings and other global settings
4. cachelist.php : cache engine settings file
5. start.php : SartajPHP Engine Starter File
6. res/temp/default/master.php : Default Master Design File

Some Important Standard Rule:-
1. All Path will be end with slash /
2. Uses $respath for resources like css,js files for process on client side and $phppath uses for PHP file path on server side files
4. $apppath is path of application location and type of php path, you can not use this path for js,css
5. all paths are related to project folder
