<?php

namespace Pimcore\Model\Object\ClassDefinition\Data;

use Pimcore\Model;
use Pimcore\Model\Object;

class Testobjectfield extends Model\Object\ClassDefinition\Data {
    /**
     * Static type of this element
     *
     * @var string
     */
    public $fieldtype = "testobjectfield";

    /**
     * Type for the column to query
     *
     * @var string
     */
    public $queryColumnType = "varchar";

    /**
     * Type for the column
     *
     * @var string
     */
    public $columnType = "varchar";

    /**
     * Column length
     *
     * @var integer
     */
    public $columnLength = 255;

    /**
     * Type for the generated phpdoc
     *
     * @var string
     */
    public $phpdocType = "string";

    /**
     * Returns the data for the editmode
     *
     * @param mixed $data
     * @param null|Object\AbstractObject $object
     * @return mixed
     */
    public function getDataForEditmode($data, $object = null)
    {
        return $this->getDataForResource($data, $object);
    }

    /**
     * Converts data from editmode to internal eg. Image-Id tso Asset\Image object
     *
     * @param mixed $data
     * @param null|Object\AbstractObject $object
     * @return mixed
     */
    public function getDataFromEditmode($data, $object = null)
    {
        return $data;
    }

    /**
     * @see Object\ClassDefinition\Data::getDataForResource
     * @param string $data
     * @param null|Model\Object\AbstractObject $object
     * @return string
     */
    public function getDataForResource($data, $object = null) {
        return $data;
    }

    /**
     * @see Object\ClassDefinition\Data::getDataForQueryResource
     * @param string $data
     * @param null|Model\Object\AbstractObject $object
     * @return string
     */
    public function getDataForQueryResource($data, $object = null) {
        return $data;
    }

    /**
     * @see Object\ClassDefinition\Data::getDataFromResource
     * @param string $data
     * @return string
     */
    public function getDataFromResource($data) {
        return $data;
    }

    /**
     * @return string
     */
    public function getColumnType() {
        return $this->columnType . "(" . $this->getColumnLength() . ")";
    }

    /**
     * @return string
     */
    public function getQueryColumnType() {
        return $this->queryColumnType . "(" . $this->getColumnLength() . ")";
    }

    /**
     * @return integer
     */
    public function getColumnLength() {
        return $this->columnLength;
    }
}