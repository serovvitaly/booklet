<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-01-12 16:13:42 --- CRITICAL: ErrorException [ 2 ]: include() [function.include]: http:// wrapper is disabled in the server configuration by allow_url_include=0 ~ SYSPATH\classes\Kohana\Core.php [ 829 ] in D:\OPENSERVER\html\booklet\system\classes\Kohana\Core.php:829
2013-01-12 16:13:42 --- DEBUG: #0 D:\OPENSERVER\html\booklet\system\classes\Kohana\Core.php(829): Kohana_Core::error_handler(2, 'include() [<a h...', 'D:\OPENSERVER\h...', 829, Array)
#1 D:\OPENSERVER\html\booklet\system\classes\Kohana\Core.php(829): Kohana_Core::load()
#2 D:\OPENSERVER\html\booklet\application\classes\Controller\Connect.php(14): Kohana_Core::load('http://static.o...')
#3 D:\OPENSERVER\html\booklet\system\classes\Kohana\Controller.php(84): Controller_Connect->action_ozon()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Connect))
#6 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 D:\OPENSERVER\html\booklet\booklet.atwebpages.com\index.php(118): Kohana_Request->execute()
#9 {main} in D:\OPENSERVER\html\booklet\system\classes\Kohana\Core.php:829
2013-01-12 16:28:49 --- CRITICAL: ErrorException [ 2 ]: curl_setopt_array() [function.curl-setopt-array]: Array keys must be CURLOPT constants or equivalent integer values ~ MODPATH\curl\classes\Kohana\Curl.php [ 53 ] in :
2013-01-12 16:28:49 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'curl_setopt_arr...', 'D:\OPENSERVER\h...', 53, Array)
#1 D:\OPENSERVER\html\booklet\modules\curl\classes\Kohana\Curl.php(53): curl_setopt_array(Resource id #52, Array)
#2 D:\OPENSERVER\html\booklet\application\classes\Controller\Connect.php(38): Kohana_Curl::get('http://static.o...')
#3 D:\OPENSERVER\html\booklet\system\classes\Kohana\Controller.php(84): Controller_Connect->action_ozon()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Connect))
#6 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 D:\OPENSERVER\html\booklet\booklet.atwebpages.com\index.php(118): Kohana_Request->execute()
#9 {main} in :
2013-01-12 16:29:05 --- CRITICAL: ErrorException [ 2 ]: curl_setopt_array() [function.curl-setopt-array]: Array keys must be CURLOPT constants or equivalent integer values ~ MODPATH\curl\classes\Kohana\Curl.php [ 52 ] in :
2013-01-12 16:29:05 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'curl_setopt_arr...', 'D:\OPENSERVER\h...', 52, Array)
#1 D:\OPENSERVER\html\booklet\modules\curl\classes\Kohana\Curl.php(52): curl_setopt_array(Resource id #52, Array)
#2 D:\OPENSERVER\html\booklet\application\classes\Controller\Connect.php(38): Kohana_Curl::get('http://static.o...')
#3 D:\OPENSERVER\html\booklet\system\classes\Kohana\Controller.php(84): Controller_Connect->action_ozon()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Connect))
#6 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 D:\OPENSERVER\html\booklet\booklet.atwebpages.com\index.php(118): Kohana_Request->execute()
#9 {main} in :
2013-01-12 16:29:11 --- CRITICAL: ErrorException [ 2 ]: curl_setopt_array() [function.curl-setopt-array]: Array keys must be CURLOPT constants or equivalent integer values ~ MODPATH\curl\classes\Kohana\Curl.php [ 52 ] in :
2013-01-12 16:29:11 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'curl_setopt_arr...', 'D:\OPENSERVER\h...', 52, Array)
#1 D:\OPENSERVER\html\booklet\modules\curl\classes\Kohana\Curl.php(52): curl_setopt_array(Resource id #52, Array)
#2 D:\OPENSERVER\html\booklet\application\classes\Controller\Connect.php(38): Kohana_Curl::get('http://static.o...')
#3 D:\OPENSERVER\html\booklet\system\classes\Kohana\Controller.php(84): Controller_Connect->action_ozon()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Connect))
#6 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 D:\OPENSERVER\html\booklet\booklet.atwebpages.com\index.php(118): Kohana_Request->execute()
#9 {main} in :
2013-01-12 16:29:11 --- CRITICAL: ErrorException [ 2 ]: curl_setopt_array() [function.curl-setopt-array]: Array keys must be CURLOPT constants or equivalent integer values ~ MODPATH\curl\classes\Kohana\Curl.php [ 52 ] in :
2013-01-12 16:29:11 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'curl_setopt_arr...', 'D:\OPENSERVER\h...', 52, Array)
#1 D:\OPENSERVER\html\booklet\modules\curl\classes\Kohana\Curl.php(52): curl_setopt_array(Resource id #52, Array)
#2 D:\OPENSERVER\html\booklet\application\classes\Controller\Connect.php(38): Kohana_Curl::get('http://static.o...')
#3 D:\OPENSERVER\html\booklet\system\classes\Kohana\Controller.php(84): Controller_Connect->action_ozon()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Connect))
#6 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 D:\OPENSERVER\html\booklet\booklet.atwebpages.com\index.php(118): Kohana_Request->execute()
#9 {main} in :
2013-01-12 16:33:29 --- CRITICAL: ErrorException [ 2 ]: simplexml_load_file() [function.simplexml-load-file]: file:///D:/OPENSERVER/html/booklet/application//cache/connect/ozon/ozon_perfum_1358030004.xml:1: parser error : Start tag expected, '&lt;' not found ~ APPPATH\classes\Controller\Connect.php [ 47 ] in :
2013-01-12 16:33:29 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'simplexml_load_...', 'D:\OPENSERVER\h...', 47, Array)
#1 D:\OPENSERVER\html\booklet\application\classes\Controller\Connect.php(47): simplexml_load_file('D:\OPENSERVER\h...')
#2 D:\OPENSERVER\html\booklet\system\classes\Kohana\Controller.php(84): Controller_Connect->action_ozon()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Connect))
#5 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\OPENSERVER\html\booklet\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\OPENSERVER\html\booklet\booklet.atwebpages.com\index.php(118): Kohana_Request->execute()
#8 {main} in :
2013-01-12 17:15:31 --- CRITICAL: ErrorException [ 1 ]: Class 'ORM' not found ~ APPPATH\classes\Controller\Connect.php [ 52 ] in :
2013-01-12 17:15:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :