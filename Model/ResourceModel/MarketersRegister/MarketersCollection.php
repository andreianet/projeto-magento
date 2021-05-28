<?php

namespace GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\GamaAcademy\MarketersRegister\Model\MarketersRegister::class,
                \GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister::class);
    }
}

