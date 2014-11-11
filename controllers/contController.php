<?php
class contController extends Controller {
    private $_model;
    
    public function __construct() {
        parent::__construct();
        $this->_model = $this->loadModel('cont');
    }
    
    public function index($pagina = false) {
        if ($this->filterInt($pagina)) {
            $pagina = $pagina;
        } else {
            $pagina = false;
        }
        
        $this->loadLibrary('pagination');
        $pagination = new Paginador();
        
        $this->_view->assign('conts', $pagination->paginar($this->_model->getCont(), $pagina, 5));
        $this->_view->assign('pagination', $pagination->getView('pagination', 'cont/index'));
        
        $this->_view->assign('title', 'Контейнера');
        $this->_view->setJs(array('cont-main'));
        $this->_view->assign('types_cont', $this->_model->getContTypes());
        $this->_view->assign('stores', $this->_model->getStores());
        $this->_view->assign('manufact_cityes', $this->_model->getManufactCityes());
        $this->_view->assign('client_cityes', $this->_model->getClientCityes());
        
        if ($this->getInt('add_cont') == 1) {
            $this->_view->assign('data', $_POST);
            
            if (!$this->getSql('cont_code')) {
                $this->_view->assign('_error', 'Заполните поле "Код".');
                $this->_view->renderizer('index');
                exit;
            }
            if ($this->_model->verificationContCode($this->getSql('cont_code'))) {
                $this->_view->assign('_error', 'Такой "Код" контейнера уже существует.');
                $this->_view->renderizer('index');
                exit;
            } /* проверить введенный "код" на уникальность значения */
            if (!$this->getInt('type_cont')) {
                $this->_view->assign('_error', 'Выберите "Тип" контейнера.');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getSql('cont_weight')) {
                $this->_view->assign('_error', 'Заполните поле "Груз".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getInt('store')) {
                $this->_view->assign('_error', 'Выберите "Склад".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getInt('manufact_city')) {
                $this->_view->assign('_error', 'Выберите город "Прибыл из".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getInt('client_city')) {
                $this->_view->assign('_error', 'Выберите город "Отправлен в".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getSql('date_start')) {
                $this->_view->assign('_error', 'Заполните поле "Дата прибытия".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getSql('date_end')) {
                $this->_view->assign('_error', 'Заполните поле "Дата отправления".');
                $this->_view->renderizer('index');
                exit;
            }
            
            $this->_model->insertCont(
                    $this->getSql('cont_code'),
                    $this->getInt('type_cont'),
                    $this->getSql('cont_weight'), 
                    $this->getInt('manufact_city'),
                    $this->getInt('client_city'),
                    $this->getSql('date_start'),
                    $this->getSql('date_end'),
                    $this->getInt('store'));
            
            $this->redirect('cont');
        }
        $this->_view->renderizer('index');
    }
    
    public function edit($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('cont');
        }
        if (!$this->_model->getContById($this->filterInt($id))) {
            $this->redirect('cont');
        }
        
        if ($this->getInt('edit_cont') == 1) {
            
            if (!$this->getSql('cont_code')) {
                $this->_view->assign('_error', 'Заполните поле "Код".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getInt('type_cont')) {
                $this->_view->assign('_error', 'Выберите "Тип" контейнера.');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getSql('cont_weight')) {
                $this->_view->assign('_error', 'Заполните поле "Груз".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getInt('store')) {
                $this->_view->assign('_error', 'Выберите "Склад".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getInt('manufact_city')) {
                $this->_view->assign('_error', 'Выберите город "Прибыл из".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getInt('client_city')) {
                $this->_view->assign('_error', 'Выберите город "Отправлен в".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getSql('date_start')) {
                $this->_view->assign('_error', 'Заполните поле "Дата прибытия".');
                $this->_view->renderizer('index');
                exit;
            }
            if (!$this->getSql('date_end')) {
                $this->_view->assign('_error', 'Заполните поле "Дата отправления".');
                $this->_view->renderizer('index');
                exit;
            }
            
            $this->_model->editCont(
                    $this->filterInt($id),
                    $this->getSql('cont_code'),
                    $this->getInt('type_cont'),
                    $this->getSql('cont_weight'),
                    $this->getInt('store'),
                    $this->getInt('manufact_city'),
                    $this->getInt('client_city'),
                    $this->getSql('date_start'),
                    $this->getSql('date_end'));
            
            $this->redirect('cont');
        }
        
        $this->_view->assign('title', 'Edit container form');
        $this->_view->assign('data', $this->_model->getContById($this->filterInt($id)));
        $this->_view->assign('types_cont', $this->_model->getContTypes());
        $this->_view->assign('stores', $this->_model->getStores());
        $this->_view->assign('manufact_cityes', $this->_model->getManufactCityes());
        $this->_view->assign('client_cityes', $this->_model->getClientCityes());
        
        
        $this->_view->renderizer('edit');
    }
    
    
    public function delete($id) {
        if (!$this->filterInt($id)) {
            $this->redirect('cont');
        }
        if (!$this->_model->getContById($this->filterInt($id))) {
            $this->redirect('cont');
        }
        
        $this->_model->deleteCont($this->filterInt($id));
        $this->redirect('cont');
    }
}