<style>
    form {
        padding: 1rem;
    }
</style>
<?php
$obj = $obj[0];
?>
<form method="post">
    <div class="mb-3">
        Stagiair <?= $selectStudent ?>
    </div>
    <div class="mb-3">
        Stagebedrijf <?= $selectCompany ?>
    </div>
    <div class="mb-3">
        <label class="form-label" for="mandatoryHours">Benodigde aantal uren</label>
        <input class="form-control" type="number" name="mandatoryHours" id="mandatoryHours" value="<?= $obj['aantal_uren_nodig'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label" for="approvedHours">Goedgekeurde uren</label>
        <input class="form-control" type="number" name="approvedHours" id="approvedHours" value="<?= $obj['aantal_uren_goedgekeurd'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label" for="startDate">Startdatum</label>
        <input class="form-control" type="date" name="startDate" id="startDate" value="<?= $obj['start_datum'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label" for="endDate">Einddatum</label>
        <input class="form-control" type="date" name="endDate" id="endDate" value="<?= $obj['eind_datum'] ?>">
    </div>
    <div class="mb-3">
        Praktijkopleider <?= $selectSupervisor ?>
    </div>
    <div class="mb-3">
        BPV-Docent <?= $selectSchoolSupervisor ?>
    </div>
    <div class="mb-3">
        Ouder <?= $selectParent ?>
    </div>
    <div class="mb-3">
        Schoolmentor <?= $selectTeacher ?>
    </div>
    <div class="mb-3">
        Schoolmentor <?= $selectSchoolAccount ?>
    </div>
    <div class="mb-3">
        Vertrouwenspersoon <?= $selectHR ?>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="finished" id="finished" class="form-check-input" <?= $obj['is_afgerond'] === 1 ? 'checked' : '' ?>>
        <label for="finished" class="form-check-label">Is afgerond</label>
    </div>
    <input value="Submit" type="submit" name="submit" class="btn btn-primary">
</form>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>