<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%alunos}}`.
 */
class m240201_214957_create_alunos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%alunos}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'turmaId' => $this->integer(),
        ], 'ENGINE=InnoDB');

        // Adiciona a chave estrangeira para a coluna turmaId
        $this->addForeignKey(
            'fk-alunos-turmaId',
            '{{%alunos}}',
            'turmaId',
            '{{%turma}}',
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
        $this->dropForeignKey('fk-alunos-turmaId', '{{%alunos}}');

        // Depois remove a tabela
        $this->dropTable('{{%alunos}}');
    }
}
