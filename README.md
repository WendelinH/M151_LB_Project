# Documentation

|             |          |
| ----------- | -------- |
| **Vorname** | Wendelin |
| **Name**    | Haller   |
| **Projekt** | M151 LB  |

## Inhaltsverzeichnis
- [Documentation](#documentation)
  - [Inhaltsverzeichnis](#inhaltsverzeichnis)
    - [Wichtige Dateine](#wichtige-dateine)
  - [Inbetriebname](#inbetriebname)
  - [Laravel Start](#laravel-start)
  - [Created Modles](#created-modles)
  - [Insert PHPMyAdmin](#insert-phpmyadmin)
  - [Create Factorys](#create-factorys)
  - [Views erstellen](#views-erstellen)
  - [Warenkorb erstellen](#warenkorb-erstellen)
  - [Erstellung des Adminbereichs](#erstellung-des-adminbereichs)
  - [Unit Tests](#unit-tests)
  - [Abname Tests](#abname-tests)
    - [Warenkorb Test](#warenkorb-test)
    - [Bestellungs Test](#bestellungs-test)
  - [Issues](#issues)
  - [Aufgetauchte Fragen](#aufgetauchte-fragen)
  - [Hilfsmittel](#hilfsmittel)

### Wichtige Dateine
- [Documentation PDF](Documentation.pdf)
- [Daten.sql](daten.sql)

## Inbetriebname
Docker starten und dann auf [localhost](http://localhost) gehen.

Als erstes muss der [SQL Code](daten.sql) auf der Datenbank ausgefürt werden. [PHPMyAdmin](http://localhost/phpmyadmin)
> Einlogdaten
```md
# Gast User:
-  email: gast@example.com
-  password: password

# Admin User:
- email: admin@example.com
- password: klapp42stuhl
```

## Laravel Start
Ich habe das Projekt an dem wir in der Schuhle gearbeitet haben kopiert und abgeändert.


## Created Modles
Als erst habe ich alle Models und Migrations Dateien erstelt und den nötigen Code reingeschrieben.

Models:
- Artikel
- Bestell Position
- Bestellte Konfiguration
- Bestellung
- Inhalt
- Konfiguration
- Kunde
- User
- Warenkorb
- Warenkorb Artikel
- Warenkorb Artikel Inhalt


## Insert PHPMyAdmin
[Daten.sql](daten.sql)

Diese Daten habe ich in der Datenbank gespeichert und natürlich auch diedazugehörigen Bilder im [public/img](public/img) Ordner.

## Create Factorys
Ich habe für die meisten Models eine Factory erstellt um Test daten zu erstellen.


## Views erstellen
Alls erstes habe ich mit der Main Page angefangen danach habe ich die Artikel index gemacht wo man einen überblick über alle Artikel hat.
Danach habe ich mich um den Artikel show View gekümmert das die Artikel mit dessen Inhalen schön aufgezeigt werden.
Zunächst habe ich das Erstellungs Formular für einen Kunden erstellt. Die nächste View die ich erstelt habe war die Kunde Show View und der Edit View. Für alle Views und Formulare habe ich noch die entsprechenden Controller erstellt und implemmentiert. Alls nächstes habe ich die Darstelung und Speicherung des warenkorbs erstellt. [siehe Warenkorb erstellen](#warenkorb-erstellen)

## Warenkorb erstellen
Zuerst habe ich die drei Models erstellt. Und die dazugehörenden Migration und Controller immplementiert.

## Erstellung des Adminbereichs
Um einen Admin bereich realisieren zu können habe ich bein User Model eine Spalte "is_admin" hinzugefügt um zwischen Kunde und Admin User unterscheiden zu können. Danach habe ich Die CRUD Views und dazu die Controller implemmentiert. In den Views habe ich eine if verzweigung verwendet 
```laravel
@if (Auth::user()->is_Admin())
```
um je nach dem ob er User Admin ist oder nicht Die CRUD Formulare und Buttons anzuzeigen oder nicht.

## Unit Tests
Ich habe 2 Tests erstelt für die ArtikelController Classe und habe die Funktion "store" und "update" getestet.

## Abname Tests
Zwei Abname Tests habe ich erstellt. Ein Warenkorb Test und ein Bestellung Test.
### Warenkorb Test
|                | Testfall Nr.1                                                                  |
| -------------- | ------------------------------------------------------------------------------ |
| Testname:      | Warenkorb                                                                      |
| Absicht:       | Artikel in den Warenkorb packen.                                               |
| Eingabedaten:  | Gast User Login-Daten                                                          |
| Soll-Ergebnis: | Auf der Home Seite wird der Warenkorb und die hinzugefügten Artikel angezeigt. |

| Schritt Nr. | Vorgehen                                                               | Erwartetes Ergebnis                                                                                                                                                    | Abweichungen |
| ----------: | ---------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------ |
|           1 | Als Gast User einloggen.                                               | Die Home Seite wird angezeigt und man ist eingeloggt.                                                                                                                  | Keine        |
|           2 | Auf den "Auswahl anzeigen." Knopf drücken.                             | Man kommt auf eine neue Seite und es werden alle Artikel angezeigt.                                                                                                    | Keine        |
|           3 | Auf den "Bestellen" Knopf eines Artikels drücken.                      | Die Seite des Artikels wird angezeigt.                                                                                                                                 | Keine        |
|           4 | Die einzelnen Inhalte auswählen und auf den "Bestellen" Knopf drücken. | Der Artikel mit den ausgewählten Inhalten wird in der Datenbank gespeichert und die Home Seite wird angezeigt mit dem Warenkorb und seinen Artikel und deren Inhalten. | Keine        |
---
### Bestellungs Test
|                | Testfall Nr.2                                                               |
| -------------- | --------------------------------------------------------------------------- |
| Testname:      | Bestellung                                                                  |
| Absicht:       | Was im Warenkorb ist zu bestellen.                                          |
| Eingabedaten:  | Angemessene Kunden Daten.                                                   |
| Soll-Ergebnis: | Der Warenkorb ist leer und die Bestellung ist in der Datenbank gespeichert. |

| Schritt Nr. | Vorgehen                                                                      | Erwartetes Ergebnis                                                                                                          | Abweichungen |
| ----------: | ----------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ------------ |
|           1 | Testfall Nr.1 durchführen.                                                    | Auf der Home Seite wird der Warenkorb und die hinzugefügten Artikel angezeigt.                                               | Keine        |
|           2 | Auf den "Check out" Knopf drücken.                                            | Es wird ein Kunden-Formular angezeigt.                                                                                       | Keine        |
|           3 | Das Kunden-Formular ausfüllen und auf den "Weiter" Knopf drücken.             | Zur Überprüfung werden die Kunden-Daten und der Warenkorb angezeigt. Es wird auch ein Eingabefeld für Bemerkungen angezeigt. | Keine        |
|           4 | Eine Bemerkung hinzufügen und auf den "Bestellung abschliesen" Knopf drücken. | Es wird eine Dankens-Seite angezeigt. Die Bestellung wurde in der Datenbank gespeichert. Der Warenkorb wurde gelöscht.       | Keine        |
---

## Issues
Was hate ich im verlauf des Projektes für Problemme.
- Ich habe zwei spalten bei den Models vergessen zu erstellen was dan zu fehler gefürt hat.

## Aufgetauchte Fragen
Im verlaufe des Projekts sind ein Paar Fragen aufgetaucht.
- Wen als erstes die Produkt_Position erstellt werden muss, dies aber ein Forigen key von Bestellung braucht / wie kan man Temporär zwischen verschidenen Views daten speichern Kunde Id ...
  - Warenkorb erstellen
- Wie erstellt man einen Admin-User ?
  - User eine Spalte is_admin hinzufügen.
- Wie soll man das mit dem Kunden Infos und zurück machen Edit-View oder Create view mit ausgefültem Formular.
  - edit View !!
- Show Kunde View anders lösen nicht mit show und id in Url
  - show und id in URL und überprüfen ob der richtige user eingelogt ist.

## Hilfsmittel
- [Laravel Dokumentation](https://laravel.com/docs/9.x/)
- [Stackoverflow](https://stackoverflow.com/)
- [nelkasovic/docker-laravel-playground](https://github.com/nelkasovic/docker-laravel-playground)
- Lehrer der mir Frage beantwortet hat.