<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

;

class SessionsController extends AppController {

    public function initialize() {
        parent::initialize();
    }

    public function ping() {
        $this->set([
            'success' => true,
            '_serialize' => ['success']
        ]);
    }

    public function destroy() {
        $this->Auth->logout();
        $this->set([
            'success' => true,
            '_serialize' => ['success']
        ]);
    }

}
