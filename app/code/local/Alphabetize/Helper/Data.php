<?php

class Ip_Alphabetize_Helper_Data extends Mage_Core_Helper_Abstract
{

	public function canSort(){
	
		return Mage::getStoreConfig('ip_section/ip_category/ip_alphabetize');
	
	}
}

?>