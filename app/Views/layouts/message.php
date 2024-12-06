<?php if ($errors = \Core\Session::getFlash('errors')): ?>
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            <?php 
            if (is_array($errors)) {
                foreach ($errors as $error):
                    echo '<li>'. htmlspecialchars($error) .'</li>';
                endforeach;
            } else {
                echo '<li>'. htmlspecialchars($errors) .'</li>';
            }
            ?>
        </ul>
    </div>
<?php endif; ?>
