<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tom_task".
 *
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tom_task';
    }
    public function getReports()
    {
        return $this->hasMany(Report::class, ['task_id' => 'id']);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'name', 'start_date', 'end_date'], 'required'],
            [['id', 'project_id'], 'integer'],
            [['name'], 'string'],
            [['start_date', 'end_date'], 'safe'],
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
            'project_id' => 'Project ID',
            'name' => 'Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }
}