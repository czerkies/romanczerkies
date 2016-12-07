<nav>
  <ul>
    <?php foreach ($hub as $key => $val) : ?><li>
      <a href="<?= $val['href']; ?>" title="<?= $val['title']; ?>"><?= $key; ?></a>
    </li>
    <?php endforeach; ?><li>
      <label for="1">Contact</label>
    </li>
  </ul>
</nav>
<form method="post">
  <?php $functions->fieldsFormInput(1); ?>
  <div>
    <?php $functions->fieldsFormTextarea(2, TRUE, TRUE); ?>
  </div>
  <div>
    <?php $functions->fieldsFormInput('', 'submit', FALSE, FALSE, 'Envoyer'); ?>
  </div>
</form>
