<form method="post">
    Stagiair id: <?= $selectStudent ?>
    <br>
    <br>
    Stagebedrijf id: <?= $selectCompany ?>
    <br>
    <br>
    Benodigde aantal uren: <input type="number" name="mandatoryHours">
    <br>
    <br>
    Goedgekeurde uren: <input type="number" name="approvedHours">
    <br>
    <br>
    Startdatum: <input type="date" name="startDate">
    <br>
    <br>
    Eindatum: <input type="date" name="endDate">
    <br>
    <br>
    Is afgerond: <input type="checkbox" name="finished">
    <br>
    <br>
    Stagebegeleider id: <?= $selectSchoolSupervisor ?>
    <br>
    <br>
    Ouder id: <?= $selectParent ?>
    <br>
    <br>
    Schoolmentor id: <?= $selectTeacher ?>
    <br>
    <br>
    <input value="Submit" type="submit" name="submit">
</form>