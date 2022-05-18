<style>
    form {
        padding: 1rem;
    }
</style>
<form method="post">
    <div class="mb-3">
        Stagiair id <?= $selectStudent ?>
    </div>
    <div class="mb-3">
        Stagebedrijf id <?= $selectCompany ?>
    </div>
    <div class="mb-3">
        <label class="form-label" for="mandatoryHours">Benodigde aantal uren</label>
        <input class="form-control" type="number" name="mandatoryHours" id="mandatoryHours" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="approvedHours">Goedgekeurde uren</label>
        <input class="form-control" type="number" name="approvedHours" id="approvedHours" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="startDate">Startdatum</label>
        <input class="form-control" type="date" name="startDate" id="startDate" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="endDate">Eindatum</label>
        <input class="form-control" type="date" name="endDate" id="endDate" required>
    </div>
    <div class="mb-3">
        <input type="checkbox" name="finished" id="finished" class="form-check-input">
        <label for="finished" class="form-check-label">Is afgerond</label>
    </div>
    <div class="mb-3">
        Praktijkbegeleider id: <?= $selectSupervisor ?>
    </div>
    <div class="mb-3">
        Stagebegeleider id: <?= $selectSchoolSupervisor ?>
    </div>
    <div class="mb-3">
        Ouder id: <?= $selectParent ?>
    </div>
    <div class="mb-3">
        Schoolmentor id: <?= $selectTeacher ?>
    </div>
    <div class="mb-3">
        Schoolmentor id: <?= $selectSchoolAccount ?>
    </div>
    <div class="mb-3">
        Vertrouwenspersoon id: <?= $selectHR ?>
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