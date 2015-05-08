<?php
namespace Pimcore\Model\Document\Tag\Area;

class TestArea extends AbstractArea
{
    public function action()
    {
        $this->view->testVariable = "This is the string from action";
    }

    public function postRenderAction()
    {

    }

    public function getBrickHtmlTagOpen($brick)
    {
        return '<div class="testArea">';
    }

    public function getBrickHtmlTagClose($brick)
    {
        return '</div>';
    }
}