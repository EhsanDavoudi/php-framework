<?php
use system\BaseController;

class Home extends BaseController
{
    private $btcPrice;
    protected $userModel;
    protected $user;
    public function __construct()
    {
        parent::__construct();

        $this->btcPrice = getCryptoPrice('btc', "usdt");

        $this->load('models', 'UserModel');
        $this->userModel = new UserModel();

        $this->user = $this->userModel->authenticateValidator();
    }

    public function index()
    {
        if (isset($this->user)) {
            header('location: /?mod=home&page=userIndex');
        } else {
            load_view("header",[
                'title' => "Home"
            ]);
            load_view('home', [
                'btcPrice' => $this->btcPrice,
            ]);
            load_view("footer");
        }
    }

    public function userIndex()
    {
        $userNameAndLastName = $this->userModel->userInfo();

        load_view("header",[
            'title' => "Home"
        ]);
        load_view('userHome', [
            'btcPrice' => $this->btcPrice,
            'userInfo' => $userNameAndLastName,
        ]);
        load_view("footer");

    }

    public function test()
    {
        echo "<h1>Home/test</h1>";
    }
}