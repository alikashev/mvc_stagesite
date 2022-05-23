<style>
    form {
    padding: 1rem;
  }
</style>
<form method="post" action="<?= SERVER_URL . '/Register/registerUser/'?>" novalidate class="needs-validation">
    <div class="mb-3">
        <label for="firstName" class="form-label">Voornaam</label>
        <input name="firstName" type="text" id="firstName" class="form-control" required>
        <div class="invalid-feedback">
            Voer uw voornaam in.
        </div>
    </div>
    <div class="mb-3">
        <label for="infix" class="form-label">Tussenvoegsel</label>
        <input name="infix" type="text" id="infix" class="form-control">
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Achternaam</label>
        <input name="lastName" type="text" id="lastName" class="form-control" required>
        <div class="invalid-feedback">
            Voer uw achternaam in.
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input required name="password" type="password" id="password" class="form-control">
        <div class="invalid-feedback">
            Voer een wachtwoord in.
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input required type="email" name="email" id="email" class="form-control">
        <div class="invalid-feedback">
            Voer een geldig mailadres in.
        </div>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Telefoonnummer</label>
        <input type="tel" name="phone" id="phone" class="form-control" required>
        <div class="invalid-feedback">
            Voer een geldig telefoonnummer in.
        </div>
    </div>
    <div class="mb-3">
        <label for="school" class="form-label">School</label>
        <input type="text" name="school" id="school" class="form-control">
    </div>
    <div class="mb-3">
        <label for="study" class="form-label">Studie</label>
        <input type="text" name="study" id="study" class="form-control">
    </div>
    <input type="submit" name="submit" value="Registreren" class="btn btn-primary">
</form>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
