=== TraumaRadar ===
Contributors:      TraumaRadar.nl
Tags:              traumahelikopters, heli, traumaradar, 112
Requires at least: 5.0
Requires PHP:      5.6
Tested up to:      6.6
Stable tag:        1.0.5
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Toon een map/kaart helikoptervluchten van trauma-, ambulance-, politie- en kustwachthelikopters op je website doormiddel van een widget of shortcode.

== Description ==
**TraumaRadar** biedt een widget en shortcode voor WordPress waarmee gebruikers realtime de route kunnen volgen van trauma-, ambulance-, politie- en kustwachthelikopters. Informatie naar voor gedetailleerde vluchtinformatie. Ideaal voor nieuwswebsites maar ook voor websites gericht op luchtvaart, hulpdiensten of 112 nieuwsverslaggeving.

**Belangrijkste functies**:
- Toon een live kaart met helikopterroutes.
- Ondersteuning voor traumahelikopters, ambulancehelikopters, politiehelikopters en kustwachthelikopters.
- Informatie naar gedetailleerde vluchtgegevens en bijbehorende 112 meldingen
- Eenvoudige integratie via een shortcode of widget op je website.

**Gebruik van de ShortCode**
Je kunt een kaart/map aan je website toevoegen van een helikoptervlucht met behulp van een shortcode:
1. Ga naar je Pagina of Post > Voeg blok toe > Zoek naar "Shortcode"
2. Voeg nu de volgende code toe:

<pre>
[traumaradar_map url="https://traumaradar.nl/vlucht/2024/10/11/103682/lifeliner-4-ph-ttr-naar-groningen-airport-eelde.html" show_title="1" show_date="1" show_map="1"]
</pre>

De parameters:
* _"url"_ - Vervang "url" met de gewenste url naar de vlucht die je wilt tonen. Zoek deze op op [traumaradar.nl](https://traumaradar.nl).
* _"show_title"_ - Toont de titel. Vervang "1" door "0" om de titel niet te tonen.
* _"show_date"_ - Toont de datum van de vlucht. Vervang "1" door "0" om de datum niet te tonen.
* _"show_map"_ - Toont de kaart. Vervang "1" door "0" om de kaart niet te tonen.

**Gebruik van de Widget (vanaf WordPress 6.6)**
Je kunt een kaart/map aan je website toevoegen van een helikoptervlucht met behulp van een block of widget:
1. Ga naar je Pagina of Post > Voeg blok toe > Zoek naar "TraumaRadar Map"
2. Ga naar de traumaradar.nl website en zoek naar de vlucht die je wilt tonen
3. Kopieer de link naar de pagina vanuit de browser en plak deze in het "Traumaradar vlucht url" veld.
4. Kies welke onderdelen je wilt tonen: Kaart, datum en titel.

**Voorwaarden**
Deze plugin maakt gebruik van de (third-party) traumaradar.nl website om het kaartje en de gegevens op je website te tonen. De plugin gebruikt daarvoor de [TraumaRadar API](https://traumaradar.nl/wordpressapi). Let op: deze API mag alleen worden gebruikt door de code van de plugin, het gebruik buiten de plugin om is niet toegestaan. Lees het
[Privacybeleid](https://traumaradar.nl/privacybeleid) en onze [Algemene Voorwaarden](https://traumaradar.nl/algemene-voorwaarden).

== Installation ==
1. Upload de pluginbestanden naar de `/wp-content/plugins/traumaradar` directory of installeer de plugin rechtstreeks via het WordPress plugin scherm.
2. Activeer de plugin via het 'Plugins' scherm in WordPress.
3. Ga naar je Pagina of Post > Voeg blok toe > Zoek naar "Trauma", of
4. Voeg de widget toe via 'Weergave' -> 'Widgets' en plaats deze in een zijbalk of footer.
5. Zoek de vlucht die je wilt tonen op, op traumaradar.nl en plak deze in het vlucht url veld.
6. Je kaart met helikopterroute is nu zichtbaar op je website.

== Frequently Asked Questions ==

= Welke gegevens toont de kaart? =
De kaart toont realtime vluchtgegevens van trauma-, ambulance-, politie- en kustwachthelikopters. Deze gegevens zijn afkomstig van traumaradar.nl en worden constant bijgewerkt.

= Moet ik een API-sleutel instellen? =
Nee, de plugin maakt gebruik van publieke gegevens die door traumaradar.nl beschikbaar worden gesteld. Er is geen configuratie met een API-sleutel nodig.

= Kan ik de widget aanpassen? =
Ja, via de WordPress widgetinstellingen kun je de locatie en weergavestijl van de widget bepalen.

== Screenshots ==
1. Detailweergave van een specifieke helikoptervlucht.
2. Widgetinstellingen in WordPress.

== Changelog ==

= 1.0.5 =
* Kleine verbeteringen

= 1.0.3 =
* Naast widget nu ook een shortcode met live kaart.

= 1.0.2 =
* Eerste release van de Trauma Helikopter Radar Widget.
* Basisfunctionaliteiten toegevoegd: live kaart.

== Upgrade Notice ==
= 1.0.3 =
Shortcode toegevoegd. Geen aanpassingen voor deze update vereist

= 1.0.2 =
Eerste versie. Update is niet vereist, aangezien dit de eerste release is.

== Tags ==
traumahelikopter, ambulancehelikopter, politiehelikopter, kustwacht, vluchten, radar, kaart, helikopter, traumaradar, luchtvaart, emergency services, live tracking

== License & Copyright ==
Deze plugin is gelicenseerd onder de GPLv2 of later.
