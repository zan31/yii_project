<?php

namespace app\models;

use Yii;
use yii\db\Query;

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

    public function getProgress()
    {
        $query = new Query();
        $query->select([
            'SUM(tr.percent_done) AS progress',
            'COUNT(DISTINCT tt.id) AS total_tasks',
        ])
            ->from(['tp' => 'tom_project'])
            ->leftJoin(['tt' => 'tom_task'], 'tp.id = tt.project_id')
            ->leftJoin(['tr' => 'tom_report'], 'tt.id = tr.task_id')
            ->where(['tp.id' => $this->id]);

        $result = $query->one();

        if ($result['total_tasks'] == 0) {
            return 0;
        }

        return round(($result['progress'] / $result['total_tasks']), 2);
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