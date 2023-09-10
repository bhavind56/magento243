<?php
/* 3. Category page: Add sort by New products.*/
namespace Sp\Blog\Plugin\Model;
use Magento\Store\Model\StoreManagerInterface;

class Config
{
    protected $_storeManager;

    public function __construct(
        StoreManagerInterface $storeManager
    )
    {
        $this->_storeManager = $storeManager;
    }

    public function afterGetAttributeUsedForSortByArray(\Magento\Catalog\Model\Config $catalogConfig, $options)
    {
        $customOption['new_product'] = __('New products');
        $options = array_merge($customOption, $options);
        return $options;
    }
}