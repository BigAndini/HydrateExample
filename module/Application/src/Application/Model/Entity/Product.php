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

class Product extends ServiceLocatorAwareEntity {
    protected $order;
    protected $name;
    protected $short_desc;
    protected $long_desc;
    protected $visible;
    
    protected $inputFilter;


    public function __construct(array $options = null) {
        parent::__construct($options);
    }
    
    public function exchangeArray($data)
    {
        $this->order  = (!empty($data['order'])) ? $data['order'] : null;
        $this->name  = (!empty($data['name'])) ? $data['name'] : null;
        $this->short_desc = (!empty($data['short_desc'])) ? $data['short_desc'] : null;
        $this->long_desc = (!empty($data['long_desc'])) ? $data['long_desc'] : null;
        $this->visible = (!empty($data['visible'])) ? $data['visible'] : null;
        parent::exchangeArray($data);
    }
    
    public function getProductVariants($order = '') {
        #$productvariant = new Model\ProductVariantTable();
        $productvariant = $this->sm->get('Application\Model\ProductVariantTable');

        
        $productvariants = $productvariant->getByField('Product_id', $this->id);
        foreach($productvariants as $p) {
            error_log($p->name);
        }
        
        return $productvariants;
        
        if($order == '') {
            $order = 'created ASC';
        }
     
        
        
        $this->getServiceLocator()->get('Form\ProductVariantForm');
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $table = new Model\ProductPriceTable($dbAdapter);
        return $table;
        
        $table = 'ProductVariant';
        $entityClass = '\Application\Model\Entity\ProductVariant';
        
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from($table);
        
        $select->order($order);

        #$where = new  Where();
        #$where->equalTo('album_id', $id) ;
        #$select->where($where);

        //you can check your query by echo-ing :
        // echo $select->getSqlString();
        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();
        
        $entities = array();
        foreach ($resultSet as $row) {
            $entity = new $this->entityClass();
            foreach($row as $key => $val) {
                $entity->$key = $val;
            }
            $entities[] = $entity;
        }
        return $entities;
    }
    
    public function getProductPrices($order = '') {
        $ProductPrice = $this->sm->get('Application\Model\ProductPriceTable');
        
        $ProductPrices = $ProductPrice->getByField('Product_id', $this->id);
        
        return $ProductPrices;
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

            $inputFilter->add($factory->createInput(array(
                'name'     => 'shortDescription',
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
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'longDescription',
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
            
            $inputFilter->add($factory->createInput(array(
                'name'     => 'Tax_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'Digits',
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}