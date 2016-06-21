# Configuring dios setup on apache2 server
# Disabling site
sudo a2dissite /etc/apache2/sites-available/dios.conf 2> /dev/null
sudo service apache2 restart

# Delete old configuration file
sudo rm /etc/apache2/sites-available/dios.conf 2> /dev/null

# Coping configuration files
sudo cp dios.conf /etc/apache2/sites-available/dios.conf

# Configure site
sudo mkdir -p /var/www/logs

# Enabling site
sudo a2ensite /etc/apache2/sites-available/dios.conf
sudo service apache2 restart
