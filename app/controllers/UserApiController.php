<?php
    require_once './app/models/UserApiModel.php';
    require_once './app/controllers/ApiController.php';
    require_once './libs/jwt.php';

    class UserApiController extends ApiController {
        private $model;

        public function __construct() {
            parent::__construct();
            $this->model = new UserApiModel();
        }
        public function getToken() {
            $auth_header = $_SERVER['HTTP_AUTHORIZATION'];
            $auth_header = explode(' ', $auth_header);
            if(count($auth_header) != 2 || $auth_header[0] != 'Basic') {
                return $this->view->response(['error' => 'Datos incorrectos.'], 400);
            }
            $user_pass = base64_decode($auth_header[1]);
            $user_pass = explode(':', $user_pass);
            $user = $this->model->getUserByEmail($user_pass[0]);
            if($user == null || !password_verify($user_pass[1], $user->password)) {
                return $this->view->response(['error' => 'Datos incorrectos.'], 400);
            }
            $token = createJWT(array(
                'sub' => $user->id_usuario,
                'email' => $user->email,
                'role' => 'admin',
                'iat' => time(),
                'exp' => time() + 3600,
            ));
            return $this->view->response(['token' => $token], 200);
        }
    }