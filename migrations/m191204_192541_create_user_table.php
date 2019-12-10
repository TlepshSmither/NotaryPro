<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191204_192541_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(100),
            'password' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {

    }
}
