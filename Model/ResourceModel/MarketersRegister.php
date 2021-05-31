<?php

namespace GamaAcademy\MarketersRegister\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

abstract class MarketersRegister extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'marketers_CRUD',
            'id'
        );
    }

}
