<?php

class AccountController extends Controller {

    public function signout() {
        $this->f3->clear('SESSION');
        $this->f3->reroute('/');
    }

    public function signin() {
        $email = $this->f3->get('POST.email');
        $password = $this->f3->get('POST.password');

        $v = new Valitron\Validator(array('Email' => $email, 'Password' => $password));
        $v->rule('required', ['Email', 'Password']);
        $v->rule('email', 'Email');

        if ($v->validate()) {
            $account = new Account($this->db);
            $pwd = md5($password);
            $acc = $account->select("*", "email='$email' and password='$pwd'");
            if ($acc) {
                $this->f3->set('SESSION.acc', $acc);
                $acc = $acc[0];
                $acc['lastlogin'] = date('Y-m-d H:i:s');
                $account->update($acc,'id='.$acc['id']);
                $this->f3->reroute('/dashboard');
            } else {
                $this->f3->set('email', $email);
                $this->f3->set('errors', array(array('Login fail, wrong username or password')));
                echo Template::instance()->render('index.html');
            }
        } else {
            $this->f3->set('email', $email);
            $this->f3->set('errors', $v->errors());
            echo Template::instance()->render('index.html');
        }
    }



}
