# Documentation

|             |          |
| ----------- | -------- |
| **Name**    | Wendelin |
| **Vorname** | Haller   |
| **Projekt** | M151 LB  |

## Inhaltsverzeichnis
- [Documentation](#documentation)
  - [Inhaltsverzeichnis](#inhaltsverzeichnis)
  - [Laravel Start](#laravel-start)
  - [Created Modles](#created-modles)
  - [Insert PHPMyAdmin](#insert-phpmyadmin)
  - [Create Factorys](#create-factorys)
  - [Views erstellen](#views-erstellen)
  - [Warenkorb erstellen](#warenkorb-erstellen)
  - [Issues](#issues)
  - [Aufgetauchte Fragen](#aufgetauchte-fragen)


## Laravel Start
Ich habe das Projekt an dem wir in der Schuhle gearbeitet haben kopiert und abgeändert.


## Created Modles
Als erst habe ich alle Models und Migrations Dateien erstelt und den nötigen Code reingeschrieben.

Models:
- Artikel
  - [app/Models/Artikel.php](app/Models/Artikel.php)
  - [database/migrations/2022_06_17_084135_artikel.php](database/migrations/2022_06_17_084135_artikel.php)
- Bestell Position
  - [app/Models/BestellPosition.php](app/Models/BestellPosition.php)
  - [database/migrations/2022_06_17_092513_bestell_position.php](database/migrations/2022_06_17_092513_bestell_position.php)
- Bestellte Konfiguration
  - [app/Models/BestellteKonfiguration.php](app/Models/BestellteKonfiguration.php)
  - [database/migrations/2022_06_17_092848_bestellte_konfiguration.php](database/migrations/2022_06_17_092848_bestellte_konfiguration.php)
- Bestellung
  - [app/Models/Bestellung.php](app/Models/Bestellung.php)
  - [database/migrations/2022_06_17_090444_bestellung.php](database/migrations/2022_06_17_090444_bestellung.php)
- Inhalt
  - [app/Models/Inhalt.php](app/Models/Inhalt.php)
  - [database/migrations/2022_06_17_085530_inhalt.php](database/migrations/2022_06_17_085530_inhalt.php)
- Konfiguration
  - [app/Models/Konfiguration.php](app/Models/Konfiguration.php)
  - [database/migrations/2022_06_17_091800_konfiguration.php](database/migrations/2022_06_17_091800_konfiguration.php)
- Kunde
  - [app/Models/Kunde.php](app/Models/Kunde.php)
  - [database/migrations/2022_06_17_085744_kunde.php](database/migrations/2022_06_17_085744_kunde.php)


## Insert PHPMyAdmin
```sql
INSERT INTO Artikels(
    bezeichnung,
    id,
    preis,
    image_path
)
VALUES('Etui', 1, 9.90, 'etui.jpg'),(
    'Holzschachtel',
    2,
    11.90,
    'holzschachtel.jpg'
);
INSERT INTO Inhalts(
    id,
    bezeichnung,
    preis,
    image_path
)
VALUES(
    1,
    'Bleistift',
    0.90,
    'bleistift.jpg'
),(2, 'Schere', 3.50, 'schere.jpg'),(3, 'Radiergummi', 0.90, 'gummi.jpg'),(4, 'Spitzer', 5.00, 'spitzer.jpg'),(
    5,
    'Filzstift',
    1.50,
    'filzstift.jpg'
),(6, 'Zirkel', 7.90, 'zirkel.jpg'),(7, 'Lineal', 2.50, 'lineal.jpg'),(
    8,
    'Kugelschreiber',
    0.90,
    'kugelschreiber.jpg'
);
INSERT INTO konfigurations(artikel_id, inhalt_id)
VALUES(1, 1),(1, 2),(1, 3),(1, 4),(1, 5),(1, 8),(2, 1),(2, 3),(2, 4),(2, 5),(2, 6),(2, 7),(2, 8);
```

## Create Factorys
Ich habe für alle Models eine Factory erstellt um Test daten zu erstellen.


## Views erstellen
Alls erstes habe ich mit der Main Page angefangen danach habe ich die Artikel index gemacht wo man einen überblich über alle Artikel hat.
Danach habe ich mich um den Artikel show View gekümmert das die Artikel mit dessen Inhalen schön aufgezeigt werden.
Zunächst habe ich das Erstellungs Formular für einen Kunden erstellt. Die nächste View die ich erstelt habe war die Kunde Show View.


## Warenkorb erstellen
Zuerst habe ich das Model, die Migration und Controller erstelt.

## Issues
Was hate ich im verlauf des Projektes für Problemme.
- Ich habe zwei spalten bei den Models vergessen zu erstellen was dan zu fehler gefürt hat.

## Aufgetauchte Fragen
Im verlaufe sin ein Paar Fragen aufgetaucht.
- Wen als erstes die Produkt_Position erstelt werden us dies aber ein Forigen key von Bestellung braucht / wie kan man Temporär zwischen verschidenen Views daten speichern Kunde Id ...
  - Warenkorb erstellen
- Wie erstellt man einen Admin-User ?
  - erledigt
- Wie soll man das mit dem Kunden Infos und zurück machen Edit-View oder Create view mit ausgefültem Formular.
  - edit View xD
- Show Kunde View anders lösen nicht mit show und id in Url
  - show und id in URL und überprüfen ob der richtige user eingelogt ist.