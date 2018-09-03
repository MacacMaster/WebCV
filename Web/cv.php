<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
// notes du prof php framework
   require_once("action/CVAction.php");   
    $action = new CVAction();
    $action->setRedirect("token");
    $action->execute();   
    $jobs = $action->getJobsData();   
    require_once("partial/header.php");
?>
<div class="contentcontainer">
<h1>CV</h1>
<?php
    // for each in array of jobs
    foreach($jobs as &$job)
    {
?>
    <div class="job">
    <h3 class="title"><?= $job['job_year']; ?> - <?= $job['job_name']; ?> </h3>
    <h4 class="title"><?= $job['job_employer']; ?></h4>

    <p><?= $job['contact_name']; ?> </p>
    <p><?= $job['contact_poste']; ?> </p>
    <p><?= $job['contact_email']; ?> </p>
    <p><?= $job['contact_phone']; ?> </p>

    <p><?= $job['job_description']; ?>
    <p><img src="<?= $job['job_image']; ?>" alt="image job">
    </div>
<?php
}
?>
</div>
<?php
require_once("partial/footer.php");