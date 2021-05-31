<?php

namespace GamaAcademy\MarketersRegister\Block;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_filesystem;

    public function __construct(Template\Context $context, \GamaAcademy\MarketersRegister\Model\PostFactory $postFactory)
    {
        parent::__construct($context);
        $this->_postFactory = $postFactory;
    }

    public function getResult()
    {
        $post = $this->_postFactory->cretae();
        $collection = $post->getCollection();
        return $collection;
    }
}
