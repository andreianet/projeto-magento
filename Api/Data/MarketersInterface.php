<?php

namespace GamaAcademy\MarketersRegister\Api\Data;

interface MarketersInterface
{
    const ID = 'id';
    const NAME = 'name';
    const DATE_CREATED = 'date_created';
    const DATE_UPDATE = 'date_update';

    /**
     * @return int|null
     */
    public function getId();

    /**
     * @return string|null
     */
    public function getName() :?string;

    /**
     * @return string|null
     */
    public function getDATE_CREATED() :?string;

    /**
     * @return string|null
     */
    public function getDATE_UPDATE() :?string;


    /**
     * @params int $id
     * @param $id
     * @return MarketersInterface
     */
    public function setId($id): MarketersInterface;

    /**
     * @params string $name
     * @return MarketersInterface
     */
    public function setName($name) :MarketersInterface;

    /**
     * @params string $date_created
     * @return MarketersInterface
     */
    public function setDATE_CREATED($date_created) :MarketersInterface;

    /**
     * @params string $date_date_update
     * @return MarketersInterface
     */
    public function setDateUpdate($date_update) :MarketersInterface;

}
