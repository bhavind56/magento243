<?php

namespace Sp\Blog\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;

class CheckoutConfigProvider implements ConfigProviderInterface {

    /**
     *
     * 2. Load two CMS blocks on the checkout page.
     *  a. Locations:
     *      i.Sidebar
     */
    private $_layout;

    public function __construct(LayoutInterface $layout) {
        $this->_layout = $layout;
    }

    public function getConfig() {
        $block = $this->_layout->createBlock(\Magento\Cms\Block\Block::class)->setBlockId('ext_checkout_sidebar');

        return [
            'ext_checkout_sidebar' => $block->toHtml()
        ];
    }
}
