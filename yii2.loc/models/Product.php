<?php
namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord{
    public function rules() {
        return [
          [['first_name','last_name','company_name','address','city','county','state','zip','phone1','phone2','email','web'],'required']
        ];
    }
}
?>