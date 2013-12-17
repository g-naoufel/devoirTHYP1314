<?php
// module/Nf/src/Nf/Form/NfForm.php:
namespace Nf\Form;

use Zend\Form\Form;

class NfForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('nf');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id_etudiant',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nom',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Nom',
            ),
        ));
        $this->add(array(
            'name' => 'prenom',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Prenom',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}