<?php

/*
 * It is important to also add this path to the include path
 * <pluginIncludePaths>
 *	   ...
 *     ...
 *     ...
 *     <path>/TestPlugin/lib/Pimcore/Model</path>
 * </pluginIncludePaths>
 */

namespace Pimcore\Model\Document\Tag;

use Pimcore\Model;

class Testeditable extends Model\Document\Tag
{
    public $text = "";

    /**
     * Return the data for direct output to the frontend, can also contain HTML code!
     *
     * @return string
     */
    public function frontend()
    {
        return "***" . $this->text . "***";
    }

    /**
     * Get the current data stored for the element
     * this is used as general fallback for the methods getDataForResource(), admin(), getValue()
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->text;
    }

    /**
     * Return the type of the element
     *
     * @return string
     */
    public function getType()
    {
        return "testeditable";
    }

    /**
     * Receive the data from the editmode and convert this to the internal data in the object eg. image-id to Asset\Image
     *
     * @param mixed $data
     * @return void
     */
    public function setDataFromEditmode($data)
    {
        $this->text = $data;
        return this;
    }

    /**
     * Receive the data from the resource and convert to the internal data in the object eg. image-id to Asset\Image
     *
     * @param mixed $data
     * @return string
     */
    public function setDataFromResource($data)
    {
        $this->text = $data;
        return $this;
    }

}