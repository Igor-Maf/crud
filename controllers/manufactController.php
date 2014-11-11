<?php
class manufactController extends Controller {
    private $_model;
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->loadModel('manufact');
    }
    
    public function index($pagina = false) {
        if ($this->filterInt($pagina)) {
            $pagina = $pagina;
        } else {
            $pagina = false;
        }
        
        $this->loadLibrary('pagination');
        $pagination = new Paginador();
        
        $this->_view->assign('title', 'Города-отправители');
        $this->_view->assign('manufacts', $pagination->paginar($this->_model->getManufact(), $pagina, 5));
        $this->_view->assign('pagination', $pagination->getView('pagination', 'manufact/index'));
        
        
        if ($this->getInt('add_manufact') == 1) {
            $this->_view->assign('data', $_POST);
            
            if (!$this->getSql('manufact_city_name')) {
                $this->_view->assign('_error', 'Заполните поле "Новый город".');
                $this->_view->renderizer('index');
                exit;
            }
            
            if ($this->_model->verificationManufactCityName($this->getSql('manufact_city_name'))) {
                $this->_view->assign('_error', 'Город уже существует.');
                $this->_view->renderizer('index');
                exit;
            } /* проверить введенный "код" на уникальность значения */
            
            $this->_model->insertManufactCity($this->getSql('manufact_city_name'));
            $this->redirect('manufact');
        }
        $this->_view->renderizer('index');
    }
    
    public function edit($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('manufact');
        }
        if (!$this->_model->getManufactById($this->filterInt($id))) {
            $this->redirect('manufact');
        }
        
        if ($this->getInt('edit_manufact') == 1) {
            
            if (!$this->getSql('manufact_city_name')) {
                $this->_view->assign('_error', 'Заполните поле "Редактировать город".');
                $this->_view->renderizer('edit');
                exit;
            }
            
            if ($this->_model->verificationManufactCityName($this->getSql('manufact_city_name'))) {
                $this->_view->assign('_error', 'Город уже существует.');
                $this->_view->renderizer('edit');
                exit;
            } /* проверить введенный "код" на уникальность значения */
            
            $this->_model->editManufactCity($this->filterInt($id), $this->getSql('manufact_city_name'));
            $this->redirect('manufact');
        }
        $this->_view->assign('title', 'Редактировать город-производитель');
        $this->_view->assign('data', $this->_model->getManufactById($this->filterInt($id)));
        
        
        $this->_view->renderizer('edit');
    }
    
    public function delete($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('manufact');
        }
        
        if (!$this->_model->deleteManufactCity($this->filterInt($id))) {
            $this->redirect('manufact');
        }
        
        $this->_model->deleteManufactCity($this->filterInt($id));
        $this->redirect('manufact');
    }
}