<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Bestellmengenmanager @version 5.0.5.0 SourceGuardian (30.05.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
