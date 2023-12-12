<!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark  py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-3 p-lg-0">
                <a href="{{ route('kezdolap') }}" class="nav-item nav-link ">Kezdőlap</a>
                <a href="{{ route('felmeres') }}" class="nav-item nav-link">Felmérésről</a>
                <a href="{{ route('adatkezeles') }}" class="nav-item nav-link">Adatkezelés</a>
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kérdőívek</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ route('tanulobejelentkezes') }}" class="dropdown-item">Tanulói kérdőív</a>
                        <a href="{{ route('fejlesztes') }}" class="dropdown-item">Szülői kérdőív</a>
                        <a href="{{ route('fejlesztes') }}" class="dropdown-item">Oktatói kérdőív</a>
                        <a href="{{ route('kolitanulobejelentkezes') }}" class="dropdown-item">Kollégiumi kérdőív</a>




                    </div>
                </div>
                <a href="{{ Route('elerhetoseg') }}" class="nav-item nav-link">Elérhetőség</a>
               
                @auth
                    
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Vezetoseg</a>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{ route('tanaroklekerdezese') }}" class="dropdown-item">Tanári eredmények</a>
                        <a href="{{ route('tanaroklekerdezese3') }}" class="dropdown-item">Tanári eredmények diagrammal</a>
                        <a href="{{ route('aktualiskitoltes') }}" class="dropdown-item">Aktuális kitöltés</a>
                        <a href="{{ route('osztalyvalaszto') }}" class="dropdown-item">Osztályonkénti kitöltés</a>
                        <a href="{{ route('kerdesek') }}" class="dropdown-item">Kérdések szerkesztése</a>
                        <a href="{{ route('kulsoadatok') }}" class="dropdown-item">Külső adatok importálása</a>
                        <a href="{{ route('kulsoadatokexport') }}" class="dropdown-item">Adatok exportálása</a>
                        <a href="{{ route('adattorles') }}" class="dropdown-item">Adatok Törlése</a>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">Profiloldal</a>
                    </div>
                </div>
                @endauth
            </div>
            <a href="http://gepeszeti.hu/" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Gépészeti weboldala</a>
            
        </div>
    </nav>
    <!-- Navbar End -->