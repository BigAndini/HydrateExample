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

class ProductController extends AbstractActionController
{
    public function indexAction() {
        $a = array();
        for($i=0; $i<10; $i++) {
            $a[] = $i;
        }
        return new ViewModel(array(
            'a' => $a,
        ));
    }
    
    public function addAction() {
        return new ViewModel();
    }
    
    public function editAction() {
        return new ViewModel();
    }
    
    public function deleteAction() {
        return new ViewModel();
    }
}
