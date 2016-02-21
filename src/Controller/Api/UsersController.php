<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class UsersController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'name', 'description'
        ],
        'sortWhitelist' => [
            'id', 'name', 'description'
        ]
    ];

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['add', 'token', 'facebook', 'google', 'upload']);
        //$this->requestData = $this->request->input('json_decode');
        //$this->Auth->allow();
    }

    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function add() {
        $this->Crud->on('afterSave', function(Event $event) {
            if ($event->subject->created) {
                $this->set('data', [
                    'id' => $event->subject->entity->id,
                    'token' => JWT::encode(
                            [
                        'sub' => $event->subject->entity->id,
                        'exp' => time() + 604800
                            ], Security::salt())
                ]);
                $this->Crud->action()->config('serialize.data', 'data');
            }
        });
        return $this->Crud->execute();
    }

    public function token() {
        $user = $this->Auth->identify();
        if (!$user) {
            throw new UnauthorizedException('Invalid username or password');
        }

        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' => time() + 1800
                        ], Security::salt()),
                'user_id' => $user['id']
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

    public function facebook() {
        $data = $this->request->input('json_decode');
        $user = $this->Users->find('all')->where(['Users.provider' => 'facebook', 'Users.provider_uid' => $data->clientId])->first();

        if (!$user) {
            throw new UnauthorizedException('Invalid username or password');
        }
        $user = $user->toArray();
        $this->Auth->setUser($user);
        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' => time() + 1800
                        ], Security::salt()),
                'user_id' => $user['id']
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

    public function google() {
        $data = $this->request->input('json_decode');
        $user = $this->Users->find('all')->where(['Users.provider' => 'facebook', 'Users.provider_uid' => $data->clientId])->first();

        if (!$user) {
            throw new UnauthorizedException('Invalid username or password');
        }
        $this->Auth->setUser($user);
        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' => time() + 1800
                        ], Security::salt()),
                'user_id' => $user['id']
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

    public function upload() {
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        die('Here');
    }

}
