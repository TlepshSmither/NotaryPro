<?php
namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class UploadForm extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}