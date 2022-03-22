<?php

use Phalcon\Mvc\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        
    }
  
    public function signupAction()
    {
        $user = new Users();

        //assign value from the form to $user
        $user->assign(
            $this->request->getPost(),
            [
                'username',
                'email',
                'password'
                
            ]
        );
        // print_r($this->request->getPost());

        // Store and check for errors
        $success = $user->save();

        // passing the result to the view
        $this->view->success = $success;

        if ($success) {
            $message = "Thanks for registering!";
        } else {
            $message = "Sorry, the following problems were generated:<br>"
                     . implode('<br>', $user->getMessages());
        }

        // passing a message to the view
        $this->view->message = $message;
        
    }
    public function loginAction() {

        
        
    }
    public function credAction() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        $isadmin = Users:: find(
            [
                "email = '$email' and
                password = '$password' and
                role = 'admin' and
                status = 'approved'"
            ]
        );
        



        
        $iscustomer = Users:: find(
            [
                "email = '$email' and
                password = '$password' and
                role = 'customer' and
                status = 'approved'"
            ]
        );
        
        if (count($isadmin)) {
            echo "Admin";
        } elseif (count($iscustomer)) {
            echo "customer";
        } else {
            echo "No user found";
        }


        
    }


    

}