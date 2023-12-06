<!--**********************************
            Sidebar start
        ***********************************-->
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="/" class="" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Tableau de bord</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-table"></i>
                    <span class="nav-text">Mes articles</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('produits.index') }}">Liste</a></li>
                    <li><a href="{{ route('produits.create') }}">Enregistrer</a></li>

                </ul>

            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-check"></i>
                    <span class="nav-text">Mes Ventes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('commandes.index') }}">Liste</a></li>
                    <li><a href="{{ route('commandes.create') }}">Enregistrer</a></li>

                </ul>

            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-file-alt"></i>
                    <span class="nav-text">Mes commandes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('livraisons.index') }}">Liste</a></li>
                    <li><a href="{{ route('livraisons.create') }}">Enregistrer</a></li>

                </ul>

            </li>

        </ul>


        <div class="copyright">
            <p><strong>CDPS</strong> © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by Dreykovic</p>
        </div>
    </div>
</div>
<!--**********************************
          Sidebar end
      ***********************************-->
