TORRENTTRADER V3.0.0 BETA INSTALL NOTES
===================================================================
WARNING UPGRADING FROM V2 ISNT TEST AT THIS TIME IMPORTIMG MEMBERS MIGHT NOT WORK

REQUIREMENTS:
=============
- RewriteEngine On 
- PHP 5.2+
- MYSQL 4+
- We do not advise that register_globals is enabled
- We do not advise installation in a windows enviroment, however it will work (you may need to adjust paths)


INSTALLATION:
=============
Please remember to backup all files AND database before you update anything!
FRESH INSTALL INSTRUCTIONS ONLY!!!!

THERE IS NO INSTALLER REQUIRED!

1) upload all files from upload folder to your punlic_html
and rename .htaccess.old  to  .htaccess

2) Edit the file backend/mysql.php to suit your MYSQL connection

3) Import via phpmyadmin "tt3.sql from the install folder"

4) Edit the file backend/config.php to suit your needs
- special note should be taken for urls, emails, paths (use check.php if unsure)



5) Apply the following CHMOD's
777 - cache/
777 - cache/get_row_count/
777 - cache/queries/
777 - backups/
777 - uploads/
777 - uploads/images/
777 - import/
600 - censor.txt

Edit backup-database.php and change the path. Make sure it exists and is chmod 777

if you have any of those folders missing (eg: uploads/images/), please create them and chmod 777

6) Run check.php from your browser to check you have configured everything ok
   check.php is designed for UNIX systems, if you are using WINDOWS it may not report the paths correctly.

7) Now register as a new user on the site.  The first user registered will become administrator

8) If check.php still exists, please remove it or rename.
A warning will display on the site index until its removed

9) You should properly secure backup-database.php and the backups dir. (htaccess/htpasswd)

Any problems please visit https://www.facebook.com/l3oncod3r