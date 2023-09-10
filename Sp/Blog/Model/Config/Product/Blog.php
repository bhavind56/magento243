<?php
namespace Sp\Blog\Model\Config\Product;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Sp\Blog\Model\BlogFactory;

/**
 * sp_blog setup option label title and value as id for product section
 */
class Blog extends AbstractSource
{

    protected $optionFactory;
    protected $blogFactory;

    public function __construct(
        BlogFactory $blogFactory
    ) {
        $this->blogFactory = $blogFactory;
    }

    public function getAllOptions()
    {
        $blogs = $this->blogFactory->create()->getCollection();
        $blogs->addFieldToFilter('is_active','1');
        $this->_options = [];
        foreach($blogs as $blog){
            $this->_options[] = ['label' => $blog->getTitle(), 'value' => $blog->getId()];
        }
        return $this->_options;
    }
}