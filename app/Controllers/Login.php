<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{

    protected $UserModel;
    protected $session;

    function __construct(){
        $this->UserModel = new UserModel();
        $this->session = session();
    }

    public function index(){

        // if session with name USER is available back to url /
        if (!empty($_SESSION['USER'])) {
            return redirect()->to('/');
        }
        
        /*
        if method is post (submit clicked) 
        this if block will run and send the input variable
        to isAvailable() function
        */
        if ($this->request->getMethod() == 'post') {
            $input = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password')
            ];
            // var_dump($input);die();
            
            return $this->isAvailable($input);
        }

        $data = [
            'title' => 'Login'
        ];

        return view('login/sign-in', $data);
    }

    protected function isAvailable($input){
        
        $encrypter = \Config\Services::encrypter();
        
        $result = $this->UserModel->user($input['username'])->getRowArray();
        
        if ($result == NULL) {
            return var_dump("username is not available");die();
            
        } else {
            
            if ($input['username'] == $result['username']) {
                $chipertext = $encrypter->decrypt(base64_decode($result['password']));

                if (($input['password'] == $chipertext)) {
                    
                    $input = $input['username'];


                    $temp = $result['id_unit_prodi'];
                    $temp = $this->UserModel->query("SELECT unit_prodi FROM unit_prodi WHERE id_unit_prodi = '$temp'")->getRowArray();

                    $this->session->set("USER","$input");
                    $this->session->set("ID-UNIT-PRODI", $result['id_unit_prodi']);
                    $this->session->set("ROLE", $result['role']);
                    $this->session->set("UNIT-PRODI", $temp['unit_prodi']);

                    // var_dump($_SESSION);die();
                    return redirect()->to('/');

                } else {
                    return var_dump("password is wrong");die();
                }
            }
        }
        
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('/');
    }
}