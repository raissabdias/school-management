<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - School Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
        body {
            height: 100vh;
        }

        .container {
            height: 100%;
        }
    </style>
    <div class="container">
        <div class="row h-100">
            <div class="d-flex align-items-center justify-content-center">
                <div class="card bg-body-tertiary text-center p-4" style="width: 30rem;">
                    Login - School Management

                    <form class="mt-4" method="POST">
                        <!-- Exibir erros do formulário -->
                        <?php include dirname(__DIR__) . '/Elements/errors.php'; ?>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="name@example.com" value="<?= $form['email'] ?? null ?>" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Senha" value="<?= $form['password'] ?? null ?>" required>
                            <label for="password">Senha</label>
                        </div>
                        <div class="mt-4 d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>