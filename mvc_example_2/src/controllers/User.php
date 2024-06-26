<?php
use system\BaseController;

class User extends BaseController
{
    protected $dataSet = [];
    protected $userModel;
    public $user;
    private $msg;

    public function __construct()
    {
        parent::__construct();

        $this->load('models', 'UserModel');
        $this->userModel = new UserModel();

        $this->user = $this->userModel->authenticateValidator();
    }

    public function register()
    {
        if (isset($_POST["submit"])) {
            $this->dataSet = [
                'name' => "",
                'lastName' => "",
                'username' => "",
                'password' => "",
                'email' => "",
                'phoneNumber' => "",
                'address' => "",
            ];

            $this->dataSet['name'] = stringSanitizer($_POST["name"]);
            $this->dataSet['lastName'] = stringSanitizer($_POST["last-name"]);
            $this->dataSet['username'] = stringSanitizer($_POST["username"]);
            $this->dataSet['password'] = stringSanitizer($_POST["password"]);
            $this->dataSet['email'] = stringSanitizer($_POST["email"]);
            $this->dataSet['phoneNumber'] = stringSanitizer($_POST["phone-number"]);
            $this->dataSet['address'] = stringSanitizer($_POST["address"]);

            $userExists = $this->userModel->verify($this->dataSet);
            if ($userExists) {
                $this->msg = message('Registration failed!', 'This User already exists!', 'error', 'ok', 'user', 'register');
            } else {
                $insertSuccess = $this->userModel->registerUser($this->dataSet);
                if (isset($insertSuccess)) {
                    $this->userModel->authenticateValidator($this->dataSet['username'], $this->dataSet['password']);
                    $this->msg = message('Gratz!', 'Registration successfully!', 'success', 'Nice', 'home', 'userIndex');
                } else {
                    $this->msg = message('Registration failed!', 'Error occurred during registration!!', 'error', 'ok', 'user', 'register');
                }
            }
        }
        load_view('header',[
            'title' => "Register",
            'msg' => $this->msg,
        ]);
        load_view('register');
        load_view('footer');
    }

    public function login()
    {
        if (isset($_POST["submit"])) {
            $this->dataSet['username'] = stringSanitizer($_POST["username"]);
            $this->dataSet['password'] = stringSanitizer($_POST["password"]);

            $loginVerifier = $this->userModel->authenticateValidator($this->dataSet['username'], $this->dataSet['password']);

            if ($loginVerifier) {
                $this->msg = message('Login Successfully', 'Welcome!', 'success', 'ok', 'home', 'userIndex');
            } else {
                $this->msg = message('Login failed!', 'Invalid username or password. try again!!', 'error', 'ok', 'user', 'login');
            }
        }
        load_view('header', [
            'title' => "Login",
            'msg' => $this->msg,
        ]);
        load_view('login');
        load_view('footer');
    }

    public function logOut()
    {
        $this->session->destroy('userID');
        $this->session->destroy('pass');

        header('location: /?mod=home&page=index');
        exit();
    }
}