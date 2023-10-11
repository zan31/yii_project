<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tom_project".
 *
 * @property int $id
 * @property string|null $name
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tom_project';
    }
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['project_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}