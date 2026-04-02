<?php

namespace App\Controllers\Calon_peserta_didik;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\Simple_login;
use App\Libraries\Website;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * @var array
     */
    protected $helpers = ['form','website', 'text'];

    protected $session;
    protected $db;
    protected $pager;
    protected $simple_login;
    protected $website;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->session          = \Config\Services::session();
        $this->db               = \Config\Database::connect();
        $this->pager            = \Config\Services::pager();
        $uri                    = service('uri');
        $this->simple_login     = new Simple_login(); 
        $this->website          = new Website(); 
        $this->simple_login->checklogin_calon_peserta_didik();
    }
}
