<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turma".
 *
 * @property int $id
 * @property string $nomeTurma
 *
 * @property Aluno[] $alunos
 */
class Turma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'turma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomeTurma'], 'required'],
            [['nomeTurma'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomeTurma' => 'Nome Turma',
        ];
    }

    /**
     * Gets query for [[Alunos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::class, ['turmaId' => 'id']);
    }
}
