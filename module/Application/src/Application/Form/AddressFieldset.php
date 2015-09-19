<?php   

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Application\Entity;
use Doctrine\Common\Persistence\ObjectManager;
#use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class AddressFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    { 
        parent::__construct('address'); 
        
        $this->setHydrator(new DoctrineHydrator($objectManager))
             ->setObject(new Entity\Address());
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
 
        $this->add(array( 
            'name' => 'street', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Straße...', 
                'required' => 'required',
            ), 
            'options' => array( 
                'label' => 'Straße', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'housenumber', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Hausnummer...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Hausnummer', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'zipcode', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Postleitzahl...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Postleitzahl', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'city', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Stadt...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Stadt', 
            ), 
        ));
    }
    
    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'id' => array(
                'required' => false,
            ),
            'street' => array(
                'required' => true,
            ),
            'housenumber' => array(
                'required' => true,
            ),
            'zipcode' => array(
                'required' => true,
            ),
            'city' => array(
                'required' => true,
            ),
            /*'price' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Float',
                    ),
                ),
            ),*/
        );
    }
}