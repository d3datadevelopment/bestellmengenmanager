<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Bestellmengenmanager @version 5.0.5.0 SourceGuardian (30.05.2023) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2023, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
