<style>
    .inputs {
        margin-bottom: 1rem;
    }
</style>
<form method="post">
    <div class="inputs">
        Stagiair id: <?= $selectStudent ?>
    </div>
    <div class="inputs">
        Stagebedrijf id: <?= $selectCompany ?>
    </div>
    <div class="inputs">
        Benodigde aantal uren: <label>
            <input type="number" name="mandatoryHours" required>
        </label>
    </div>
    <div class="inputs">
        Goedgekeurde uren: <label>
            <input type="number" name="approvedHours" required>
        </label>
    </div>
    <div class="inputs">
        Startdatum: <label>
            <input type="date" name="startDate" required>
        </label>
    </div>
    <div class="inputs">
        Eindatum: <label>
            <input type="date" name="endDate" required>
        </label>
    </div>
    <div class="inputs">
        Is afgerond: <label>
            <input type="checkbox" name="finished">
        </label>
    </div>
    <div class="inputs">
        Praktijkbegeleider id: <?= $selectSupervisor ?>
    </div>
    <div class="inputs">
        Ouder id: <?= $selectParent ?>
    </div>
    <div class="inputs">
        Schoolmentor id: <?= $selectTeacher ?>
    </div>
    <div class="inputs">
        Schoolmentor id: <?= $selectSchoolAccount ?>
    </div>
    <div class="inputs">
        Vertrouwenspersoon id: <?= $selectHR ?>
    </div>
    <input value="Submit" type="submit" name="submit">
</form>