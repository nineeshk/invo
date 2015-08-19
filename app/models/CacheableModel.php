<?php

use Phalcon\Mvc\Model;

/**
 * CacheableModel
 */
class CacheableModel extends Model
{
	protected static function _createKey($parameters)
	{
		$uniqueKey = array();
        	
		foreach ($parameters as $key => $value) {
            		if (is_scalar($value)) {
                		$uniqueKey[] = $key . ':' . $value;
            		} else {
                		if (is_array($value)) {
                    			$uniqueKey[] = $key . ':[' . self::_createKey($value) .']';
                		}
            		}
        	}
	        return preg_replace('/[\x00-\x1F\x80-\xFF\s]/', '', join(',', $uniqueKey));
	}

	protected static function _getCache($key)
	{
                $modelsCache = \Phalcon\Di::getDefault()->getShared('modelsCache')->get($key);
                return $modelsCache;  
        }	       
        
        protected static function _setCache($key, $value, $cacheSeconds = null)
        {
                $modelsCache = \Phalcon\Di::getDefault()->getShared('modelsCache');
                $modelsCache->save($key, $value, $cacheSeconds);                
        }
        
        protected static function _cacheKeys()
        {
                return \Phalcon\Di::getDefault()->getShared('modelsCache')->queryKeys();        
        }

	public static function findCached($parameters = null, $cacheSeconds = null)
	{
		$key = self::_createKey($parameters);
		$result = self::_getCache($key);

                echo "Test";		
#		echo "Result:" . $result;

		if ($result === null) {
		echo "here";
		        $result = parent::find($parameters);
		        self::_setCache($key, $result, $cacheSeconds);
		}
		return $result;
	}
}