<?php
/**
 *
 * @category    Webdawe
 * @package     Webdawe_Analytics
 * @author      Anil Paul
 * @copyright   Copyright (c) 2016 Webdawe
 * @license     
 */
class Webdawe_Analytics_Helper_Config extends Mage_Core_Helper_Data
{
	/**
	 * Constant paths to system configuration values.
	 */
	const XML_PATH_ANALYTICS_OTHERSCRIPTS_ENABLED  	= 'google/other_scripts/enabled';
	const XML_PATH_ANALYTICS_SCRIPTS				= 'google/other_scripts/scripts';
	
	
	/**
	 * Whether the ecommerce tracking is enabled.
	 * 
	 * @param mixed $store
	 * @return boolean
	 */
	public function isOtherScriptsEnabled($store = null)
	{
		return $this->getConfiguration(self::XML_PATH_ANALYTICS_OTHERSCRIPTS_ENABLED, $store);
	}
	
	/**
	 * Retrieve conversion tracking ID
	 * 
	 * @param mixed $store
	 * @return string
	 */
	public function getScripts($store = null)
	{
		return $this->getConfiguration(self::XML_PATH_ANALYTICS_SCRIPTS, $store);
	}
		
	/**
	 * Retrieve Configuration value
	 *  
	 * @param string $path
	 * @param int $storeId
	 */
	public function getConfiguration($path, $storeId = null)
	{
		return Mage::getStoreConfig($path, $storeId);
	}
}
?>