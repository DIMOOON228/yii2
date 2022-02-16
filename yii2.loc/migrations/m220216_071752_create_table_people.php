<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%people}}`.
 */

class m220216_071752_create_table_people extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
     $this->createTable('{{%people}}',[
        'id' => $this->primaryKey(),
        'first_name'=>$this->string(250),
        'last_name'=>$this->string(250),
        'company_name'=>$this->string(250),
        'address'=>$this->string(250),
        'city'=>$this->string(250),
        'county'=>$this->string(250),
        'state'=>$this->string(250),
        'zip'=>$this->string(250),
        'phone1'=>$this->string(250),
        'phone2'=>$this->string(250),
        'email'=>$this->string(250),
        'web'=>$this->string(250),
     ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%people}}');
    }


}
