<?php

use yii\db\Migration;

/**
 * Handles the creation of table `guestbook`.
 */
class m180701_173614_create_guestbook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
   $this->createTable('guestbook', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(),
            'browser' => $this->string(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'homepage' => $this->string(),
            'message' => $this->text()->notNull(),
            'image' => $this->string(),
            'file' => $this->string()
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('guestbook');
    }
}
