<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Data
 *
 * @author ram
 */

namespace Infobeans\Label\Helper;

use \Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    const SALE_ENABLE = 'label_section/sales_label/status_label';
    const NEW_ENABLE = 'label_section/new_label/status_label';
    const FEATURED_ENABLE = 'label_section/featured_label/status_label';
    const SALE_TEXT = 'label_section/sales_label/text_label';
    const NEW_TEXT = 'label_section/new_label/text_label';
    const FEATURED_TEXT = 'label_section/featured_label/text_label';
    const SALE_COLOR = 'label_section/sales_label/text_color_label';
    const NEW_COLOR = 'label_section/new_label/text_color_label';
    const FEATURED_COLOR = 'label_section/featured_label/text_color_label';

    protected $scopeConfig;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
    \Magento\Framework\App\Helper\Context $context, ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function isSaleEnabled() {
        return $this->scopeConfig->getValue(
                        self::SALE_ENABLE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function isNewEnabled() {
        return $this->scopeConfig->getValue(
                        self::NEW_ENABLE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function isFeaturedEnabled() {
        return $this->scopeConfig->getValue(
                        self::FEATURED_ENABLE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getSaleText() {
        return $this->scopeConfig->getValue(
                        self::SALE_TEXT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getNewText() {
        return $this->scopeConfig->getValue(
                        self::NEW_TEXT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getFeaturedText() {
        return $this->scopeConfig->getValue(
                        self::FEATURED_TEXT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getSaleColor() {
        return $this->scopeConfig->getValue(
                        self::SALE_COLOR, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getNewColor() {
        return $this->scopeConfig->getValue(
                        self::NEW_COLOR, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getFeaturedColor() {
        return $this->scopeConfig->getValue(
                        self::FEATURED_COLOR, \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

}
