# tech-fusion-studio-source
This is the source code to my website Tech Fusion Studio. To get this website to work you will need to do a couple things. 

# If working in windows: 
You will need to add these IP mappings to your hosts file located - "C:\Windows\System32\drivers\etc"
127.0.0.1       forums.techfusionstudio.comm
127.0.0.1       store.techfusionstudio.comm
127.0.0.1       style.techfusionstudio.comm
127.0.0.1       techfusionstudio.comm

If working in XAMPP:
You will need to add these domains to you httpd-vhosts.conf file located - "C:\xampp\apache\conf\extra"
####################DEFAULT####################
NameVirtualHost 127.0.0.1:80

<VirtualHost 127.0.0.1:80>
	DocumentRoot "C:/xampp/htdocs/"
	ServerName localhost
</VirtualHost>
####################DEFAULT####################

####################TECH FUSION STUDIOS####################
<VirtualHost tech_fusion_studios>
	DocumentRoot "C:/xampp/htdocs/tech_fusion_studios"
	ServerName tech_fusion_studios

	CustomLog "C:/xampp/htdocs/tech_fusion_studios/@logs/tech_fusion_studios.access.log" combined
	ErrorLog "C:/xampp/htdocs/tech_fusion_studios/@logs/tech_fusion_studios.error.log"

	<Directory "C:/xampp/htdocs/tech_fusion_studios">
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>


<VirtualHost forums.techfusionstudios.comm>
	DocumentRoot "C:/xampp/htdocs/tech_fusion_studios/forums.techfusionstudios.com"
	ServerName forums.techfusionstudios.comm

	CustomLog "C:/xampp/htdocs/tech_fusion_studios/@logs/forums.techfusionstudios.comm.access.log" combined
	ErrorLog "C:/xampp/htdocs/tech_fusion_studios/@logs/forums.techfusionstudios.comm.error.log"

	<Directory "C:/xampp/htdocs/tech_fusion_studios/forums.techfusionstudios.comm">
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>


<VirtualHost store.techfusionstudios.comm>
	DocumentRoot "C:/xampp/htdocs/tech_fusion_studios/store.techfusionstudios.com"
	ServerName store.techfusionstudios.comm

	CustomLog "C:/xampp/htdocs/tech_fusion_studios/@logs/store.techfusionstudios.comm.access.log" combined
	ErrorLog "C:/xampp/htdocs/tech_fusion_studios/@logs/store.techfusionstudios.comm.error.log"

	<Directory "C:/xampp/htdocs/tech_fusion_studios/store.techfusionstudios.comm">
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>


<VirtualHost style.techfusionstudios.comm>
	DocumentRoot "C:/xampp/htdocs/tech_fusion_studios/style.techfusionstudios.com"
	ServerName style.techfusionstudios.comm

	CustomLog "C:/xampp/htdocs/tech_fusion_studios/@logs/style.techfusionstudios.comm.access.log" combined
	ErrorLog "C:/xampp/htdocs/tech_fusion_studios/@logs/style.techfusionstudios.comm.error.log"

	<Directory "C:/xampp/htdocs/tech_fusion_studios/style.techfusionstudios.comm">
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>


<VirtualHost techfusionstudios.comm>
	DocumentRoot "C:/xampp/htdocs/tech_fusion_studios/techfusionstudios.com"
	ServerName techfusionstudios.comm

	CustomLog "C:/xampp/htdocs/tech_fusion_studios/@logs/techfusionstudios.comm.access.log" combined
	ErrorLog "C:/xampp/htdocs/tech_fusion_studios/@logs/techfusionstudios.comm.error.log"

	<Directory "C:/xampp/htdocs/tech_fusion_studios/techfusionstudios.comm">
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>
####################TECH FUSION STUDIOS####################

# If working in Ubuntu:
You will need to add these IP mappings to your hosts file located - "/etc"
127.0.0.1       forums.techfusionstudio.comm
127.0.0.1       store.techfusionstudio.comm
127.0.0.1       style.techfusionstudio.comm
127.0.0.1       techfusionstudio.comm

You will need to add these .conf files to sites-available folder located - "/etc/apache2/sites-available"
forums.techfusionstudio.com.conf:
<VirtualHost *:80>
	DocumentRoot /var/www/tech_fusion_studio/forums.techfusionstudio.com
	ServerName www.forums.techfusionstudio.comm
	ServerAlias forums.techfusionstudio.comm

	CustomLog /var/www/tech_fusion_studio/@logs/forums.techfusionstudio.com.access.log combined
	ErrorLog /var/www/tech_fusion_studio/@logs/forums.techfusionstudio.com.error.log
	
	<Directory /var/www/tech_fusion_studio/forums.techfusionstudio.com>
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>

store.techfusionstudio.com.conf:
<VirtualHost *:80>
	DocumentRoot /var/www/tech_fusion_studio/store.techfusionstudio.com
	ServerName www.store.techfusionstudio.comm
	ServerAlias store.techfusionstudio.comm

	CustomLog /var/www/tech_fusion_studio/@logs/store.techfusionstudio.com.access.log combined
	ErrorLog /var/www/tech_fusion_studio/@logs/store.techfusionstudio.com.error.log

	<Directory /var/www/tech_fusion_studio/store.techfusionstudio.com>
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>

style.techfusionstudio.com.conf:
<VirtualHost *:80>
	DocumentRoot /var/www/tech_fusion_studio/style.techfusionstudio.com
	ServerName www.style.techfusionstudio.comm
	ServerAlias style.techfusionstudio.comm

	CustomLog /var/www/tech_fusion_studio/@logs/style.techfusionstudio.com.access.log combined
	ErrorLog /var/www/tech_fusion_studio/@logs/style.techfusionstudio.com.error.log

	<Directory /var/www/tech_fusion_studio/style.techfusionstudio.com>
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>

techfusionstudio.com.conf:
<VirtualHost *:80>
	DocumentRoot /var/www/tech_fusion_studio/techfusionstudio.com
	ServerName www.techfusionstudio.comm
	ServerAlias techfusionstudio.comm

	CustomLog /var/www/tech_fusion_studio/@logs/techfusionstudio.com.access.log combined
	ErrorLog /var/www/tech_fusion_studio/@logs/techfusionstudio.com.error.log

	<Directory /var/www/tech_fusion_studio/techfusionstudios.com>
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>

tech_fusion_studio.conf:
<VirtualHost *:80>
	DocumentRoot /var/www/tech_fusion_studio
	ServerName tech_fusion_studio

	CustomLog /var/www/tech_fusion_studio/@logs/tech_fusion_studio.access.log combined
	ErrorLog /var/www/tech_fusion_studio/@logs/tech_fusion_studio.error.log

	<Directory /var/www/tech_fusion_studio>
		Options Indexes FollowSymLinks MultiViews
    AllowOverride all
    Order Deny,Allow
    Allow from all
    Require all granted
		#Options Indexes FollowSymLinks
		#AllowOverride All
		#Order allow,deny
		#Allow from all
	</Directory>
</VirtualHost>

You will then need to enable them by running these commands:
sudo a2ensite forums.techfusionstudio.com
sudo a2ensite store.techfusionstudio.com
sudo a2ensite style.techfusionstudio.com
sudo a2ensite techfusionstudio.com

Then restart apache2: sudo systemctl restart apache2
