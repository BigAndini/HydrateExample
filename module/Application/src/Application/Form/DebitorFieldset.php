<?php   

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Application\Entity\Debitor;
use Doctrine\Common\Persistence\ObjectManager;
#use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Stdlib\Hydrator\Strategy;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class DebitorFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {        
        parent::__construct('debitor'); 

        $hydrator = new DoctrineHydrator($objectManager);
        $hydrator->addStrategy('contacts', new Strategy\DisallowRemoveByReference());
        $this->setHydrator($hydrator)
             ->setObject(new Debitor());
       
        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'id',
        ));
 
        $this->add(array(
            'name' => 'business', 
            'type' => 'Zend\Form\Element\Radio', 
            'attributes' => array( 
                'required' => 'required',
            ), 
            'options' => array( 
                'value_options' => array(
                    '1' => 'Geschäftskunde', 
                    '0' => 'Privatkunde', 
                ),
            ), 
        ));
 
        $this->add(array( 
            'name' => 'name', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Firmenname...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Firmenname', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'handle', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Kundenhandle...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Kundenhandle', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'default_rate', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Stundensatz...', 
                'required' => 'required',
            ), 
            'options' => array( 
                'label' => 'Stundensatz', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'payment_target', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Zahlungsziel...', 
                'required' => 'required',
            ), 
            'options' => array( 
                'label' => 'Zahlungsziel in Tagen',
            ), 
        ));
        
        $this->add(array( 
            'name' => 'turnus', 
            'type' => 'Zend\Form\Element\Select', 
            'attributes' => array( 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Turnus', 
                'value_options' => array(
                    '1' => 'monatlich', 
                    '3' => 'viertel jährlich', 
                    '6' => 'halbjährlich', 
                    '12' => 'jährlich', 
                ),
            ), 
        ));
        
        $contactFieldset = new InvoiceContactFieldset($objectManager);
        $this->add(array(
            'type'    => 'Zend\Form\Element\Collection',
            'name'    => 'contacts',
            'options' => array(
                'count'           => 1,
                'target_element' => $contactFieldset,
                'label' => 'Rechnungsempfänger',
            )
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
                'validators' => array(
                ),
            ),
            'business' => array(
                'required' => true,
                'validators' => array(
                ),
            ),
            'name' => array(
                'required' => true,
                'validators' => array(
                ),
            ),
            'handle' => array(
                'required' => true,
                'validators' => array(
                ),
            ),
            
            'default_rate' => array(
                'required' => true,
                'validators' => array(
                ),
            ),
            'payment_target' => array(
                'required' => true,
                'validators' => array(
                ),
            ),
            'turnus' => array(
                'required' => true,
                'validators' => array(
                ),
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