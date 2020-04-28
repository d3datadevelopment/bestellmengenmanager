---
title: Changelog
---

## 5.0.2.1 - (2020-04-28)
### Changed
0000000: Dokumentation angepasst

---

## 5.0.2.0
### Added
0000000: Modul kann via Composer installiert werden

### Fixed
0000000: fixed bargain min input in flow theme

---

## 5.0.1.0
0006194: Modulupdate erkennt veraltetete Smarty-Plugin-Dateien nicht
0006414: Umsetzung der HTML5-Attribute (input > min, max, step) als JavaScript
0006656: minimale Eingabemenge auf 1 setzen, wenn Artikel bereits im Warenkorb vorhanden
0006661: Warenkorb anzeigen der Bestellmengen ermöglichen
0006662: eigenen Adminbereich erstellen
0000000: fixed bargain minimun input im flow theme

---

## 5.0.0.0
0000000: module is ported to oxid V6
0000000: dropped mobile theme support

---

## 4.1.2.0
0000000: compatibilty with flow theme established
0006214: fatal error in azure theme and inactive (but installed) module
0006657: to much drift messages with multiples article in basket
0005943: logging entries have improper log level "error"
0006671: HTML5 steps causes unbuyable amount

---

## 4.1.1.0
modified: 0005360: allow floating values for quantities
modified: 0000000: correct handling for popup depending on admin option "new basket message type"
dropped: 0000000: (only EE) installation routine installs into all shops
modified: 0000000: support for 4.8.x/5.1.x closed
added: 0001943: new setting for rest values

---

## 4.1.0.0
modified: 0003581: default-values in *_update.php should be null
added: 0002987: Modul auf das Oxid Mobile Theme anpassen
added: 0003939: HTML 5 min, max und step Attribute nutzen

---

## 4.0.4.0
modified: bugfix, drift popup did not pop up on first "to basket" form submission with incorrect amount
modified: drop support for 4.7.x/5.0.x, added support for 4.9.x/5.2.x

---

## 4.0.3.1 - 2014-07-14
added: backwards compatibility to Shopversion 4.7.x
modified: smarty plugin function.d3_oqm_getminamount.php filename changed to lower case

---

## 4.0.3.0 - 2014-05-28
modified: bugfix, no popup was shown on product with oqm options, when product has been added to cart
modified: bugfix, wrong template reference in template-block widget_product_bargainitem_tobasket
          (content of bargainitems.tpl was moved to bargainitem.tpl in shopversion 4.8.0)
added:    better frontend handling with shop own unit name and unit quantity
modified: moved module smarty-plugins from core/smarty/plugins/ to module-folder d3/d3oqm/core/smarty/plugins/

---

## 4.0.2.2 - 2014-04-30
modified: update precheck to version 4.1

---

## 4.0.2.1 - 2014-03-21
modified: bugfix, oxunitname was not translated

---

## 4.0.2.0 - 2014-01-03
modified: precheck with subfolder check
modified: module was rebuilded for 4.8.x (tested in 4.8.1)
modified: template was moved:
          from application/views/azure/tpl/page/compare/inc/compareitem.tpl
          to   application/views/azure/tpl/widget/product/compareitem.tpl

---

## 4.0.1.0 - 2013-08-06
modified: module can use floating values

---

## 4.0.0.3 - 2013-05-28
modified: bugfix, autom. installation for EE Shops

---

## 4.0.0.2 - 2013-04-30
modified: bugfix for php 5.2 autom. installation - heredoc required php 5.3

---

## 4.0.0.1 - 2013-04-24
modified: bugfix oxbasket active check

---

## 4.0.0.0 - 2013-04-08
added: auto installation via Module-Connector
added: pre installation script precheck.php
added: new documenation
modified: module was rebuilded for 4.7.x (tested in 4.7.4)

---

## 3.2.0.2 - 2012-10-24
modified: critical bugfix in update.sql from 3.1.x.x to 3.2.x.x

---

## 3.2.0.1 - 2012-10-05
modified: bugfix in azure popup - no popup shown on article with oqm options
modified: bugfix block widget_product_listitem_grid_tobasket was corrected

---

## 3.2.0.0 - 2012-09-26
added: handler to manage the amount: outsource code from views into model
added: new more detailed logging
added: 2 new images for warning and error (basic + azure)
added: 4.6.x ready: included metadata.php and picture.png
added: template files for 4.6.x
modified: fields d3_ve_value, d3_ve_value1, d3_ve_value2 and also d3_ve_type,
          d3_ve_value1, d3_ve_value2 were changed into:
          D3OQM_MINIMUM, D3OQM_MAXIMUM and D3OQM_PACKAGE
modified: rebuild the appearance in frontend
modified: extending article inheritance handling
modified: Bug: if 2 articles in basket, the last one carries the error messages

---

## 3.1.3 - 2012-09-10
modified: bugfix variable in logging
modified: sql queries

---

## 3.1.2 - 2012-01-23
modified: bugfix missing [
modified: bugfix oxactive in admin template
modified: bugfix added is-modul-active-check
modified: bugfix added fieldnames correctly
modified: layout (padding in popups)
added: new image to azure

---

## 3.1.1 - 2011-12-14
added: update.sql for EE
modified: don't use bld3active -> use now oxactive from d3_cfg_mod table

---

## 3.1.0 - 2011-10-07 - version after 4.5.0 (4.5.0 not included!)
modified: bugfix in rightlist.tpl no minamount generated
modified: optimized error handling
added: azure-templates (blocks)
modified: structure changed_full/PE451-/out/basic/tpl/
added EE-Pack

---

## 3.0.4 - 2012-02-23
modified: bugfix oxactive in admin template
modified: bugfix added is-modul-active-check
modified: bugfix added fieldnames correctly

---

## 3.0.3 - 2011-10-07
modified: bugfix in rightlist.tpl no minamount generated
modified: optimized error handling

---

## 3.0.2 - 2011-09-01
modified: fixed bug dicount article was checked in basket
added: title in admin template
added: inc/product.tpl

---

## 3.0 - 3.0.1 - not released
modul refactoring
modified: table values of colums (d3_ve...)
modified: typehandling (d3_ve_type...)
modified: /changed_full/ - structure changed
modified: bugfix backend JavaScript
modified: d3GetFieldData -> query optimization
modified: rename of modules classes
added: oxid profiling
added: d3 logging
added: admin logging controls
refactored: smarty insert.d3_basket_oqm_error.php
deleted: /changed_full/PE420 (incompatible with autoloader)

---

## 2.1.1 - 2011-01-20
added minimodulentry (modul-connector)

---

## 2.1 - 2011-01-19
added maximum orderable amount
added 4.4.5 Templates
added modul-connector integration
