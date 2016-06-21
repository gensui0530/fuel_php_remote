<?php
/**
 * Created by PhpStorm.
 * User: kimrion
 * Date: 2016/06/21
 * Time: 14:15
 */
?>
<h1>title</h1>
<div class="welcome_user">Welcome</div>
<?php echo Asset::img('logo.png',array('style'=>'height:auto;width:500px;','alt'=>'タイトル画像')); ?>
<p>
    <?php echo Html::anchor('welcome','トップへ'); ?>
</p>


<?php Asset::add_path('assets/upload/', 'img'); ?>
<?php echo Asset::img('user_img.png',array('style'=>'height:auto;width:200px;','alt'=>'タイトル画像')); ?>
