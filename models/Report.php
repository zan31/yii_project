<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tom_report".
 *
 * @property int $id
 * @property int $task_id
 * @property string $name
 * @property int $percent_done
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tom_report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'task_id', 'name', 'percent_done'], 'required'],
            [['id', 'task_id', 'percent_done'], 'integer'],
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
            'task_id' => 'Task ID',
            'name' => 'Name',
            'percent_done' => 'Percent Done',
        ];
    }
}
