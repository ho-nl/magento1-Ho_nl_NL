# Nederlandse Magento vertalingen
- Letterlijke vertalingen van de engelse Magento installatie

# Geoptimaliseerde nederlandse Magento vertalingen (zie optimized branch)
Verbeteringen ten opzichte van de standaard nederlandse vertalingen:
- Er wordt eerst gecontroleerd of de shop een telefoonnummer heeft voordat deze wordt getoond
	om dit werkend te maken moet de volgende module geinstalleerd worden: https://github.com/ho-nl/Ho_EmailTempalteAdapter,
	module hoeft niet geconfigureerd te zijn maar moet wel geinstalleerd zijn.
- Bij verzendingen worden de factuurgegevens niet meer meegestuurd.
- Bij facturen en creditfactureren worden de verzendgegevens niet meer meegestuurd.

# Tools
- index.php: Eenvoudig bestanden vertalen.
- MTA: http://code.google.com/p/mta-project/ gebruikt voor het importeren van andere vertalingen.