<?php 

class Ip_Alphabetize_Block_Manage_Products extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Categories
{
	/**
     * Returns JSON-encoded array of category children
     *
     * @param int $categoryId
     * @return string
     */
    public function getCategoryChildrenJson($categoryId)
    {
        $category = Mage::getModel('catalog/category')->load($categoryId);
        $node = $this->getRoot($category, 1)->getTree()->getNodeById($categoryId);

        if (!$node || !$node->hasChildren()) {
            return '[]';
        }

        $children = array();
        foreach ($node->getChildren() as $child) {
            $children[$child->getName()] = $this->_getNodeJson($child);
        }
		if(Mage::helper('alphabetize')->canSort()){
			ksort($children);
		}
		$children = array_values($children);

        return Mage::helper('core')->jsonEncode($children);
    }
	
}