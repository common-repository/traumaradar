<?php
/**
 * Show settings page in the root menu with usage instructions
 *
 * @package traumaradar
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function traumardr_add_settings_page() {
    add_menu_page(
        'TraumaRadar Settings', // Page title
        'TraumaRadar', // Menu title
        'manage_options', // Capability
        'traumaradar-settings', // Menu slug
        'traumardr_render_settings_page', // Callback function
        'dashicons-location-alt', // Icon URL
        100 // Position
    );
}

function traumardr_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>TraumaRadar Settings</h1>
        <h2>Usage Instructions</h2>
        <p>Toon een map/kaart helikoptervluchten van trauma-, ambulance-, politie- en kustwachthelikopters op je website doormiddel van een widget of shortcode.</p>
        
        <h3>Gebruik van de ShortCode</h3>
        <ol>
            <li>Ga naar je Pagina of Post > Voeg blok toe > Zoek naar "Shortcode"</li>
            <li>Voeg nu de volgende code toe:</li>
        </ol>
        <pre>[traumaradar_map url="https://traumaradar.nl/vlucht/2024/10/11/103682/lifeliner-4-ph-ttr-naar-groningen-airport-eelde.html" show_title="1" show_date="1" show_map="1"]</pre>
        <p>De parameters:</p>
        <ul>
            <li><strong>url</strong> - Vervang "url" met de gewenste url naar de vlucht die je wilt tonen. Zoek deze op op <a href="https://traumaradar.nl" target="_blank">traumaradar.nl</a>.</li>
            <li><strong>show_title</strong> - Toont de titel. Vervang "1" door "0" om de titel niet te tonen.</li>
            <li><strong>show_date</strong> - Toont de datum van de vlucht. Vervang "1" door "0" om de datum niet te tonen.</li>
            <li><strong>show_map</strong> - Toont de kaart. Vervang "1" door "0" om de kaart niet te tonen.</li>
        </ul>

        <h3>Gebruik van de Widget (vanaf WordPress 6.6)</h3>
        <ol>
            <li>Ga naar je Pagina of Post > Voeg blok toe > Zoek naar "TraumaRadar Map"</li>
            <li>Ga naar de <a href="https://traumaradar.nl" target="_blank">traumaradar.nl</a> website en zoek naar de vlucht die je wilt tonen</li>
            <li>Kopieer de link naar de pagina vanuit de browser en plak deze in het "Traumaradar vlucht url" veld.</li>
            <li>Kies welke onderdelen je wilt tonen: Kaart, datum en titel.</li>
        </ol>       

        <h3>Voorwaarden</h3>
        <p>Deze plugin maakt gebruik van de (third-party) <a href="https://traumaradar.nl" target="_blank">traumaradar.nl</a> website om het kaartje en de gegevens op je website te tonen. De plugin gebruikt daarvoor de <a href="https://traumaradar.nl/wordpressapi" target="_blank">TraumaRadar API</a>. Let op: deze API mag alleen worden gebruikt door de code van de plugin, het gebruik buiten de plugin om is niet toegestaan. Lees het <a href="https://traumaradar.nl/privacybeleid" target="_blank">Privacybeleid</a> en onze <a href="https://traumaradar.nl/algemene-voorwaarden" target="_blank">Algemene Voorwaarden</a>.</p>
    </div>
    <?php
}

add_action('admin_menu', 'traumardr_add_settings_page');