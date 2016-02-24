<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\ORM\TableRegistry;

class FilesController extends AppController {

    public function initialize() {
        parent::initialize();
    }

    public function upload() {
        if (!empty($this->request->data)) {
            $imageFileName = '';
            if (!empty($this->request->data['file']) && isset($this->request->data['file']['error']) && $this->request->data['file']['error'] === 0) {
                $file = $this->request->data['file']; //put the data into a var for easy use
                $ext = $this->__getFileExtn($file['type']);
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

            $groomsMensTable = TableRegistry::get('GroomsMens');

            if (!empty($this->request->data['params']['id'])) {
                $groomsMen = $groomsMensTable->get($this->request->data['params']['id']); // Return article with id 12
            } else {
                $groomsMen = $groomsMensTable->newEntity();
            }

            $groomsMen->name = $this->request->data['params']['name'];
            $groomsMen->position = $this->request->data['params']['position'];
            $groomsMen->date = $this->request->data['params']['date'];
            $groomsMen->description = $this->request->data['params']['description'];

            if (!empty($imageFileName)) {
                $groomsMen->photo_url = $imageFileName;
            }

            if ($groomsMensTable->save($groomsMen)) {
                // The $article entity contains the id now
                $id = $groomsMen->id;
            } else {
                $id = $groomsMen->id;
            }
        }

        $groomsMan = $groomsMensTable->get($id, [
                    'contain' => []
                ])->toArray();

        // $groomsMan = $groomsMan->toArray();
        //$groomsMan['date'] = $groomsMan['date']->date;

        $this->set([
            'success' => true,
            'groomsMen' => $groomsMan,
            '_serialize' => ['success', 'groomsMen']
        ]);
        //exit;
    }

    private function __getFileExtn($fileType) {
        switch ($fileType) {
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

        return $ext;
    }

}
