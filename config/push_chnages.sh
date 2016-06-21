# Delete previous exiting DIOS setup
sudo rm -r /var/www/html/DIOS_old 2> /dev/null
sudo mv /var/www/html/DIOS /var/www/html/DIOS_old

# Copy files to Apache2 public directory
sudo cp -r /home/arun/Summar@2016/leaveMgtSys/DIOS /var/www/html/

# Change user and group of DIOS
sudo chown -R $USER:$USER /var/www/html/DIOS

# Change permission of DIOS files to access publically
# sudo chmod -R 755 /var/www/html/DIOS/*
sudo chmod -R 755 /var/www/html/DIOS
