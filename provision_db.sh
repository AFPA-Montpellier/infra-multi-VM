#!/bin/bash

# Update system
apt-get update
apt-get upgrade -y

# Install MariaDB
apt-get install -y mariadb-server

# Configure MariaDB to listen on all interfaces  
sed -i 's/bind-address.*/bind-address = 0.0.0.0/' /etc/mysql/mariadb.conf.d/50-server.cnf

# Start and enable MariaDB
systemctl start mariadb
systemctl enable mariadb

# Wait for MariaDB to be ready
sleep 5

# Use external SQL script from db_sql folder
mysql -u root < /vagrant/db_sql/db_init.sql

# Restart MariaDB
systemctl restart mariadb

echo "Database provisioning completed!"
