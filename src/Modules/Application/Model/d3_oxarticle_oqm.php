<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Bestellmengenmanager @version 5.0.5.0 SourceGuardian (30.05.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
