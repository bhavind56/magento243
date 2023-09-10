<?php
namespace Sp\Blog\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Sp\Blog\Model\BlogFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $blogFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        BlogFactory $blogFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->blogFactory = $blogFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        // try {
        //     $data = (array)$this->getRequest()->getPost();
        //     if ($data) {
        //         $model = $this->blogFactory->create();
        //         $model->setData($data)->save();
        //         $this->messageManager->addSuccessMessage(__("Your blog is sent successfully! We will check and update you soon!"));
        //     }
        // } catch (\Exception $e) {
        //     $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        // }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
}