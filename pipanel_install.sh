#!/bin/bash
# PiPanel setup script

# Make sure this script is being run by root
if [[ $EUID -ne 0 ]]; then
   echo "Necesitas ser root para instalar PiPanel" 1>&2
   echo "Prueba: sudo "$0 1>&2
   exit 1
fi

echo -e "\nInstalador PiPanel\n-----------------"

echo -e "\nInstalando los pre-requisitos...."
apt-get -y install apache2 php5 pwauth git || { echo -e "Instalacion fallida!" 1>&2; exit 1; }

echo -e "\nEliminando versiones anteriores de PiPanel...."
rm -fr /usr/share/pipanel || { echo -e "Instalacion fallida!" 1>&2; exit 1; }

echo -e "\nDescargando la ultima version de PiPanel...."
git clone https://github.com/iKrix/pipanel.git /usr/share/pipanel/

echo -e "\nCopiando la configuracion requerida...."
cp -R /usr/share/pipanel/default_config/apache2 /etc || { echo -e "Instalacion fallida!" 1>&2; exit 1; }
cp -R /usr/share/pipanel/default_config/sudoers.d /etc || { echo -e "Instalacion fallida!" 1>&2; exit 1; }
chmod 440 /etc/sudoers.d/pipanel || { echo -e "Instalacion fallida!" 1>&2; exit 1; }/

echo -e "\nCreando las carpetas de logs...."
if [ ! -d /var/log/pipanel ]; then
  mkdir /var/log/pipanel
fi

echo -e "\nCreando archivo cron.....\n"
touch /var/spool/cron/crontabs/www-data
chmod 600 /var/spool/cron/crontabs/www-data

echo -e "\nActivando modulos de apache requeridos...."
a2enmod rewrite authnz_external || { echo -e "Instalacion fallida!" 1>&2; exit 1; }

echo -e "\nActivando la confguracion para PiPanel...."
a2dissite default || { echo -e "Instalacion fallida!" 1>&2; exit 1; }
a2ensite pipanel || { echo -e "Instalacion fallida!" 1>&2; exit 1; }

echo -e "\nReiniciando apache...."
service apache2 restart || { echo -e "Instalacion fallida!" 1>&2; exit 1; }


echo -e "\nInstalacion completada!"
echo -e "Ahora puedes ir a un navegador y disfrutar de PiPanel\n"
