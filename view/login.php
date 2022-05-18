<style>
  form {
    padding: 1rem;
  }
</style>
<form method="post" action="<?= SERVER_URL . '/Login/checkLogin/'?>" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" id="email" class="form-control" required>
        <div class="invalid-feedback">
            Voer een geldig email adres in.
        </div>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Wachtwoord</label>
        <input name="password" type="password" id="password" class="form-control" required>
        <div class="invalid-feedback">
            Voer uw wachtwoord in!
        </div>
    </div>
  <input type="submit" name="submit" value="Inloggen" class="btn btn-primary">
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