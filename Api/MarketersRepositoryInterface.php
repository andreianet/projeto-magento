<?php

namespace  GamaAcademy\MarketersRegister\Api;

use GamaAcademy\MarketersRegister\Api\Data\MarketersInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface MarketersRepositoryInterface
{
    /**
     * Buscar Marketers por ID
     * @params string $idMarketers
     * @return GamaAcademy\MarketersRegister\Api\Data\MarketersInterface
     */
    public function getById($idMarketers);

    /**
     * Listar Marketers - Feirantes
     * @params SearchCriteriaInterface $searchCriteriaInterface
     * @return GamaAcademy\MarketersRegister\Api\Data\MarketersSearchresultInterface
     */
    public  function getList(SearchCriteriaInterface $searchCriteriaInterface);

    /**
     * Salvar Marketers - Feirantes
     * @params \GamaAcademy\MarketersRegister\Api\Data\MarketersInterface $marketers
     * @return \GamaAcademy\MarketersRegister\Api\Data\MarketersInterface
     */
    public function save(MarketersInterface $marketers);

    /**
     * Deletar Marketers - Feirantes
     * @params \GamaAcademy\MarketersRegister\Api\Data\MarketersInterface $marketers
     */
    public function delete(MarketersInterface $marketers);

    /**
     * Deletar por ID Marketers - Feirantes
     * @params string $idMarketers
     */
    public function deleteById($idMarketers);

}
