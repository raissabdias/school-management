<?php if (isset($message) && $message): ?>
    <div class="alert alert-success text-center" role="alert">
        <?= $message ?>
    </div>
<?php endif; ?>