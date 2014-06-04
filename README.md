# Nederlandse Magento vertalingen (1.7.x, 1.8.x en 1.9.x)

Binnen [H&O](http://www.h-o.nl/) worden de Nederlandse vertalingen aandachtig bijgehouden zodat niet alleen websites er zo netjes uit zien, maar ook zodat alles zo duidelijk mogelijk is in het Magento Admin Panel.

Compatible met Magento 1.7.x, 1.8.x en 1.9.x, voor 1.6.x zie https://github.com/ho-nl/magento-nl_NL (wordt niet meer geupdate).

# Dutch Magento translations (1.7.x, 1.8.x and 1.9.x)
Compatible with Magento 1.7.x, 1.8.x and 1.9.x.

## Installatie
Op dit moment is het niet mogelijk om te installeren via Magento Connect.

### Installatie standaard:
1. Download het de bestanden: https://github.com/ho-nl/Ho_nl_NL/archive/master.zip
2. Kopieer de map `/app/locale/nl_NL` naar je Magento installatie (als je al een eerdere vertaling hebt geinstalleerd via Magento connect, verwijder deze eerst).
3. Cache even legen en zorgen dat je de Nederlandse taal hebt ingesteld.

### Installatie via [modman](https://github.com/colinmollenhour/modman):
- Navigeer naar je magento root via de shell en draai: `modman clone git@github.com:ho-nl/Ho_nl_NL.git`.

## Eigen vertalingen toevoegen
Vertalingen welke specifiek voor jouw webshop zijn en geen vertalingen zijn voor iedereen kan je beter niet direct aanpassen in de module (dus niet in app/locale/nl_NL), hiervoor kun je beter de Inline translator gebruiken of template vertalingen toevoegen.

- [Inline Translator Tutorial](http://www.magentowebshop.org/magento-webshop/magento-webshop-translate-inline/)
- [Template vertalingen](http://tomrobertshaw.net/2010/03/magento-themes-using-locales-with-translate-csv/)

## Help mee
Samen werken is beter dan alleen. Betere vertalingen zorgen voor een betere conversie, zorgen voor minder onduidelijkheid en voor minder support. Wil je mee helpen met de vertalingen dan wordt dat zeer gewaardeerd.

Het meeste is al vertaald, maar er zijn ongetwijfeld vertalingen vergeten, modules nog niet ondersteund of simpelweg stomme vertalingen.

Kom je een probleem tegen, maak een issue aan via de [Issue tracker](https://github.com/ho-nl/Ho_nl_NL/issues) of maak een pull request:
- [Fork A Repo](https://help.github.com/articles/fork-a-repo)
- [Wijzig het bestand online](https://github.com/blog/905-edit-like-an-ace)

## Over de auteurs

![Over H&O](http://www.h-o.nl/skin/frontend/h-o/images/logo.png)

__H&O is expert in het oplossen van complexe Magento vraagstukken, maatwerk grafisch ontwerp en het bouwen
van custom Magento modules.__

Als je op zoek bent naar een partner die je kan helpen met het beantwoorden van moeilijke Magento vragen,
een maatwerk productimport voor je ontwikkeld of een custom Magento module voor je schrijft die jouw
assortiment met een andere webshop koppelt, dan ben je aan het juiste adres. H&O heeft zich sinds 2007
verdiept in de techniek en ontwikkelingen van het e-commerce CMS, speelt een actieve rol in de community,
heeft verschillende modules uitgebracht en heeft voor klanten uiteenlopende technische modules ontwikkeld.
Ons kantoor is gevestigd in Roelofarendsveen, direct naast de A4 én slechts op 15 minuten afstand van
Amsterdam. Neem contact met ons op en kom eens langs, dan bespreken we jouw vraagstuk!
