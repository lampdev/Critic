apt-get purge php5-fpm mysql-server mysql-client nginx -y
add-apt-repository ppa:ondrej/php
apt-get update -y 2> /dev/null
apt-get install -y php7.1 php7.1-fpm 
debconf-set-selections <<< 'mysql-server mysql-server/root_password password password' 
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password password'
apt-get install -y php7.1-mysql 
apt-get install -y mcrypt php7.1-mcrypt 
apt-get install -y php7.1-cli php7.1-curl php7.1-mbstring php7.1-xml php7.1-mysql 
apt-get install -y php7.1-json php7.1-cgi php7.1-gd php-imagick php7.1-bz2 php7.1-zip 
apt-get install -y mysql-server mysql-client git nginx 

mysql -uroot -ppassword -e "CREATE DATABASE critic;"

rm /etc/nginx/sites-available/default 2> /dev/null
echo -e "server \n{\n listen 80 default_server;\n listen [::]:80 default_server;\n access_log /var/log/nginx/access.log combined;\n error_log /var/log/nginx/error.log error;\n index index.php index.html index.htm index.nginx-debian.html;\n server_name critic.loc www.critic.loc;\n root /var/www/Critic/public;\n location / {\n " > /etc/nginx/sites-available/critic.loc.conf
# clean cache "expires 1s";
sed -i 's/sendfile on/sendfile off/' /etc/nginx/nginx.conf;
sed -i 's/# server_names_hash_bucket_size 64;/ server_names_hash_bucket_size 64;/' /etc/nginx/nginx.conf
# /etc/nginx/nginx.conf "sendfile off";
echo -e 'expires 1s;\n try_files $uri $uri/ /index.php$is_args$args;' >> /etc/nginx/sites-available/critic.loc.conf
echo -e "\n	}\n" >> /etc/nginx/sites-available/critic.loc.conf
echo -e '   #  PHP scripts options.\n  location ~ \.php$ {\n    #root /var/www/laravel/public;\n   proxy_read_timeout 61;\n  fastcgi_read_timeout 61;\n  try_files $uri $uri/ =404;\n     # PHP-FPM\n fastcgi_pass unix:/var/run/php/php7.1-fpm.sock;\n    fastcgi_index index.php;\n    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n   include fastcgi_params;\n }\n\n}' >> /etc/nginx/sites-available/critic.loc.conf
ln -s /etc/nginx/sites-available/critic.loc.conf /etc/nginx/sites-enabled/
nginx -s reload

cd /var/www/
git clone https://github.com/gderiyenko/Critic.git

cp /var/www/.env /var/www/Critic

apt-get install -y curl php-cli php-mbstring unzip 

apt-get install -y php-xml

curl -sS https://getcomposer.org/installer -o composer-setup.php 
apt install -y composer 


composer update --no-scripts  
cd /var/www/Critic
composer dump-autoload

cd /var/www/Critic/
mv .env.example .env
php artisan migrate:install
composer update --no-scripts

php artisan key:generate
apt-get install -y php-mysql

cd /var/www/Critic/
composer update
cd /var/www/Critic/

curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
apt-get install -y nodejs
apt-get install -y npm

npm install --global cross-env 
npm install --no-bin-links
rm package-lock.json

php artisan migrate:rollback
php artisan migrate
php artisan db:seed
#How to install bootstrap 4 Tutorial
#add to  /etc/hosts
#151.101.16.162 registry.npmjs.org
#& after that:
#sudo npm install bootstrap --save

# sass
# sudo npm install -g sass
#vue
#sudo npm install vue

