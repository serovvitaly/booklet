<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * User authorization library. Handles user login and logout, as well as secure
 * password hashing.
 *
 * @package    Kohana/Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
abstract class Kohana_Curl {

	// Curl instances
	protected static $_instance;
    
    protected $_curl = NULL;

	/**
	 * Singleton pattern
	 *
	 * @return Curl
	 */
	public static function instance()
	{
		if ( ! isset(Curl::$_instance))
		{
            $class = __CLASS__;
            
			Curl::$_instance = new $class();
		}

		return Curl::$_instance;
	}


	/**
	 * 
	 *
	 */
	public function __construct()
	{
		//
	}
    
    
    public static function get($uri)
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL    => $uri,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 0,
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        return $response;
    }



} // End Curl
