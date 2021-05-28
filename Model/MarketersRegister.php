<?php

namespace GamaAcademy\MarketersRegister\Model;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class MarketersRegister extends AbstractDb{
    protected  function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('marketers_CRUD', 'id');
    }

    public  function getDefaultValues ( )
    {
        $values  =  [ ] ;

                return  $values ;
    }
}
