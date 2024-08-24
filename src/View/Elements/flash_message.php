<?php if (isset($message) && $message): ?>
    <div class="alert alert-<?= $message['type'] ?> text-center" role="alert">
        <?= $message['text'] ?>
    </div>
<?php endif; ?>