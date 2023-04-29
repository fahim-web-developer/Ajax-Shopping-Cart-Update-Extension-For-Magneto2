<?php

namespace Fahim\AjaxShoppingCartUpdate\Observer;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\View\Layout;

/**
 * Class SetTemplate
 * @package Fahim\AjaxShoppingCartUpdate\Observer
 */
class SetTemplate implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfig;

    /**
     * SetTemplate constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        /** @var Layout $layout */
        $layout = $observer->getLayout();
        $changeTemplate = $this->scopeConfig->getValue(
            'AjaxShoppingCartUpdate/AjaxShoppingCartUpdateGroup/isEnableDisable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        if (intval($changeTemplate)) {
            $block = $layout->getBlock('checkout.cart.form');
            if ($block)
                $block->setTemplate('Fahim_AjaxShoppingCartUpdate::cart/form.phtml');

            $block = $layout->getChildBlock('checkout.cart.item.renderers','simple');
            if ($block)
                $block->setTemplate('Fahim_AjaxShoppingCartUpdate::cart/item/default.phtml');

            $block = $layout->getChildBlock('checkout.cart.item.renderers','bundle');
            if ($block)
                $block->setTemplate('Fahim_AjaxShoppingCartUpdate::cart/item/default.phtml');

            $block = $layout->getChildBlock('checkout.cart.item.renderers','virtual');
            if ($block)
                $block->setTemplate('Fahim_AjaxShoppingCartUpdate::cart/item/default.phtml');

            $block = $layout->getChildBlock('checkout.cart.item.renderers','default');
            if ($block)
                $block->setTemplate('Fahim_AjaxShoppingCartUpdate::cart/item/default.phtml');

            $block = $layout->getChildBlock('checkout.cart.item.renderers','configurable');
            if ($block)
                $block->setTemplate('Fahim_AjaxShoppingCartUpdate::cart/item/default.phtml');

            $block = $layout->getChildBlock('checkout.cart.item.renderers','downloadable');
            if ($block)
                $block->setTemplate('Fahim_AjaxShoppingCartUpdate::cart/item/default.phtml');

            $block = $layout->getChildBlock('checkout.cart.item.renderers','grouped');
            if ($block)
                $block->setTemplate('Fahim_AjaxShoppingCartUpdate::cart/item/default.phtml');
        }
    }
}
