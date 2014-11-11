<?php
class typeController extends Controller {
    private $_model;
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->loadModel('type');
    }
    
    public function index($pagina = false) {
        if ($this->filterInt($pagina)) {
            $pagina = $pagina;
        } else {
            $pagina = false;
        }
        
        $this->loadLibrary('pagination');
        $pagination = new Paginador();
        
        $this->_view->assign('title', 'Типы контейнеров');
        $this->_view->assign('types_cont', $pagination->paginar($this->_model->getTypeConts(), $pagina, 5));
        $this->_view->assign('pagination', $pagination->getView('pagination', 'type/index'));
        
        if ($this->getInt('add_type') == 1) {
            $this->_view->assign('data', $_POST);
            
            if (!$this->getSql('type_cont_name')) {
                $this->_view->assign('_error', 'Заполните поле "Название типа".');
                $this->_view->renderizer('index');
                exit;
            }
            
            if ($this->_model->verificationTypeName($this->getSql('type_cont_name'))) {
                $this->_view->assign('_error', 'Тип с таким именем уже существует.');
                $this->_view->renderizer('index');
                exit;
            } /* проверить введенный "код" на уникальность значения */
            
            $this->_model->insertTypeCont($this->getSql('type_cont_name'));
            $this->redirect('type');
        }
        $this->_view->renderizer('index');
    }
    
    public function edit($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('type');
        }
        if (!$this->_model->getTypeContById($this->filterInt($id))) {
            $this->redirect('type');
        }
        
        if ($this->getInt('edit_type') == 1) {
            if (!$this->getSql('type_cont_name')) {
                $this->_view->assign('_error', 'Заполните поле "Название типа".');
                $this->_view->renderizer('index');
                exit;
            }

            $this->_model->editType($this->filterInt($id), $this->getSql('type_cont_name'));
            
            $this->redirect('type');
        }
        
        $this->_view->assign('title', 'Edit store form');
        $this->_view->assign('data', $this->_model->getTypeContById($this->filterInt($id)));
        
        
        $this->_view->renderizer('edit');
    }
    
    public function delete($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('type');
        }
        
        if (!$this->_model->getTypeContById($this->filterInt($id))) {
            $this->redirect('type');
        }
        
        $this->_model->deleteType($this->filterInt($id));
        $this->redirect('type');
    }
}