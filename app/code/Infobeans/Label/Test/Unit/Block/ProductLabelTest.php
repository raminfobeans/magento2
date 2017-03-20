<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductLabel
 *
 * @author ram
 */
namespace Infobeans\Label\Test\Unit\Block;
class ProductLabelTest extends \PHPUnit_Framework_TestCase {
    protected $block;
    protected function setUp(){
        
       // $objectManager=new \Magento\Framework\Unit\Helper\ObjectManager($this);
        //$this->block=$objectManager->getObject('Infobeans\Label\Block\ProductLabel');
        $this->block = $this->getMockBuilder('Infobeans\Label\Block\ProductLabel')
            ->disableOriginalConstructor()
            ->getMock();
    }
    protected function tearDown(){
        $this->block=null;
        
    }
    
    public function testisSale(){
       $this->block->expects($this->once())
            ->method('getNewText')
            ->will('NEW');
       
    }
        
}


