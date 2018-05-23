<li>
    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>">
        <?= $category['name']?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>