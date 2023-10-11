<?php
use yii\bootstrap5\Progress;
use app\models\Project;

?>
<div class="row">
    <div class="accordion" id="accordionExample">

        <?php
        foreach ($projects as $project):
            $tasks = $project->tasks;
            $progress = $project->getProgress();
            if ($progress == 100) {
                $color = 'bg-success';
            } else if ($progress > 50) {
                $color = 'bg-warning';
            } else {
                $color = 'bg-danger';
            }
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id='heading<?= $project->id ?>'></h2>
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target='#collapse<?= $project->id ?>' aria-expanded="false"
                    aria-controls='collapse<?= $project->id ?>'>
                    <div class="col-1">
                        <?= $project->name ?>
                    </div>
                    <div class="col-9">
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow='33%'
                            aria-valuemin="0" aria-valuemax="100">
                            <div class='progress-bar <?= $color ?>' style='width:  <?= $progress ?>%;'>
                                <?= $progress ?>%
                            </div>
                        </div>
                    </div>

                </button>
                </h2>
                <div id='collapse<?= $project->id ?>' class="accordion-collapse collapse hide"
                    aria-labelledby='heading<?= $project->id ?>'>
                    <div class="accordion-body">
                        <?php
                        foreach ($tasks as $task):
                            $progress_task = $task->getProgress();

                            if ($progress_task == 100) {
                                $color_t = 'bg-success';
                            } else if ($progress_task > 50) {
                                $color_t = 'bg-warning';
                            } else {
                                $color_t = 'bg-danger';
                            }
                            ?>
                            <div class="row">
                                <div class="col-1">
                                    <?= $task->name ?>
                                </div>
                                <div class="col-9">
                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow='33%'
                                        aria-valuemin="0" aria-valuemax="100">
                                        <div class='progress-bar <?= $color_t ?>' style='width:  <?= $progress_task ?>%;'>
                                            <?= $progress_task ?>%
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $reports = $task->reports;
                                foreach ($reports as $report): ?>
                                    <?= $report->name ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>