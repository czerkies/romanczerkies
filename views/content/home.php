    <nav>
      <ul>
        <?php foreach ($hub as $val): ?><li>
          <a href="//<?= $val['href']; ?>" title="<?= $val['title']; ?>" target="_blank"><?= $val['value']; ?></a>
        </li>
        <?php endforeach; ?><li>
          <label for="1" title="Keep in touch">Contact</label>
        </li>
      </ul>
    </nav>
    <form method="post">
      <?php $functions->fieldsFormInput(2); ?>
      <div>
        <?php $functions->fieldsFormTextarea(1, TRUE, TRUE, FALSE, array('minlength' => 5, 'placeholder' => $post)); ?>
      </div>
      <div>
        <?php $functions->fieldsFormInput('', 'submit', FALSE, FALSE, 'Envoyer'); ?>
      </div>
    </form>
