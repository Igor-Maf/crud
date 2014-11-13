<?php
class storeController extends Controller {
    private $_model;
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->loadModel('store');
    }
    
    public function index($pagina = false) {
        if ($this->filterInt($pagina)) {
            $pagina = $pagina;
        } else {
            $pagina = false;
        }
        
        $this->loadLibrary('pagination');
        $pagination = new Paginador();
        
        
        
        $this->_view->assign('title', 'Склады');
        $this->_view->assign('stores', $pagination->paginar($this->_model->getStores(), $pagina, 5));
        $this->_view->assign('pagination', $pagination->getView('pagination', 'store/index'));
        
        if ($this->getInt('add_store') == 1) {
            $this->_view->assign('data', $_POST);
            
            if (!$this->getSql('store_name')) {
                $this->_view->assign('_error', 'Заполните поле "Имя склада".');
                $this->_view->renderizer('index');
                exit;
            }
            
            if ($this->_model->verificationStoreName($this->getSql('store_name'))) {
                $this->_view->assign('_error', 'Склад с таким именем уже существует.');
                $this->_view->renderizer('index');
                exit;
            } /* проверить введенное "имя склада" на уникальность значения */
            
            $this->_model->insertStore($this->getSql('store_name'));
            $this->redirect('store');
        }
        $this->_view->renderizer('index');
    }
    
    
    public function edit($id) {
        
        if (!$this->filterInt($id)) {
            $this->redirect('store');
        }
        if (!$this->_model->getStoreById($this->filterInt($id))) {
            $this->redirect('store');
        }
     
        if ($this->getInt('edit_store') == 1) {
            if (!$this->getSql('store_name')) {
                $this->_view->assign('_error', 'Заполните поле "Имя склада".');
                $this->_view->renderizer('edit');
                exit;
            }
            if ($this->_model->verificationStoreName($this->getSql('store_name'))) {
                $this->_view->assign('_error', 'Склад с таким именем уже существует.');
                $this->_view->renderizer('edit');
                exit;
            } /* проверить введенное "имя склада" на уникальность значения */

            $this->_model->editStore($this->filterInt($id), $this->getSql('store_name'));
            
            $this->redirect('store');
        }
        
        $this->_view->assign('title', 'Edit store form');
        $this->_view->assign('data', $this->_model->getStoreById($this->filterInt($id)));
        
        
        $this->_view->renderizer('edit');
    }
    
    
    public function delete($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('store');
        }
        
        if (!$this->_model->getStoreById($this->filterInt($id))) {
            $this->redirect('store');
        }
       
        
        if ($this->_model->getStoreContCount($this->filterInt($id))) {
            $this->_view->assign('_error', 'Вы не можете удалить склад, т.к. в нем есть контейнера.');
            $this->_view->renderizer('index');
            exit;
        } 
        
        $this->_model->deleteStore($this->filterInt($id));
        $this->redirect('store');
    }
}