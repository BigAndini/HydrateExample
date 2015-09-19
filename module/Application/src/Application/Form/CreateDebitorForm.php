<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Doctrine\Common\Persistence\ObjectManager;
#use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class CreateDebitorForm extends Form
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('create-debitor');

        $this->setHydrator(new DoctrineHydrator($objectManager, true));

        $debitorFieldset = new DebitorFieldset($objectManager);
        $debitorFieldset->setUseAsBaseFieldset(true);
        $this->add($debitorFieldset);

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Send',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}