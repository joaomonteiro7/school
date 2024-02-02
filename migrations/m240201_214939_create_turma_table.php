<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%turma}}`.
 */
class m240201_214939_create_turma_table extends Migration
{
/**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%turma}}', [
            'id' => $this->primaryKey(),
            'nomeTurma' => $this->string()->notNull(),
        ], 'ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%turma}}');
    }
}
