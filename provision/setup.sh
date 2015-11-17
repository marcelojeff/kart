#!/bin/bash
# sudo apt-get update
sudo apt-get install -y git-core nginx php5-dev php5-fpm php5-mongo php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcached phpunit mongodb
sudo cp /vagrant/provision/config/nginx_vhost.conf /etc/nginx/sites-enabled/
sudo rm -rf /etc/nginx/sites-enabled/default
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo service nginx restart
sudo service php5-fpm restart
