<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Bestellmengenmanager @version 5.0.5.0 SourceGuardian (30.05.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
