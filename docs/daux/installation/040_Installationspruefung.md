---
title: Installationsprüfung
---

Um die erfolgreiche Installation zu prüfen, können Sie die folgende(n) Checkliste(n) verwenden:

## Einstellungsunabhängige Prüfungen

### Backend

* Modul ist unter [ Erweiterungen ] -> [ Module ] aktiv geschaltet
* Modul ist unter [ (D3) Module ] -> [ Modul-Connector ] -> [ Modulverwaltung ] aktiv geschaltet
* Modul zeigt unter [ (D3) Module ] -> [ {$menutitle} ] einen eigenen Bereich für Einstellungen
* Modul zeigt unter [ Artikel verwalten ] -> [ Artikel ] -> [ Erweitert ] einen neuen Bereich [ (D3) Bestellmengen Manager ] mit Eingabemöglichkeiten für
Mindestmenge, Maximalmenge und Verpackungseinheit, sowie 2 Hilfebuttons mit Regeln und Tipps.

### Frontend

* Auf der Detailseite eines eingestellten Artikels (mit Mindest-, Maximalmenge oder Verpackungseinheit) sollten folgende Punkte erfüllt sein:
  * Bei Mindestmenge/Verpackungseinheit muss das Mengen-Eingabefeld die Mindestmenge/Verpackungseinheit bereitstellen
  * Die am Artikel hinterlegten Werte stehen direkt unter dem "in den Warenkorb"-Button bspw.:
    (Mindestbestellmenge: 10 Stück)
    (Maximale Bestellmenge: 50 Stück)
    (Verpackungseinheit: 5 Stück)
    
## Einstellungsabhängige Prüfungen

### Backend

* Unter [ (D3) Module] -> [ Bestellmengen Manager ] können Sie die Checkbox [ Soll bei unzureichenden Bestellmengen eine korrigierte Menge in den Warenkorb gelegt werden? ] einstellen.
  * Checkbox: **inaktiv** (Standard)
    Aktion: eine falsche Eingabe im Frontend (Mindestmenge: 5, Eingabe: 1)
    Auswirkung: Der Artikel wird nicht in den Warenkorb gelegt und zeigt eine
    Fehlermeldung (oranges Icon).
  * Checkbox: **aktiv**
    Aktion: eine falsche Eingabe im Frontend (Mindestmenge: 5, Eingabe: 1)
    Auswirkung: Der Artikel wird mit korrigierter Menge 5 in den Warenkorb
    gelegt und zeigt eine Fehlermeldung (blaues Icon).