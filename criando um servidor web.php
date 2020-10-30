sudo apt-get update
Instalar OpenSSH para fazer acesso remoto
sudo apt-get install openssh-server
por padrão o servidor já foi iniciado, mais de qualquer forma é bom forçar a inicialização 
sudo service ssh start
para acessar via ssh login: srv-web senha: 123
é aconselhável criar ou usuário para acesso remoto, por segurança
sudo adduser nome_do_usuario
ativar o sudo no usuário criado
sudo usermod –aG sudo nome_do_usuario
instalação do Firewall, o ubuntu já vem com um firewall padrão UFW
sudo ufw app list
adicionar o OpenSSH na regra do firewall
sudo ufw allow OpenSSH
habilitar o firewall 
sudo ufw enable
verificar o status
sudo ufw status
depois sudo reboot
Agora é a hora da configuração o servidor Apache
sudo apt-get install apache2
verificar se o apache está ok
sudo apache2ctl configtest
Nota que a Syntax está ok mais tem uma mensagem que o ServerName não foi encontrado, para resolver esse problema basta entrar na configuração do apache e adicionar o ‘ServerName’
sudo nano /etc/apache2/apache2.conf
adicione ServerName 172.19.3.105 abaixo de #ServerRoot “/etc/apache2”
sudo apache2ctl configtest
adicionar o apache na regra do firewall
sudo ufw allow in “Apache Full”
Agora é a hora da configuração o servidor Mysql

sudo apt-get install mysql-server
sudo mysql_secure_installation

Agora é a hora da configuração o PHP
sudo apt install php libapache2-mod-php php-mysql
