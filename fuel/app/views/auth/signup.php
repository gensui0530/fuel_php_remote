<div class="ctn-main">
    <section class="ctn-form">
        <h2>Sign Up !!</h2>

        <?php
        if (!empty($error)) :
        ?>
            <ul class="area-error-msg">
                <?php
                foreach ($error as $key => $val) :
                ?>
                    <li><?= $val ?></li>
                <?php
                endforeach;
                ?>
            </ul>
        <?php
        endif;
        ?>
        <?= $signupform ?>
    </section>
</div>