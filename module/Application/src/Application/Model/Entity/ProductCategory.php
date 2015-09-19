<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model\Entity;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Application\Model;

class ProductCategory extends ServiceLocatorAwareEntity {
    protected $order;
    protected $name;
    protected $visible;
    
    protected $inputFilter;


    public function __construct(array $options = null) {
        parent::__construct($options);
    }
    
    public function exchangeArray($data)
    {
        $this->order  = (!empty($data['order'])) ? $data['order'] : null;
        $this->name  = (!empty($data['name'])) ? $data['name'] : null;
        $this->visible = (!empty($data['visible'])) ? $data['visible'] : null;
        parent::exchangeArray($data);
    }
    
    public function getProducts($order = 'order ASC') {
        $product = $this->sm->get('Application\Model\ProductTable');

        
        $products = $product->getByField('category_id', $this->id);
        
        return $products;
    }
    
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}