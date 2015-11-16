#!/bin/bash
sudo apt-get update
sudo apt-get install -y git-core nginx php5-dev php5-fpm php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcached
sudo service nginx restart
sudo service php5-fpm restart