<?php

namespace GamaAcademy\MarketersRegister\Model;

use GamaAcademy\MarketersRegister\Api\Data\MarketersSearchInterfaceFactory;
use GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister\MarkCollectionFactory;
use GamaAcademy\MarketersRegister\Api\Data\MarketersInterface;
use GamaAcademy\MarketersRegister\Api\MarketersRepositoryInterface;
use GamaAcademy\MarketersRegister\Api\Data\MarketersInterfaceFactory;

\\use GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister as ResourceModel;

class MarketersRepository implements MarketersRepositoryInterface
{
    private $marketersFactory;

    private $rm;

    private $collectionFactory;
}

