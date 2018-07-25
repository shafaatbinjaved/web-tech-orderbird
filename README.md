Welcome to the Orderbird Tech Challenge :-). Thank you for considering joining our team. As for the tech challenge: we like you to setup and develop the following super small website.

# The Goal: get leads from potential customers
We need a web page where potential new orderbird customers (called "leads") can leave their name, email and telephone number, this data will then be stored in a database to get in touch with them later.
Also we need a simple admin page which is only accessible after a login to review the leads that came in. 

The Website should be based on the PHP framework Laravel and LESS. To get things a little easier we have created a vagrant file to create a virtual machine (Ubuntu, PHP, MySQL and Nginx) and a blank Laravel installation.

# Where should I put the code?
Your code should be into the repository in an own branch (name like your name). Besides the application please include a file containing at least a guide on how to run the website.

# Requirements
- Create a website which looks like the attached obtest-* images in the root directory (must not be pixel perfect)
![alt text](https://github.com/orderbird/web-tech-challenge/raw/master/obtest-web.png "Web-Mockup")

- Create the desktop and mobile version using CSS
- Use LESS for CSS coding
- The form should be submitted via AJAX, displaying the error message if the entries are not valid, otherwise a success message
- Write an own validation rule which fails if the email matches *@orderbird.*
- Save the form data into the database if valid
- Create an auth protected admin page which displays the leads from the database (If you're very enthusiastic you can add a search and sorting in it)

# Some guidelines:
- If possible, please write tests and validate your inputs (yes, seriously, it is important to us)
- Showcase your abilities and use the task to demonstrate your idea of best practices, regarding coding style, project structure, frameworks, patterns, design, etc.
- There is no right or wrong solution, as long as it is your solution.
- If you only have time to do one thing please do it as good as you possible can. It is better to have an nice but incomplete solution rather than a mediocre "feature complete" one. We want to get a good impression of your abilities.
- Be prepared to describe your work in detail.

# How long should this take?
We know, doing some homework is rarely fun. So please try to keep it as short as possible. Three to four hours should get you to the point where you can demo it. If possible you can also show us some of your work that you're proud of.

# Notes
- Vagrant runs an Ubuntu machine on 192.168.33.61 (change the IP if you've got already something going on there in the Vagrant file)
- The project on the Ubuntu machine is located in /vagrant 
- MySqL User and Password are "root"
- To enable mysql access from outside of the vm you have to edit the /etc/mysql/mysql.conf.d/mysqld.cnf by commenting "bind address" and "skip-external-locking" out and restart the mysql service.
You can connect then by host 192.168.33.61 root / root

# Tasks to get the laravel installation running
- Run "vagrant up" - this may take 30 minutes on the first run. You need VMWare or VirtuaBox for this. On Windows you have to enable VM support in the BIOS setup.
- Run "vagrant ssh" to get console access the VM
- Alter the nginx sites-enabled default config with:
- - index index.php index.html index.htm index.nginx-debian.html;
- - location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/run/php/php7.2-fpm.sock;
        }
- - location ~ /\.ht {
             deny all;
         }
- Restart the nginx service
- Create a database named orderbird
- Run composer install (you've got sudo inside the machine)
- Save the .env.example to .env

# Some hints
- You can make a quite quick and simple auth for the admin panel with Artisan
- Laravel comes with "mix" for frontend building - but you're free to use whatever you want for this

# we are looking forward to your solution \o/ !!
