<?php
namespace  Sp\Blog\Block;

use Magento\Framework\View\Element\Template;
class Blog extends Template
{
    protected $registry;
    protected $blogFactory;

    public function __construct(
        Template\Context $context,      
        \Magento\Framework\Registry $registry,
        \Sp\Blog\Model\BlogFactory $blogFactory,
        array $data = []
    ) {
        $this->_registry = $registry;    
        $this->_blogFactory = $blogFactory;
        parent::__construct($context, $data);
        
    }

    /*
    *   Return blogs for current product
    */
    public function getBlogs(){
        $blogs = $this->getBlogCollection();
        $currentProduct = $this->getCurrentProduct();
        $blogs->addFieldToFilter('is_active','1');
        $blogs->addFieldToFilter(
            'id',
            ['in' => $currentProduct->getBlog()]
        );
        return $blogs; 
    }

    /*
    *   Return all blogs
    */
    public function getBlogCollection(){
        return $this->_blogFactory->create()->getCollection();
    }

    /*
    *   Return current product
    */
    public function getCurrentProduct()
    {        
        return $this->_registry->registry('current_product');
    }    
}