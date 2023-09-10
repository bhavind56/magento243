<?php

namespace Sp\Blog\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;

class CheckoutConfigProvider implements ConfigProviderInterface {

    /**
     *
     * @var LayoutInterface
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
