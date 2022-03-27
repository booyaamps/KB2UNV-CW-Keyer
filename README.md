# KB2UNV-CW-Keyer
A GPIO/web based CW keyer for amateur radio
# Setup
Install PHP/Apache on your pi, edit /etc/apache2/envvars so the run as user for Apache is pi, copy this code to your webroot and open at http://localhost on the pi.
# GPIO Pin configuration
Inside of cw.php, you will see two setting to setup your TX pin and your keyer pin. I personally use two solid state relays connected to my HF radio as the TX control and virtual key, but mechanical relays will work as well. A cheap option to get you started is the Velleman VMA400 or something of the like.
