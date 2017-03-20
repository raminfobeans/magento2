<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Infobeans\Label\Block;

use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Request\Http;
//use Magento\Framework\App\Config\ScopeConfigInterface;
use Infobeans\Label\Helper\Data;


class ProductLabel extends Template {

   // protected $scopeConfig;
    protected $_product;
    protected $registry;
    protected $localeDate;
    protected $labelHelper;
    public $_request;

    public function __construct(Template\Context $context, Registry $registry, array $data, TimezoneInterface $localeDate,Http $request,Data $labelHelper) {
        $this->registry = $registry;
        $this->localeDate = $localeDate;
        $this->_request = $request;
        $this->labelHelper=$labelHelper;
        parent::__construct($context, $data);
    }

    public function getProduct() {
        if (is_null($this->_product)) {
            $this->_product = $this->registry->registry('product');

            if (!$this->_product->getId()) {
                throw new LocalizedException(__('Failed to initialize product'));
            }
        }

        return $this->_product;
    }

    public function setProduct($product) {
        $this->_product = $product;

        return $this;
    }

    public function isSale() {

        $product = $this->getProduct();

        if ($product->getPrice() > $product->getFinalPrice()) {
            return true;
        }

        return false;
    }

    public function isNew() {
        $product = $this->getProduct();
        $newsFromDate = $product->getNewsFromDate();
        $newsToDate = $product->getNewsToDate();
        if (!$newsFromDate && !$newsToDate) {
            return false;
        }

        return $this->localeDate->isScopeDateInInterval(
                        $product->getStore(), $newsFromDate, $newsToDate
        );
    }

    public function isFeatured() {
        $product = $this->getProduct();

        if ($product->getFeaturedProduct()) {

            return true;
        }

        return false;
    }

    public function getSaleText() {


        if ($this->isSale()) {


            $product = $this->getProduct();
            $percentageValue = round((abs($product->getPrice() - $product->getFinalPrice()) / $product->getPrice()) * 100);


            $text = $percentageValue . "%" . " off";
        }
        
        return $text;
    }
    
 
    public function isSaleEnabled() {
        if ($this->labelHelper->isSaleEnabled()== 1)
            return true;
        else
            return false;
    }

    public function isNewEnabled() {
        if ($this->labelHelper->isNewEnabled() == 1)
            return true;
        else
            return false;
    }

    public function isFeaturedEnabled() {
        if ($this->labelHelper->isFeaturedEnabled() == 1)
            return true;
        else
            return false;
    }

    public function getSalesText() {
        return $this->labelHelper->getSaleText();
    }

    public function getNewText() {
        return $this->labelHelper->getNewText();
    }

    public function getFeaturedText() {
        return $this->labelHelper->getFeaturedText();
    }

    public function getSaleColor() {
        return $this->labelHelper->getSaleColor();
    }

    public function getNewColor() {
        return $this->labelHelper->getNewColor();
    }

    public function getFeaturedColor() {
        return $this->labelHelper->getFeaturedColor();
    }

}
