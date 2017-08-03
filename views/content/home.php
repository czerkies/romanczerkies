    <nav>
      <ul>
<?php if ($hub) foreach ($hub as $val): ?>
        <li>
          <a href="//<?= $val['href']; ?>" title="<?= $val['title']; ?>" target="_blank"><?= $val['value']; ?></a>
        </li>
<?php endforeach; ?>
        <li>
          <label for="contact" title="Contacter">Contact</label>
        </li>
      </ul>
    </nav>
    <form method="post">
      <?php $functions->fieldsFormInput('rbt'); ?>
      <div>
        <?php $functions->fieldsFormTextarea('contact', TRUE, $required, FALSE, array('title' => 'Votre message', 'placeholder' => $post)); ?>
      </div>
      <div>
        <?php $functions->fieldsFormInput('', 'submit', FALSE, FALSE, 'Envoyer', array('title' => 'Envoyer votre message')); ?>
      </div>
    </form>
