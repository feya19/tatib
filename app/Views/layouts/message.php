<?php if ($errors = \Core\Session::getFlash('errors')): ?>
    <div class="alert alert-danger" role="alert">
        <?php if (is_array($errors)) { ?>
            <ul class="mb-0">

            <?php foreach ($errors as $error):
                    echo '<li>'. htmlspecialchars($error) .'</li>';
                endforeach; ?>
            </ul>
        <?php } else {
            echo '<span>'. htmlspecialchars($errors) .'</span>';
        }?>
    </div>
<?php endif; ?>
