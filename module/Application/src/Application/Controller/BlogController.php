<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity;
use Application\Form;

class BlogController extends AbstractActionController
{
    public function indexAction() {
        return new ViewModel();
    }
    
    public function createAction()
    {
        // Get your ObjectManager from the ServiceManager
        $objectManager = $this->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        // Create the form and inject the ObjectManager
        $form = new Form\CreateBlogPostForm($objectManager);

        // Create a new, empty entity and bind it to the form
        $blogPost = new Entity\BlogPost();
        $form->bind($blogPost);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                echo '<pre>';
                print_r($this->request->getPost());
                echo '</pre>';
                $objectManager->persist($blogPost);
                $objectManager->flush();
            }
        }

        return array('form' => $form);
    }
}