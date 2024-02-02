<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alunos".
 *
 * @property int $id
 * @property string $nome
 * @property int|null $turmaId
 *
 * @property Turma $turma
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alunos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'turmaId'], 'required'],
            [['turmaId'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['turmaId'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::class, 'targetAttribute' => ['turmaId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'turmaId' => 'Turma ID',
        ];
    }

    /**
     * Gets query for [[Turma]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma::class, ['id' => 'turmaId']);
    }
}
