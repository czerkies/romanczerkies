    <nav>
      <ul>
<?php if ($hub) foreach ($hub as $val): ?>
        <li>
          <a href="//<?= $val['href']; ?>" title="<?= $val['title']; ?>"><?= $val['value']; ?></a>
        </li>
<?php endforeach; ?>
        <li>
          <label for="msg" title="Contacter">Contact</label>
        </li>
      </ul>
    </nav>
    <form method="post">
      <?php $functions->fieldsFormInput('rbt'); ?>
      <div>
        <?php $functions->fieldsFormTextarea('msg', TRUE, $required, FALSE, array('title' => 'Votre message', 'placeholder' => $post)); ?>
      </div>
      <div>
        <?php $functions->fieldsFormInput('', 'submit', FALSE, FALSE, 'Envoyer', array('title' => 'Envoyer votre message')); ?>
      </div>
    </form>
