<?php

/**
 * Class Application
 */
abstract class Application
{
    /** @type Registry */
    private $registry;
    /** @type array */
    private $data = array();

    /**
     * @param Registry $registry
     * @constructor
     */
    public function __construct(Registry $registry)
    {
        $this->db = $registry->db;

        unset($registry->vars['route']);
        unset($registry->vars['db']);

        $this->registry = $registry;
        $this->registry->data = array();

        $this->autoloader();
    }

    /**
     * @param string $view
     * @param array $data
     * @return void
     */
    public function view($view, $data = array())
    {
        $this->registry->data = array_merge($this->registry->data, $data);
        $this->registry->template->show($view);
    }

    /**
     * @param string $model
     * @return void
     */
    public function init_model($model)
    {
        include_once ROOT_PATH . '/model/' . $model . '_model.php';

        $className = ucfirst($model) . '_model';

        $this->model->$model = new $className;

        $this->registry->template->model->$model = &$this->model->$model;
    }

    /**
     * @return void
     */
    private function autoloader()
    {
        foreach ($this->registry->autoload as $type => $loader) {
            foreach ($loader as $load) {
                include_once ROOT_PATH . '/' . $type . '/' . $load . '_' . $type . '.php';

                // Create instance if not a helper
                if ($type != 'helper') {
                    $className = ucfirst($load) . '_' . $type;

                    $this->$type->$load = new $className;
                    $this->registry->template->$type->$load = &$this->$type->$load;
                }
            }
        }
    }

    /**
     * @return string
     */
    abstract function index();
}

/**
 * Class ApplicationAdmin
 */
class ApplicationAdmin extends Application
{
    /**
     * @param Registry $registry
     * @constructor
     */
    public function __construct(Registry $registry)
    {
        parent::__construct($registry);

        if (!isset($_SESSION[get_config('sess')]['is_admin']) || $_SESSION[get_config('sess')]['is_admin'] == 0) {
            redirect('auth/login');
        }
    }

    /**
     * @return mixed
     */
    public function index()
    {
    }
}

/**
 * Class ApplicationFront
 */
class ApplicationFront extends Application
{
    /**
     * @param Registry $registry
     * @constructor
     */
    public function __construct(Registry $registry)
    {

        parent::__construct($registry);

        // Secure admin area
        if (!isset($_SESSION[get_config('sess')]['user_id'])) {

            redirect('auth/login');
        }
    }

    /**
     * @return mixed
     */
    public function index()
    {
    }
}