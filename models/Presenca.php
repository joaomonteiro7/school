<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presencas".
 *
 * @property int $id
 * @property int|null $alunoId
 * @property string|null $data
 *
 * @property Aluno $aluno
 */
class Presenca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presencas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alunoId'], 'integer'],
            [['data'], 'safe'],
            [['alunoId'], 'exist', 'skipOnError' => true, 'targetClass' => Aluno::class, 'targetAttribute' => ['alunoId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alunoId' => 'Aluno ID',
            'data' => 'Data',
        ];
    }

    /**
     * Gets query for [[Aluno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Aluno::class, ['id' => 'alunoId']);
    }
}
