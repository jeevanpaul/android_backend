<?php      
defined('YII_DEBUG') or define('YII_DEBUG',true);
class DbConfiguration {
    public static function fetchConfigArray() {
       return array(
          'class'=>'system.db.CDbConnection',
          'connectionString' => 'mysql:host=localhost;dbname=hitwicket_new;',
          'emulatePrepare' => true,      
          'schemaCachingDuration' => 7200,
          'queryCacheID' => "cache_memcache",
          'username' => 'root',          
          'password' => 'root',          
          'charset' => 'utf8',
            'enableProfiling'=>true,
            'enableParamLogging' => true,
          'tablePrefix' => ''          
        );
    }          

    public static function fetchTrainingConfigArray() {
       return array(
          'class'=>'system.db.CDbConnection',
          'connectionString' => 'mysql:host=localhost;dbname=hitwicket_training;',
          'emulatePrepare' => true,   
          'schemaCachingDuration' => 7200,
          'queryCacheID' => "cache_memcache",
          'username' => 'root',     
          'password' => 'root',     
          'charset' => 'utf8',
            'enableProfiling'=>true,
            'enableParamLogging' => true,
          'tablePrefix' => ''     
        );
    }     
}
?>