<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'formelementerrors' => 'Application\Form\View\Helper\FormElementErrors',
                #'formrow'           => 'Application\Form\View\Helper\FormRow',
            ),
            'factories' => array(
                'config' => function($serviceManager) {
                    $helper = new \PreReg\View\Helper\Config($serviceManager);
                    return $helper;
                },
            ),
        );
    }
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'doctrine.entitymanager'  => new \DoctrineORMModule\Service\EntityManagerFactory('orm_default'),
                /* 
                 * Form Factories
                 */
                'Admin\Form\Product' => function($sm){
                    $form   = new Form\Product();
                    
                    $em = $sm->get('doctrine.entitymanager');
                    $taxes = $em->getRepository("ersEntity\Entity\Tax")->findAll();
                    
                    $options = array();
                    foreach($taxes as $tax) {
                        $options[$tax->getId()] = $tax->getName().' - '.$tax->getPercentage().'%';
                    }

                    $form->get('taxId')->setValueOptions($options);
                    
                    return $form;
                },
                'Application\Form\AddressFieldset' => function($sm) {
                    $em = $this->getServiceLocator()
                        ->get('Doctrine\ORM\EntityManager');
                    $fieldset = new Form\AddressFieldset($em);
                    return $fieldset;
                },
                'Application\Form\ContactFieldset' => function($sm) {
                    $em = $this->getServiceLocator()
                        ->get('Doctrine\ORM\EntityManager');
                    $fieldset = new Form\ContactFieldset($em);
                    return $fieldset;
                }
            )
        );
    }
}
