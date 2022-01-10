# The Fruity2.0 - Memory Game

## How to Deploy this Game Locally on Linux (Ubuntu)
##

#### 1. You'll need Apache with PHP installed on your machine.
   - This can be done with 
       - `sudo apt update`
       - `sudo apt upgrade`
       - Install Apache `sudo apt install apache2`
       - Install PHP `sudo apt install php`
   - After you go to ![http://localhost](http://localhost) and check if the Apache Default page shows up

#### 2. Project Directory and Source Code
   - Create the new site for apache service `sudo mkdir /var/www/[site-name]`
   - You then need to download the source code on the machine either through git clone or download the zip file from github  at ![GitHub](https://github.com/logosrhema01/fruity-memory) to the /var/www/[site-name]

#### 3. Give yourself access, and the WebServer access and set access levels
   `sudo chown $USER:www-data /var/www/[site-name]`
   `sudo chmod g+s /var/www/[site-name]`
   `sudo chmod o-rwx /var/www/[site-name]`

#### 4. Add site to the Apache2 Configurations
   - Find you config file, default location is /etc/apache2/sites-enabled
   - Go to the DocumentRoot line and modiify saying /var/www/[site-name]
   - Restart the service `sudo service apache2 restart`
                
#### 5. Visit the site and at ![http://localhost/[site-name]](http://localhost/[site-name])

