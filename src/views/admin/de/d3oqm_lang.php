<?php

$sLangName = "Deutsch";
if (class_exists(D3\ModCfg\Application\Model\d3utils::class)) {
    $sLogo = \D3\ModCfg\Application\Model\d3utils::getInstance()->getD3Logo();
    $sLogo = str_replace('"', '\'', $sLogo);
} else {
    $sLogo = 'D&sup3;';
}

$aLang = array(
    'charset' => 'UTF-8',

    'd3oqm'                                 => 'Bestellmengenmanager',
    'd3smoqm_settings'                      => 'Einstellungen',
    'd3taboqm_settings'                     => 'Grundeinstellungen',
    'd3taboqm_support'                      => 'Support',
    'D3OQM_ACTIVE'                          => 'Aktiv?',
    'D3OQM_LOGLEVEL'                        => 'Logging',
    //    'HELP_D3OQM_LOGLEVEL'                       => 'Bestellgrenze',
    'D3OQM_LIMITTYPE'                       => 'Bestellgrenze',
    'D3OQM_LIMITTYPE_VE'                    => 'Verpackungseinheit',
    'D3OQM_LIMITTYPE_MIN'                   => 'Mindestmenge',
    'D3OQM_LIMITTYPE_NO'                    => 'keine Begrenzung',
    'D3OQM_LIMITTYPE_MAX'                   => 'Maximalmenge',
    'D3OQM_TITLE'                           => $sLogo . ' Bestellmengen Manager',
    'D3OQM_PLAIN_TITLE'                     => 'D3 Bestellmengen Manager',
    'D3OQM_RULES'                           => 'Allgemeine Regeln & Tipps:',
    'HELP_D3OQM_RULES'                      => '<h3>Allgemeine Regeln & Tipps</h3>'
        . 'Die eingegebenen Bestellmengen reagieren aufeinander. D.h. das Modul versucht die Bestellmengen zu verifizieren (Plausibilit&auml;tspr&uuml;fung).<br>'
        . 'Hier ein paar Regeln und Tipps, wie man die gr&ouml;bsten Fehler aus dem Weg gehen kann:'
        . '<ul>'
        . ' <li>unsinnige Mengen sollten vermieden werden <br>(bspw. minimale Menge gr&ouml;&szlig;er als maximal Menge)</li>'
        . ' <li>fehleranf&auml;llige Mengen sollten ebenfalls vermieden werden <br>'
        . '(bspw. die minimale Menge sollte mindestens die Verpackungseinheit sein oder ein vielfaches davon )</li>'
        // Beispiele auffuehren
        . '</ul>',
    'D3OQM_INHERITANCE'                     => 'Regeln zur Vererbung (Variantenartikel):',
    'HELP_D3OQM_INHERITANCE'                => '<h3>Regeln zur Vererbung (Variantenartikel)</h3>'
        . 'Die Bestellmengen werden automatisch vererbt. Folgende Logik wird hier angewandt:<br>'
        . '<ul>'
        . ' <li>'
        . '  F&uuml;r Elternartikel und allgemein gilt:'
        . '  <ul>'
        . '   <li>m&ouml;gliche Werte sind dezimale Zahlen [0-9] und Leerzeichen (bspw. Leertaste, keine Eingabe) </li>'
        . '   <li>Zahlen (Wertebereich [0-9]) werden an die Varianten vererbt</li>'
        . '   <li>bei Leerzeichen wird die Option deaktiviert, anders wie bei der Zahl 0. Die Zahl 0 wird bei Varianten'
        . ' relevant (siehe n&auml;chsten Vererbung).</li>'
        . '  </ul>'
        . ' </li>'
        . ' <li>'
        . '  F&uuml;r Variantenartikel (Vererbung) gilt:'
        . '  <ul>'
        . '   <li>Zahlen gr&ouml;&szlig;er 0 &uuml;berschreibt die vererbte Menge <br>'
        . '(Elternart. minimale Menge = 10, Variante minimale Menge = 20, bedeutet dass die Variante eine minimale Bestellmenge von 20 hat)</li>'
        . '   <li>0 deaktiviert die vererbte Menge<br>(Elternart. minimale Menge = 10, Variante minimale Menge = 0, bedeutet dass die Variante keine minimale Bestellmenge hat)</li>'
        . '   <li>Leerzeichen oder keine Eingabe stellt die Vererbung wieder her</li>'
        . '  </ul>'
        . ' </li>'
        . '</ul>',

    /*article_list*/
    'GENERAL_ARTICLE_D3OQM_MINIMUM'         => 'D3 min. Bestellmenge',
    'GENERAL_ARTICLE_D3OQM_MAXIMUM'         => 'D3 max. Bestellmenge',
    'GENERAL_ARTICLE_D3OQM_PACKAGE'         => 'D3 Verpackungseinheit',

    /*Einstellungen*/
    'D3OQM_ROUNDEDAMOUNT'                   => 'Soll bei unzureichenden Bestellmengen eine korrigierte'
        . ' Menge in den Warenkorb gelegt werden?',
    'D3OQM_MATHROUND'                       => 'Soll mathematisch gerundet werden? (Inaktiv: es wird immer aufgerundet)',
    'D3OQM_INFO'                            => 'Wenn bei unzureichenden Bestellmengen die aufgerundete Anzahl in den Warenkorb gelegt'
        . ' werden soll,<br> dann k&ouml;nnen Sie dies hier bestimmen. <br>'
        . '<sup>(Bei &Auml;nderungen m&uuml;ssen ggf. die Cookies geleert werden.)</sup><br><br>',
    'D3OQM_USEREMAININGSTOCK'               => 'Soll die Restmenge genutzt werden?',
    'HELP_D3OQM_USEREMAININGSTOCK'          => 'Aktiv: Sobald der Lagerstand des Artikels unter der Verpackungseinheit oder der Mindestmenge liegt, werden alle 3 Optionen im Frontend auf den Lagerbestand angepasst.<br><br>'
        . 'Bspw: Der Artikel hat einen Lagerbestand von 7,<br> eine bestellbare Mindestmenge von 10,<br> eine bestellbare Maximalmenge von 50 <br> und eine Verpackungseinheit von 5.<br>'
        . 'Im Frontend wird der Artikel mit den folgenden Werten angeboten. (alle Werte wurden auf den restlichen Lagerbestand gesetzt): '
        . '<ul><li>Mindestmenge: 7</li>'
        . '<li>Maximalmenge: 7</li>'
        . '<li>Verpackungseinheit: 7</li></ul>'
        . '<br>Diese Option ist abhängig von der aktiven Shopeinstellung "Lagerverwaltung aktiv" sowie am Artikel hinterlegten "Lieferstatus" und "Lagerbestand.',
    'D3OQM_SHOWBASKETINFO'          => 'Sollen die Bestellmengen im Warenkorb angezeigt werden?',
    'HELP_D3OQM_SHOWBASKETINFO'     => 'Aktiv: die Bestellmengen eines konfigurierten Artikels werden im Bestellschritt 1 Warenkorbübersicht angezeigt.',
    // Installation
    'D3OQM_INSTALLATION_OLDSMARTYFILEFOUND' => 'Es wurde eine alte Smarty Datei gefunden. Bitte löschen Sie folgende Datei:',
);
