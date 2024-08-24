<?php if (isset($errors) && $errors): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?= implode(", <br>", $errors) ?>
    </div>
<?php endif; ?>