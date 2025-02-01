<?php
    class jwtApiaAuth { // autenticar solicitudes HTTP utilizando JWT
        public function run($request, $res) {
             //encabezado presente y correcto
            $auth_header = $_SERVER['HTTP_AUTHORIZATION'];
            $auth_header = explode(' ', $auth_header);
            if(count($auth_header) != 2) {
                return;
            }
            if($auth_header[0] != 'Bearer') {
                return;
            }
            $jwt = $auth_header[1];
            $res->user = validateJWT($jwt); // valida el token para auth al user
        }
    }
