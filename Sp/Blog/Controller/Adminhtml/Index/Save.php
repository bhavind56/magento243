<?php
namespace Sp\Blog\Controller\Adminhtml\Index;
use Magento\Framework\App\Filesystem\DirectoryList;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $uploaderFactory;

    public function __construct(
    \Magento\Backend\App\Action\Context $context,
    \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory
    ) {
        $this->uploaderFactory = $uploaderFactory;
        parent::__construct($context);
    }   
	public function execute()
    {   
        $data = $this->getRequest()->getParams();
        
        if ($data) {
            $model = $this->_objectManager->create('Sp\Blog\Model\Blog');

			$id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
                $data['updated_at'] = date('Y-m-d H:i:s');
            }else{
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_at'] = date('Y-m-d H:i:s');    
            }

            $model->setData($data);
			
            try {
                $model->save();
                $this->messageManager->addSuccess(__('The Frist Grid Has been Saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            return;
        }
        $this->_redirect('*/*/');
    }
}
