<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%presencas}}`.
 */
class m240201_220618_create_presencas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%presencas}}', [
            'id' => $this->primaryKey(),
            'alunoId' => $this->integer(),
            'data' => $this->dateTime(),
        ],'ENGINE=InnoDB');

        // Adiciona a chave estrangeira para a coluna alunoId
        $this->addForeignKey(
            'fk-presencas-alunoId',
            '{{%presencas}}',
            'alunoId',
            '{{%alunos}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Remove a chave estrangeira primeiro
        $this->dropForeignKey('fk-presencas-alunoId', '{{%presencas}}');

        // Depois remove a tabela
        $this->dropTable('{{%presencas}}');
    }
}
