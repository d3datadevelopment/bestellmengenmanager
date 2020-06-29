---
title: Modul zur Installation hinzufügen
---

Für das Modul **{$modulname}** sind Anpassungen an den originalen Dateien des Shops nötig. Die Änderungen werden automatisiert als Patches eingespielt. Um diese Patches integrieren zu können, ist es nötig, in der `composer.json`-Datei des Shopprojektes Folgendes einmalig einzufügen:

```
"extra": {
    "enable-patching": true
}
```

Existiert der `Extra`-Bereich schon, fügen Sie den Inhalt dort ein.

Führen Sie dann in der Konsole im Hauptverzeichnis Ihres Shops (oberhalb des `source`- und `vendor`-Verzeichnisses) diesen Befehl aus, um das Modul **{$modulename}** zur Installation hinzuzufügen:

```bash
php composer require {$composerident}:^{$moduleversion} --update-no-dev
``` 

> [i] Benötigt Ihre Installation einen anderen Aufruf von Composer, ändern Sie den Befehl bitte entsprechend ab. Für weitere Optionen dieses Befehls lesen Sie bitte die [Dokumentation von Composer](https://getcomposer.org/doc/03-cli.md#require).
