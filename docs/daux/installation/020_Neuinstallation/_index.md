---
Title: Schnellstart per Composer
---

## Schnellstart per Composer

### **auf der Kommandozeile**

```bash
php composer config extra.enable-patching true

php composer require {$composerident}:^{$moduleversion} --update-no-dev
./vendor/bin/oe-console oe:module:activate {$metadataident}
./vendor/bin/d3modules_install
./vendor/bin/d3cleartmp
```

Detailliertere Angaben zur Installation entnehmen Sie bitte den folgenden Seiten.
