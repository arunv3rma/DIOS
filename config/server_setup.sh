# Configuring dios setup on apache2 server
# Disabling site
cd /etc/apache2/sites-available
sudo a2dissite dios.conf 2> /dev/null
# sudo rm /etc/apache2/sites-enabled/dios.conf
sudo service apache2 restart

# Delete old configuration file
sudo rm /etc/apache2/sites-available/dios.conf 2> /dev/null

# Coping configuration files
sudo cp /home/arun/Summar@2016/leaveMgtSys/DIOS/config/dios.conf /etc/apache2/sites-available/dios.conf

# Configure site
sudo rm -rf /var/www/logs
sudo mkdir -p /var/www/logs

# Enabling site
cd /etc/apache2/sites-available
sudo a2ensite dios.conf
# sudo ln -s /etc/apache2/sites-available/dios.conf /etc/apache2/sites-enabled/dios.conf
sudo service apache2 restart
