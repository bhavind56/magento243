<?php
namespace Sp\Blog\Model\ResourceModel;

/**
 * Blog resource
 */
class Blog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('sp_blog', 'id');
    }

  
}
