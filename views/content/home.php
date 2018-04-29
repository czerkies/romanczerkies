    <nav class="navigation">
      <ul class="navigation-list">
<?php if ($hub) foreach ($hub as $val): ?>
        <li class="navigation-list--item">
          <a href="//<?= $val['href']; ?>" class="navigation-list--item---link" title="<?= $val['title']; ?>"><?= $val['value']; ?></a>
        </li>
<?php endforeach; ?>
        <li class="navigation-list--item">
          <label for="msg" class="navigation-list--item---label" title="Contacter">Contact</label>
        </li>
      </ul>
    </nav>
    <form method="post" class="form">
      <?= $functions->fieldsFormInput('rbt'); ?>
      <div class="form-message">
        <?= $functions->fieldsFormTextarea('msg', TRUE, $required, FALSE, ['class' => 'form-message--input', 'title' => 'Votre message', 'placeholder' => $post]); ?>
      </div>
      <div class="form-send">
        <?= $functions->fieldsFormInput('', 'submit', FALSE, FALSE, 'Envoyer', ['class' => 'form-send--input', 'title' => 'Envoyer votre message']); ?>
      </div>
    </form>
