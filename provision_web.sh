#!/bin/bash

# Update system
apt-get update
apt-get upgrade -y

# Install Apache, PHP and MySQL extension
apt-get install -y apache2 php php-mysql

# Enable Apache at startup
systemctl enable apache2

# Fix permissions on shared folder
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html

# Restart Apache
systemctl restart apache2

echo "Web server provisioning completed!"
