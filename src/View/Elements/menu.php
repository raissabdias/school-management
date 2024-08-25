<nav class="navbar navbar-expand-lg bg-body-tertiary px-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            Início
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= isset($controller) && $controller == 'Student' ? 'active' : null ?>" href="/alunos">
                        Alunos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isset($controller) && $controller == 'Class' ? 'active' : null ?>" href="/turmas">
                        Turmas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isset($controller) && $controller == 'Enrollment' ? 'active' : null ?>" href="/matriculas">
                        Matrículas
                    </a>
                </li>
            </ul>
        </div>
        <div class="float-end">
            Olá, <?= $_SESSION['auth']['name'] ?? 'Usuário' ?>
            <a class="link-danger link-offset-2 link-underline-opacity-25 ps-4" href="/logoff">Sair</a>
        </div>
    </div>
</nav>