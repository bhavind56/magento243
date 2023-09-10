<?php
namespace Sp\Blog\Setup\Patch\Data;

/*
* 2 Load two CMS blocks on the checkout page 
*/
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Cms\Model\BlockFactory;
class AddCustomTwoCmsBlock implements DataPatchInterface
{
    /**
     * @param BlockFactory $blockFactory
     */
    public function __construct(
        BlockFactory $blockFactory
    ) {
        $this->blockFactory = $blockFactory;
    }
    /**
     * @inheritdoc
     */
    public function apply()
    {
        $saveBlock = $this->blockFactory->create();
        $cmsBlockSidebarData = [
            'title' => 'Extensional Checkout Sidebar',
            'identifier' => 'ext_checkout_sidebar',
            'content' => "<h1>Extensional Checkout Sidebar cms block content</h1>",
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
        $saveBlock->setData($cmsBlockSidebarData)->save();
        $cmsBlockShippingData = [
            'title' => 'Extensional Checkout After the shipping methods step',
            'identifier' => 'ext_checkout_shipping',
            'content' => "<h1>Extensional Checkout After the shipping methods step cms block content</h1>",
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
        $saveBlock->setData($cmsBlockShippingData)->save();
    }
    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }
    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}