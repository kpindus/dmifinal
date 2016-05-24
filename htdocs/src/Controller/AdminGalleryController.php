<?php

namespace App\Controller;


use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Symfony\Component\Console\Exception\RuntimeException;

class AdminGalleryController extends AdminController
{
    public function index()
    {
        $subTitle = "Gallery";
        $photoTable = TableRegistry::get('photo');
        $photo = $photoTable->find('all')->orderDesc(true);
        $this->set(compact('subTitle', 'photo'));
    }

    public function uploadfiles()
    {
        $targetDir = "../webroot/img/gallery/";
        $validFormats = ['jpg', 'png', 'gif', 'jpeg', 'jpe'];
        $validServerFormats = ['image/png', 'image/jpeg', 'image/jpeg', 'image/jpeg', 'image/gif'];
        foreach ($_FILES['uploadFile']['type'] as $t => $tName) {
            if (!in_array($_FILES['uploadFile']['type'][$t], $validServerFormats)) {
                throw new RuntimeException('Wrong file type');
            }
        }
        foreach ($_FILES['uploadFile']['name'] as $f => $name) {
            if ($_FILES['uploadFile']['error'][$f] == 4) {
                throw new RuntimeException('Internal server error!');
            }
            if ($_FILES['uploadFile']['error'][$f] == 0) {
                if (!in_array(strtolower(pathinfo($name, PATHINFO_EXTENSION)), $validFormats)) {
                    throw new RuntimeException("$name is not a valid format");
                } else {
                    $imageFileType = pathinfo($name, PATHINFO_EXTENSION);
                    $name = md5($name . time()) . '.' . $imageFileType;
                    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$f], $targetDir . $name)) {
                        if (!$this->savePhotoNameInDataBase($name)) {
                            throw new RuntimeException("Can't save photo in database!");
                        }
                        $this->resizeImage($targetDir . $name, $name);
                    }
                }
            }
        }

        $this->redirect(['controller' => 'AdminGallery', 'action' => 'index']);
    }

    private function resizeImage($file, $name){
        $MAX_WIDTH =  270;
        $MAX_HEIGHT = 250;
        $targetDir = "../webroot/img/gallery/preview/";

        list($origWidth, $origHeight) = getimagesize($file);
        $width = $origWidth;
        $height = $origHeight;

        if ($width > $MAX_WIDTH) {
            $height = ($MAX_WIDTH / $width) * $height;
            $width = $MAX_WIDTH;
        }

        if ($height > $MAX_HEIGHT) {
            $width = ($MAX_HEIGHT / $height) * $width;
            $height = $MAX_HEIGHT;
        }

        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($file);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0,
            $width, $height, $origWidth, $origHeight);

        imagejpeg($image_p, $targetDir . $name, 100);

    }

    private function savePhotoNameInDataBase($photoName)
    {
        $photoTable = TableRegistry::get('photo');
        $newPhoto = $photoTable->newEntity();
        $newPhoto->photo_name = $photoName;
        if ($photoTable->save($newPhoto)) {
            return true;
        }
        return false;
    }

    public function delete($photoId)
    {
        if (is_null($photoId) || !(int)$photoId) {
            throw new NotFoundException('New with this id not found');
        }
        $photoTable = TableRegistry::get('photo');
        $photo = $photoTable->get($photoId);
        if (!is_null($photo)) {
            if ($photoTable->delete($photo, ['id' => $photoId])) {
                if ($this->deletePhotoFromLocalStorage($photo)) {
                    $this->redirect(['controller' => 'AdminGallery', 'action' => 'index']);
                } else {
                    throw new NotFoundException('Photo was not found on local storage');
                }
            }
        } else {
            throw new NotFoundException('Image not found');
        }
    }

    private function deletePhotoFromLocalStorage($photo)
    {
        $result = false;
        $galleryDir = "../webroot/img/gallery/";
        $previewDir = "../webroot/img/gallery/preview/";
        $file = $galleryDir . $photo->photo_name;
        $previewFile = $previewDir . $photo->photo_name;

        if (file_exists($file)) {
            if (unlink($file) && unlink($previewFile)) {
                $result = true;
            }
        }

        if(file_exists($previewFile)){
            if (unlink($previewFile)) {
                $result = true;
            }
        }

        return $result;
    }
}