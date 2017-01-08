# Universeel bestelsysteem #

##Inleiding##

Voor het project *Webaplicaties* ga ik een universeel bestelsysteem maken. Het is de bedoeling dat (kleine) handelaars een account op mijn website kunnen maken. Zo krijgen ze toegang tot een adminzone. In deze adminzone kan men een bestelpagina configureren. Op deze bestelpagina, met een unieke URL, kunnen klanten bestellingen maken met de mogelijkheid om een dag en een uur van afhaling mee te geven. 

##Te gebruiken technologie##

- Front-end: Afgeleide van bootstrap
- Backend: Laravel
- Services: Apache op RPI
- Security/maintenance: Https + Backup



----------

##Apache op Raspberry Pi##

**INLEIDING**

De webserver draait op een Raspberry Pi. Dit is een kleine embedded computer. In deze tutorial ga ik er van uit dat je de Raspberry Pi al werkend hebt gekregen en dat je ook al verbinding hebt gemaakt via SSH.

**APACHE INSTALLEREN**

Om Apache en PHP te installeren, gebruik je het volgende commando: `sudo apt-get install apache2 php5 libapache2-mod-php5`

Als je errors krijgt, kan je steeds volgende commando's runnen:

`sudo groupadd www-data`

`sudo usermod -g www-data www-data`

Als het installeren voltooid is, moet je de Apache server herstarten met het commando: `sudo service apache2 restart`

Open je browser en geef het IP adres van je Pi in. Nu zou je normaal de pagina die hieronder weergegeven  is, moeten krijgen.

![](apacheDefault.png)

In de map `/var/www/html` kan je de pagina aanpassen of een reeds gemaakte pagina plaatsen.

> Bron: http://www.instructables.com/id/Turning-your-Raspberry-Pi-into-a-personal-web-serv/?ALLSTEPS

**PHPMYADMIN**

PhpMyAdmin is een handige webinterface om je lokale SQL databank te besturen. 

Installeer PhpMyAdmin: `sudo apt-get install phpmyadmin`

Je krijgt verschillende vensters om PhpMyAdmin te configureren. 

Om PhpMyAdmin te laten samenwerken met Apache moet je de configfile `/etc/apache2/apache2.conf` aanpassen. Voeg aan het einde van de file volgende regel toe: `Include /etc/phpmyadmin/apache.conf`. Herstart nu je server: `/etc/init.d/apache2 restart`.

**Wat heb ik anders gedaan?**

Het volgende commando installeert nog enkele modules en upgrade php naar de laatste versie. 

    sudo apt-get install php5 php5-cli libapache2-mod-php5 php5-mysql php5-curl php5-gd php-pear php5-imagick php5-mcrypt php5-memcache php5-mhash php5-sqlite php5-xmlrpc php5-xsl php5-json php5-dev libpcre3-dev

> Bron: https://www.stewright.me/2012/09/tutorial-install-phpmyadmin-on-your-raspberry-pi

## No-IP ##

Nu heb je een webserver draaiende. Maar enkel de apparaten in je eigen netwerk hebben toegang tot deze webserver. Om ervoor te zorgen dat apparaten buiten je netwerk ook toegang hebben, kan je een domeinnaam aanmaken. No-IP is een gratis oplossing. 

Maak een account aan op de No-IP website (www.noip.com) en voeg een domeinnaam toe. 

Ik heb gekozen voor de domeinnaam: `robbe000.hopto.org`

![](noip.jpg)

Nu kan je volgende tutorial volgen:

> http://www.noip.com/support/knowledgebase/install-ip-duc-onto-raspberry-pi/

**Wat heb ik anders gedaan?**

Bij het surfen naar mijn website kwam ik steeds op de inlogpagina van mijn router uit. Ik had poort 80 (http) en 443 (https) al opengezet via *mijntelenet*. Echter bleek dat ik de poorten nog moest forwarden op mijn eigen router. 

Dit is heel simpel. Je suft naar het IP adres van uw router, in mijn geval `192.168.1.1` (Te vinden via ipconfig op Windows en via ifconfig op Linux). Daar kan je via een webinterface de instellingen aanpassen. 

## Intermezzo ##

Tijdens het maken van dit project was ik ook bezig met het bouwen van een nieuwe Chirowebsite. Omdat alle leiding hun persoonlijke gegevens moesten invullen via de adminzone heb ik deze website gedurende twee weken om mijn Raspberry Pi laten draaien. Zo kon onze oude website ondertussen gewoon blijven werken. 

Tijdens deze periode stootte ik wel op enkele problemen. Zo bleek de GSM oplader die ik als voeding gebruikte niet genoeg vermogen te leveren. Hierdoor viel mijn verbinding soms uit. Na het selecteren van een nieuwe voedingsbron werkte alles perfect. 

## Larvel ##

Laravel installeren op je Raspberry Pi is heel simpel. Volg volgende tutorial:

> http://valentinvannay.com/2016/01/21/installation-of-a-web-server-and-laravel-5-on-a-raspberry-pi-2/

Verder heb ik de tutorials van Laravel From Scratch gevolgd. Deze waren allemaal heel goed en duidelijk. 

**Problemen**

Omdat er ondertussen al een nieuwere versie van Laravel uitgekomen is, zijn sommige zaken wel anders dan in de tutorials. Na een beetje opzoekwerk waren deze problemen snel verholpen. 

Ik heb de website ontworpen op een gewone Windows laptop met behulp van Xampp. Als ik de website verplaatste naar mijn Raspberry Pi doken er toch enkel problemen op. Deze heb ik relatief snel kunnen oplossen aan de hand van onderstaande video. 

> https://www.youtube.com/watch?v=7mWZLPdE2B4

## HTTPS ##

Overschakelen naar HTTPS was verbazend simpel. Hiervoor maakte ik gebruik van Let's Encrypt. 
Via de Certbot applicatie kun je heel gemakkelijk bewijzen dat jij de eigenaar bent van de server. 
Naast de informatie die staat op `letsencrypt.org` heb ik ook nog volgende tutorial bekeken:


> https://www.youtube.com/watch?v=IjL3D9km3II

## Backup ##

Ik wil elke ochtend een back-up van mijn databank maken. Dit door gebruik te maken van `crontab`. Hiermee kan je eender welk commando laten uitvoeren op eender welk tijdstip. Dagelijks, wekelijks, maandelijks of jaarlijks. 

    30 6   * * *   root    mysqldump -u root -pWachtwoord bestelServer > /home/pi/backup/backup_$(date +"%Y_%m_%d_%I_%M_%p").sql

> https://www.youtube.com/watch?v=vrPGRE6FV9g

## Front-end ##

Qua front-end heb ik gebruik gemaakt van verschillende bronnen. De hoofdpagina bestaat grotendeels uit een template vanop `startbootstrap.com`. Dit is een website die gratis bootstrap templates en componenten aanbiedt. Dit is zeer handig, omdat van een wit blad beginnen niet gemakkelijk is. In de adminzone maakte ik vooral gebruik van standaard bootstrap componenten en componenten afkomstig van `startbootstrap.com`.


----------

# Eindverslag #

## Doel van de website ##

De website zelf fungeert als een platform voor (lokale) handelaars. Het is de bedoeling dat ze op een eenvoudige manier hun cliënteel kunnen uitbreiden door hun klanten toe te laten online producten te bestellen. Het enige wat ze nodig hebben is een laptop en een internetverbinding.

Via de adminzone kunnen handelaars een gratis account aanmaken. Via dit account kan men:

- Meerdere winkels aanmaken, verwijderen en bewerken
- Producten per winkel toevoegen, verwijderen en bewerken
- Bestellingen die klanten gemaakt hebben bekijken.

Bij dit laatste is ook de contact info zichtbaar waardoor men heel eenvoudig feedback kan sturen naar de klant. Bv.: “Sorry, uw bestelling zal niet op het gevraagde uur klaar zijn. Is 1 uur later ook mogelijk?”

De klant zelf kan via een overzichtspagina alle winkels bekijken. Nadat hij de juiste winkel gekozen heeft, hoeft hij enkel de producten aan te duiden die hij wenst te kopen. Na het invullen van enkele persoonlijke gegevens, klikt hij op verzenden en klaar! De bestelling is geplaatst. Nu is het aan de verkoper op hierop te reageren. 