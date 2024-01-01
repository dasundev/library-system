<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['message_type']; ?> fade show" role="alert">
        <?= $_SESSION['message']; ?>
    </div>

    <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
<?php endif; ?>