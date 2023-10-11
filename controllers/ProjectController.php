<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Task;
use app\models\Project;
use app\models\Report;


class ProjectController extends Controller
{
    public function actionIndex()
    {
        $tasks = Task::find()->all();
        $projects = Project::find()->all();
        $reports = Report::find()->all();

        return $this->render('index', [
            'tasks' => $tasks,
            'projects' => $projects,
            'reports' => $reports,
        ]);
    }
}