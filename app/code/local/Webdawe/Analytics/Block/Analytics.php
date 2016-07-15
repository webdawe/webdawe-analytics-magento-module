<?php
 /**
 *
 * @category    Webdawe
 * @package     Webdawe_Analytics
 * @author      Anil Paul
 * @copyright   Copyright (c) 2016 Webawe
 * @license     
 */ 

class Webdawe_Analytics_Block_Analytics extends Mage_Checkout_Block_Onepage_Success
{
	/**
	 * Retrieve Other Scripts
	 * @return string
	 */
	public function getOtherScripts()
	{
		return $this->helper('webdawe_analytics/config')->getScripts();
	}
	
	/***
	 * Check Whether Enabled
	 * @return bool
	 */
	public function isOtherScriptsEnabled()
	{
		return $this->helper('webdawe_analytics/config')->isOtherScriptsEnabled();
	}
	
	/**
	 * Parse the Scripts with Order Data
	 * @return mixed
	 */
	public function parseScripts()
	{
		$scripts = $this->getOtherScripts();
		
		$order = Mage::getModel('sales/order')->loadByIncrementId($this->getOrderId()); 
		$totalValue = $order->getGrandTotal();
		$totalBaseValue = round($totalValue * $order->getBaseToGlobalRate(),2);
		
		$scripts = str_replace('{{TOTAL_VALUE}}', $totalValue, $scripts);
		$scripts = str_replace('{{TOTAL_BASE_VALUE}}', $totalBaseValue, $scripts);
		$scripts = str_replace('{{ORDER_ID}}',$this->getOrderId(), $scripts);
				
		return $scripts;
	}
}