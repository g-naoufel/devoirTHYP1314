<?php
// module/Nf/conﬁg/module.config.php:
// module/Nf/conﬁg/module.conﬁg.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'Nf\Controller\Nf' => 'Nf\Controller\NfController',

        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'nf' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/nf[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Nf\Controller\Nf',
                        'action'     => 'index',
						
                    ),
                ),
            ),
        ),
    ),
'view_manager' => array(
         'template_path_stack' => array(
             'nf' => __DIR__ . '/../view',
         ),
		 'strategies' => array (
			'ViewJsonStrategy'
		),
     ),
 );

?>