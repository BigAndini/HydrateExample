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

class InvoiceContactFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    { 
        parent::__construct('contact');

        $this->setHydrator(new DoctrineHydrator($objectManager))
             ->setObject(new Entity\Contact());
        
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
 
        $this->add(array( 
            'name' => 'gender', 
            'type' => 'Zend\Form\Element\Radio', 
            'attributes' => array( 
                'required' => 'required', 
                'value' => '1', 
            ), 
            'options' => array( 
                'value_options' => array(
                    '1' => 'männlich', 
                    '0' => 'weiblich', 
                ),
            ), 
        ));
 
        $this->add(array( 
            'name' => 'title', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Titel...', 
                #'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Titel', 
                'label_attributes' => array(
                    'class' => 'form-element',
                ),
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'prename', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Vorname...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Vorname', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'surname', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Nachname...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Nachname', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'email', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'E-Mail Adresse...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'E-Mail Adresse', 
            ), 
        )); 
        
        /*$addressFieldset = new AddressFieldset($objectManager);
        $addressFieldset->setName('address');
        $addressFieldset->setOptions(array(
            #'label' => 'Adresse',
            'allow_add' => false,
        ));
        $this->add($addressFieldset);*/
        
        $this->add(array( 
            'name' => 'comment', 
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array( 
                'placeholder' => 'Kommentar...', 
                #'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Kommentar', 
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
            'gender' => array(
                'required' => true,
            ),
            'title' => array(
                'required' => false,
            ),
            'prename' => array(
                'required' => true,
            ),
            'surname' => array(
                'required' => true,
            ),
            'email' => array(
                'required' => true,
            ),
            'comment' => array(
                'required' => false,
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