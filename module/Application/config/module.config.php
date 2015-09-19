<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index'     => 'Application\Controller\IndexController',
            'Application\Controller\Debitor'   => 'Application\Controller\DebitorController',
            'Application\Controller\Product'   => 'Application\Controller\ProductController',
            'Application\Controller\Statistic' => 'Application\Controller\StatisticController',
            'Application\Controller\Blog' => 'Application\Controller\BlogController',
        ),
    ),
    'navigation' => array(
        'main_nav' => array(
            'home' => array(
                'label' => 'Home',
                'route' => 'home',
                #'target' => '_blank',
                'resource'  => 'controller/Application\Controller\Index',
            ),
            'product' => array(
                'label' => 'Produkte',
                'route' => 'product',
                'pages' => array(
                    'add' => array(
                        'label' => 'Neues Produkt',
                        'route' => 'product',
                        'action' => 'add',
                        'resource'  => 'controller/Application\Controller\Product',
                    ),
                    'list' => array(
                        'label' => 'Produktliste',
                        'route' => 'product',
                        'resource'  => 'controller/Application\Controller\Product',
                    ),
                ),
            ),
            'debitor' => array(
                'label' => 'Kunden',
                'route' => 'debitor',
                'pages' => array(
                    'add' => array(
                        'label' => 'Neuer Kunde',
                        'route' => 'debitor',
                        'action' => 'add',
                        'resource'  => 'controller/Application\Controller\Debitor',
                    ),
                    'list' => array(
                        'label' => 'Kundenliste',
                        'route' => 'debitor',
                        'resource'  => 'controller/Application\Controller\Debitor',
                    ),
                ),
            ),
            'statistic' => array(
                'label' => 'Statistik',
                'route' => 'statistic',
                'pages' => array(
                    'income' => array(
                        'label' => 'Gewinn und Verlust',
                        'route' => 'statistic',
                        'action' => 'income',
                        'resource'  => 'controller/Application\Controller\Statistic',
                    ),
                    'tax' => array(
                        'label' => 'Steuer',
                        'route' => 'statistic',
                        'action' => 'tax',
                        'resource'  => 'controller/Application\Controller\Statistic',
                    ),
                ),
            ),
            /*'statistic' => array(
                'label' => 'Stats',
                'route' => 'admin/statistic',
                'pages' => array(
                    'order' => array(
                        'label' => 'Orders',
                        'route' => 'admin/statistic',
                        'action' => 'orders',
                        'resource'  => 'controller/Admin\Controller\Statistic',
                    ),
                    'participant' => array(
                        'label' => 'Participants',
                        'route' => 'admin/statistic',
                        'action' => 'participants',
                        'resource'  => 'controller/Admin\Controller\Statistic',
                    ),
                    'bankaccount' => array(
                        'label' => 'Bank accounts',
                        'route' => 'admin/statistic',
                        'action' => 'bankaccounts',
                        'resource'  => 'controller/Admin\Controller\Statistic',
                    ),
                    'onsite' => array(
                        'label' => 'Onsite',
                        'route' => 'admin/statistic',
                        'action' => 'onsite',
                        'resource'  => 'controller/Admin\Controller\Statistic',
                    ),
                ),
            ),
            'shop' => array(
                'label' => 'Shop',
                'route' => 'admin',
                'pages' => array(
                    'tax' => array(
                        'label' => 'Tax',
                        'route' => 'admin/tax',
                        'resource'  => 'controller/Admin\Controller\Tax',
                    ),
                    'deadline' => array(
                        'label' => 'Deadline',
                        'route' => 'admin/deadline',
                        'resource'  => 'controller/Admin\Controller\Deadline',
                    ),
                    'agegroup' => array(
                        'label' => 'Agegroup',
                        'route' => 'admin/agegroup',
                        'resource'  => 'controller/Admin\Controller\Agegroup',
                    ),
                    'paymenttype' => array(
                        'label' => 'Payment Type',
                        'route' => 'admin/payment-type',
                        'resource'  => 'controller/Admin\Controller\PaymentType',
                    ),
                    'country' => array(
                        'label' => 'Country',
                        'route' => 'admin/country',
                        'resource'  => 'controller/Admin\Controller\Country',
                    ),
                    'counter' => array(
                        'label' => 'Counter',
                        'route' => 'admin/counter',
                        'resource'  => 'controller/Admin\Controller\Counter',
                    ),
                ),
            ),
            'product' => array(
                'label' => 'Product',
                'route' => 'admin/product',
                #'action' => 'reset',
                'resource'  => 'controller/Admin\Controller\Product',
            ),
            'user' => array(
                'label' => 'User',
                'route' => 'admin/user',
                'resource'  => 'controller/Admin\Controller\User',
                'pages' => array(
                    'user' => array(
                        'label' => 'User',
                        'route' => 'admin/user',
                        'resource'  => 'controller/Admin\Controller\User',
                    ),
                    'role' => array(
                        'label' => 'Role',
                        'route' => 'admin/role',
                        'resource'  => 'controller/Admin\Controller\Role',
                    ),
                ),
            ),
            'order' => array(
                'label' => 'Order',
                'route' => 'admin/order',
                #'resource'  => 'controller/Admin\Controller\Order',
                'pages' => array(
                    'overview' => array(
                        'label' => 'Overview',
                        'route' => 'admin/order',
                        'resource'  => 'controller/Admin\Controller\Order',
                    ),
                    'search' => array(
                        'label' => 'Search',
                        'route' => 'admin/order',
                        'action' => 'search',
                        'resource'  => 'controller/Admin\Controller\Order',
                    ),
                    'zero-euro-tickets' => array(
                        'label' => '0€-Week-Tickets',
                        'route' => 'admin/order',
                        'action' => 'zero-euro-tickets',
                        'resource'  => 'controller/Admin\Controller\Order',
                    ),
                ),
            ),
            'matching' => array(
                'label' => 'Matching',
                'route' => 'admin',
                'pages' => array(
                    'overview' => array(
                        'label' => 'Overview',
                        'route' => 'admin/matching',
                        'action' => 'index',
                        'resource'  => 'controller/Admin\Controller\Matching',
                    ),
                    'bankaccount' => array(
                        'label' => 'Bank accounts',
                        'route' => 'admin/bankaccount',
                        'resource'  => 'controller/Admin\Controller\Bankaccount',
                    ),
                    'upload-csv' => array(
                        'label' => 'Upload CSV',
                        'route' => 'admin/bankaccount',
                        'action' => 'upload-csv',
                        'resource'  => 'controller/Admin\Controller\Bankaccount',
                    ),
                    'manual' => array(
                        'label' => 'Manual Matching',
                        'route' => 'admin/matching',
                        'action' => 'manual',
                        'resource'  => 'controller/Admin\Controller\Matching',
                    ),
                    'disabled' => array(
                        'label' => 'Disabled Statements',
                        'route' => 'admin/matching',
                        'action' => 'disabled',
                        'resource'  => 'controller/Admin\Controller\Matching',
                    ),
                ),
            ),
            'refund' => array(
                'label' => 'Refund',
                'route' => 'admin',
                'pages' => array(
                    'overview' => array(
                        'label' => 'Refund pending',
                        'route' => 'admin/refund',
                        'action' => 'index',
                        'resource'  => 'controller/Admin\Controller\Refund',
                    ),
                ),
            ),*/
        ),
        'top_nav' => array(
            /*'login' => array(
                'label' => 'Login',
                'route' => 'zfcuser/login',
                #'action' => 'login',
                'resource'  => 'controller/zfcuser:login',
            ),
            'register' => array(
                'label' => 'Register',
                'route' => 'zfcuser/register',
                #'action' => 'register',
                'resource'  => 'controller/zfcuser:register',
            ),
            'profile' => array(
                'label' => 'My Profile',
                'route' => 'profile',
                'action' => '',
                'resource'  => 'controller/PreReg\Controller\Profile',
            ),
            'logout' => array(
                'label' => 'Logout',
                'route' => 'zfcuser/logout',
                #'action' => 'logout',
                'resource'  => 'controller/zfcuser:logout',
            ),
            'admin' => array(
                'label' => 'AdminPanel',
                'route' => 'admin',
                'resource'  => 'controller/Admin\Controller\Index',
            ),
            'onsite' => array(
                'label' => 'Onsite',
                'route' => 'onsite',
                'resource'  => 'controller/OnsiteReg\Controller\Index',
            ),*/
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'product' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/product[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Product',
                        'action' => 'index',
                    ),
                ),
            ),
            'debitor' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/debitor[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Debitor',
                        'action' => 'index',
                    ),
                ),
            ),
            'blog-post' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/blog-post[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Blog',
                        'action' => 'index',
                    ),
                ),
            ),
            'statistic' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/statistic[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Statistic',
                        'action' => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'main_nav' => 'Application\Service\MainNavigationFactory',
            'top_nav'  => 'Application\Service\TopNavigationFactory',
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
            'Logger'     => 'EddieJaoude\Zf2Logger',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    
    'doctrine' => array(
        'driver' => array(
            'moos_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity'),
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'moos_entities'
                )
            )
        )
    ),
);
