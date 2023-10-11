<?php
use yii\bootstrap5\Progress;

?>
<?php
foreach ($projects as $project):
    $tasks = $project->tasks;
    ?>
    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse"
        data-bs-target='#project<?= $project->id ?>' aria-expanded="false" aria-controls='project<?= $project->id ?>'>
        <?= $project->name ?>
    </button>
    <?php
    foreach ($tasks as $task): ?>
        <div class="collapse" id='project<?= $project->id ?>'>
            <p class="d-inline-flex gap-1">
                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target='task<?= $task->id ?>'
                    aria-expanded="false" aria-controls='task<?= $task->id ?>'>
                    <?= $task->name ?>
                </button>
            </p>
            <?php
            $reports = $task->reports;
            foreach ($reports as $report): ?>
                <div>
                    <?= $report->name ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
<p class="d-inline-flex gap-1">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Button with data-bs-target
    </button>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the
        user
        activates the relevant trigger.
    </div>
</div>