<div class="row justify-content-center">
    <div class="col col-md-6">
        <h1>Déjà membre</h1>

        <div class="alert alert-danger" style="display:<?= $errors ? 'block' : 'none' ?>">
            <?= $errors ?>

        </div>

        <form method="post" action="index.php?page=verifLogin">
            <div class="form-group">
                <label>Identifiant</label>
                <input type="text" name="login" class="form-control"
                       value="<?= $login ?? "" ?>">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="pwd" class="form-control">
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
    <div class="col col-md-6">
        <h1>Nouveau</h1>

        <div class="alert alert-danger" style="display:<?= $errorsNew ? 'block' : 'none' ?>">
            <?= $errorsNew ?>
        </div>

        <form method="post" action="index.php?page=createUser">
            <div class="form-group">
                <label>Identifiant</label>
                <input type="text" name="login" class="form-control">

            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="pwd" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirmation</label>
                <input type="password" name="verifPwd" class="form-control">
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
</div>