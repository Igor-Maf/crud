<?php
class clientController extends Controller {
    private $_model;
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->loadModel('client');
    }
    
    public function index($pagina = false) {
        if ($this->filterInt($pagina)) {
            $pagina = $pagina;
        } else {
            $pagina = false;
        }
        
        $this->loadLibrary('pagination');
        $pagination = new Paginador();
        
        $this->_view->assign('title', 'Города-клиенты');
        $this->_view->assign('clients', $pagination->paginar($this->_model->getClient(), $pagina, 5));
        $this->_view->assign('pagination', $pagination->getView('pagination', 'client/index'));
        
        
        
        if ($this->getInt('add_client') == 1) {
            $this->_view->assign('data', $_POST);
            
            if (!$this->getSql('client_city_name')) {
                $this->_view->assign('_error', 'Заполните поле "Новый город".');
                $this->_view->renderizer('index');
                exit;
            }
            
            if ($this->_model->verificationClientCityName($this->getSql('client_city_name'))) {
                $this->_view->assign('_error', 'Город уже существует.');
                $this->_view->renderizer('index');
                exit;
            } /* проверить введенный "код" на уникальность значения */
            
            $this->_model->insertClientCity($this->getSql('client_city_name'));
            $this->redirect('client');
        }
        $this->_view->renderizer('index');
    }
    
    public function edit($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('client');
        }
        
        if (!$this->_model->getClientById($this->filterInt($id))) {
            $this->redirect('client');
        }
        
        if ($this->getInt('edit_client') == 1) {
            
            if (!$this->getSql('client_city_name')) {
                $this->_view->assign('_error', 'Заполните поле "Редактировать город".');
                $this->_view->renderizer('edit');
                exit;
            }
            
            if ($this->_model->verificationClientCityName($this->getSql('client_city_name'))) {
                $this->_view->assign('_error', 'Город уже существует.');
                $this->_view->renderizer('edit');
                exit;
            } /* проверить введенный "код" на уникальность значения */
            
            $this->_model->editClientCity($this->filterInt($id), $this->getSql('client_city_name'));
            $this->redirect('client');
        }
        $this->_view->assign('title', 'Редактировать города-клиенты');
        $this->_view->assign('data', $this->_model->getClientById($this->filterInt($id)));
        
        
        $this->_view->renderizer('edit');
    }
    
    public function delete($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('client');
        }
        
        if (!$this->_model->deleteClientCity($this->filterInt($id))) {
            $this->redirect('client');
        }
        
        $this->_model->deleteClientCity($this->filterInt($id));
        $this->redirect('client');
    }
}