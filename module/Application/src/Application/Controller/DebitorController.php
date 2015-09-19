<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity;
use Application\Form;

class DebitorController extends AbstractActionController
{
    public function indexAction() {
        return new ViewModel();
    }
    
    public function addAction() {
        $logger = $this->getServiceLocator()->get('Logger');
        
        $em = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        
        $form = new Form\CreateDebitorForm($em);
        
        $debitor = new Entity\Debitor();
        $debitor->setBusiness(true);
        $debitor->setDefaultRate(90);
        $debitor->setPaymentTarget(14);
        $debitor->setTurnus(1);
        $form->bind($debitor);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $logger->info(var_export($this->request->getPost(), true));
                
                $em->persist($debitor);
                error_log('got '.count($debitor->getContacts()).' contacts');
                foreach($debitor->getContacts() as $contact) {
                    error_log($contact->getPrename().' '.$contact->getSurname());
                    
                    $address = $contact->getAddress();
                    error_log($address->getStreet().' '.$address->getHousenumber());
                    $em->persist($address);
                    
                    $em->persist($contact);
                }
                $em->flush();
                
                return $this->redirect()->toRoute('debitor');
            } else {
                $logger->warn($form->getMessages());
            }
        }

        return new ViewModel(array(
            'form' => $form,
        ));
    }
    
    public function editAction() {
        return new ViewModel();
    }
    
    public function deactivateAction() {
        return new ViewModel();
    }
    
    public function activateAction() {
        return new ViewModel();
    }
    
    public function deleteAction() {
        return new ViewModel();
    }
}
