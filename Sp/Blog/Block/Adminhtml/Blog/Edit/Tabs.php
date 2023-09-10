<?php
namespace Sp\Blog\Block\Adminhtml\Blog\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
		
        parent::_construct();
        $this->setId('checkmodule_blog_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Blog'));
    }
}