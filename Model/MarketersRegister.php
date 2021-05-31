<?php

namespace GamaAcademy\MarketersRegister\Model;

use GamaAcademy\MarketersRegister\Api\Data\MarketersInterface;
use Magento\Framework\Model\AbstractModel;

class MarketersRegister extends AbstractModel implements MarketersInterface {

        protected $_eventPrefix = 'marketers_CRUD';

        protected  function _construct()
        {
            $this->_init(GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister::class);
        }

        /**
         * @return int/null
         */
        public function getId()
        {
            return $this->getData((self::ID));
        }

        /**
         * @return string
         */
        public function getName() :?string
        {
            return $this->getData(self::NAME);
        }

        /**
         * @return string|null
         */
        public function getDateCreated() : ?string
        {
            return $this->getData(self::DATE_CREATED);
        }

        /**
         * @return string|null
         */
        public function getDateUpdate() : ?string
        {
            return $this->getData(self::DATE_UPDATE);
        }

        /**
         * @param int $id
         * @return MarketersInterface
         */
        public function setId($id) : MarketersInterface
        {
            return parent::setData(self::ID, $id);
        }

        /**
         * @param string $name
         * @return MarketersInterface
         */
        public function setName($name) : MarketersInterface
        {
            return $this->setData(self::NAME,$name);
        }

        /**
         * @param string $date_created
         * @return MarketersInterface
         */
        public function setDateCreated($date_created) : MarketersInterface
        {
            return $this->getData(self::DATE_CREATED, $date_created);
        }

        /**
         * @param string $date_update
         * @return MarketersInterface
         */
        public function setDateUpdate($date_update) : MarketersInterface
        {
            return $this->getData(self::DATE_UPDATE, $date_update);
        }

    }
