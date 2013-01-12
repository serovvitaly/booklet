<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Connect extends Controller {

    public function action_index()
    {        
        $this->response->body('Access denied');
    }
    
    public function action_ozon()
    {
        $xml_uri = 'http://static.ozone.ru/multimedia/yml/facet/perfum.xml';
        
        $cache_dir = APPPATH . '/cache/connect/ozon/';
        
        $period_reboot = 3600;
        
        $use_cached_file = false;
        
        if (file_exists($cache_dir)) {
            $cached_files = scandir($cache_dir);
            
            $last_cache_file = isset($cached_files[2]) ? $cached_files[2] : NULL;
            
            if ($last_cache_file) {                
                $last_cache_file_mix = explode('_', current( explode('.', $last_cache_file) ));
                $last_cache_file_time = isset($last_cache_file_mix[2]) ? $last_cache_file_mix[2] : NULL;
                
                if ($last_cache_file_time AND time() - $last_cache_file_time < $period_reboot) {
                    $use_cached_file = $last_cache_file;
                }
            }
            
        }
        
        if (!$use_cached_file) {
            $use_cached_file = 'ozon_perfum_' . time() . '.xml';
            if ( !file_put_contents( $cache_dir . $use_cached_file, file_get_contents($xml_uri) ) ) {
                $use_cached_file = false;
            }
        }
        
        if (!$use_cached_file) {
            return;
        }
        
        $xml = simplexml_load_file($cache_dir . $use_cached_file);
        
        echo $xml->shop->name;
    }

} // End
