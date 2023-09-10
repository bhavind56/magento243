<?php
namespace Sp\Blog\Model\ResourceModel\Blog;

/**
 * Blog Collection
 *
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Sp\Blog\Model\Blog', 'Sp\Blog\Model\ResourceModel\Blog');
    }
}
