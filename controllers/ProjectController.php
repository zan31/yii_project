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
        $projects = Project::find()->all();

        return $this->render('index', [
            'projects' => $projects,
        ]);
    }
}