<?php
namespace Sp\Blog\Block\Adminhtml;
class Blog extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
    	
        $this->_controller = 'adminhtml_blog';
        $this->_blockGroup = 'Sp_Blog';
        $this->_headerText = __('Blog');
        $this->buttonList->remove('add');
        parent::_construct();
    }
}
