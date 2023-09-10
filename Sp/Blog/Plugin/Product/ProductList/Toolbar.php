<?php
 
namespace Sp\Blog\Plugin\Product\ProductList;
 
use Magento\Catalog\Block\Product\ProductList\Toolbar as Productdata;
 
class Toolbar
{
    public function aroundSetCollection(Productdata $subject, \Closure $proceed, $collection)
    {
        $currentOrder = $subject->getCurrentOrder();
        if ($currentOrder) {
            if ($currentOrder == "new_product") {
                $direction = $subject->getCurrentDirection();
                $collection->getSelect()->order('created_at ' . $direction);
            }
            return $proceed($collection);
        }
    }
}