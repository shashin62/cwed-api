<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class FilesController extends AppController {

    public function initialize() {
        parent::initialize();
    }

    public function upload() {
        if (!empty($this->request->data)) {
            if ($this->request->data['file']['error'] === 0) {
                $file = $this->request->data['file']; //put the data into a var for easy use
                //$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                switch ($file['type']) {
                    case 'image/gif' : $ext = 'gif';
                        break;
                    case 'image/png' : $ext = 'png';
                        break;
                    case 'image/jpeg' : $ext = 'jpg';
                        break;
                    case 'application/pdf' : $ext = 'pdf';
                        break;

                    default :
                        //throw new ApplicationException('The file uploaded was not a valid image file.');
                        break;
                }

                $arr_ext = array('png', 'jpg', 'jpeg', 'gif', 'pdf'); //set allowed extensions
                $setNewFileName = time() . "_" . rand(000000, 999999);

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/upload/avatar/' . $setNewFileName . '.' . $ext);

                    //prepare the filename for database entry 
                    $imageFileName = $setNewFileName . '.' . $ext;
                }
            }
            echo "<pre>";
            print_r($imageFileName);
            echo "</pre>";
            die('Here');

//            $getFormvalue = $this->Users->patchEntity($particularRecord, $this->request->data);
//
//            if (!empty($this->request->data['upload']['name'])) {
//                $getFormvalue->avatar = $imageFileName;
//            }
//
//
//            if ($this->Users->save($getFormvalue)) {
//                $this->Flash->success('Your profile has been sucessfully updated.');
//                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
//            } else {
//                $this->Flash->error('Records not be saved. Please, try again.');
//            }
        }
        die('Here');
    }

}
