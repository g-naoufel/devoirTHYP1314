<?php
// module/Nf/src/Nf/Model/NfTable.php:
namespace Nf\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class NfTable extends AbstractTableGateway
{
    protected $table ='nf';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Nf());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getNf($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id_etudiant' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveNf(Nf $nf)
    {
        $data = array(
            'nom' => $nf->nom,
            'prenom'  => $nf->prenom,
        );
        $id = (int)$nf->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getNf($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteNf($id)
    {
        $this->delete(array('id' => $id));
    }
}