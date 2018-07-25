# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/xenial64"
  config.vm.network "forwarded_port", guest: 3306, host: 3306
  config.vm.network "private_network", ip: "192.168.33.61"


   config.vm.synced_folder "./", "/vagrant", owner: "www-data", group: "www-data"

   config.vm.provider "virtualbox" do |vb|
     vb.memory = 4096
   end

   config.vm.provision "shell", inline: <<-SHELL
    add-apt-repository -y ppa:ondrej/php
    apt-get update
    apt-get -y upgrade

    apt-get install -y nginx
    if ! [ -L /var/www/html ]; then
      rm -rf /var/www/html
      ln -fs /vagrant/public /var/www/html
    fi


    apt-get install -y php7.2-fpm php7.2 php7.2-common php7.2-curl php7.2-xml php7.2-zip php7.2-gd php7.2-mysql php7.2-mbstring

    debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
    debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
    apt-get install -y mysql-server
    apt-get install -y php-mysql

    apt-get install -y composer

   SHELL
end
