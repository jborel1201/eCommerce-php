<script src="script/dateTime.js"></script>

<div class="row justify-content-center">
    <div class="col col-md-6">
        <h1>compte client</h1>

        <div class="alert alert-danger" style="display:<?= $errors ? 'block' : 'none' ?>">
            <?= $errors ?>

        </div>

        <form method="post" action="index.php?page=verifClient">

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control">
            </div>


            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" class="form-control">
            </div>


            <div class="form-group">
                <label>Adresse</label>
                <input type="text" name="adresse" class="form-control">
            </div>

            <div class="form-group">
                <label>Date de naissance</label>
                <input type="text" name="dateNaissance" class="form-control" id="datepicker">
            </div>

            <div class="form-group">
                <button type="submit"
                        class="btn btn-primary btn-block"
                        name="submit" value="">
                    Connexion
                </button>
            </div>

        </form>
    </div>