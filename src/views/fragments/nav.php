
    <a class="navbar-brand" href="index.php?page=home">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=achat&cat=eaux">Eaux<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=achat&cat=sodas">Sodas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=achat&cat=bieres">Bières</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=achat&cat=vins">Vins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=achat&cat=spiritueux">Spiritueux</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=achat&cat=champagnes">Champagnes</a>
            </li>
        </ul>
<div style="display:<?= (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getPseudo()=='admin')? 'block' : 'none' ?>">
        <div class="collapse navbar-collapse" id="navbarNavDropdown" >
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: red">
                        Stock
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?page=appro">Approvisionnement</a>
                        <a class="dropdown-item" href="index.php?page=gestionProduit">Gestion produits</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: red">
                        Statistiques et inventaires
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="">Inventaire</a>
                        <a class="dropdown-item" href="">Statistiques</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </div>

    <div>
        <form class="form-inline md-form form-sm mt-0" method="post" action="index.php?page=recherche">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search" name="recherche">
        </form>
    </div>



