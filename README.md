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
  - [Create Factorys](#create-factorys)


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

## Create Factorys
Ich habe für alle Models eine Factory erstelt um Test daten zu erstellen.