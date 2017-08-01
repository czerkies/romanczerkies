<?php
// Template mail 'contact'
$template = '
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>' . H1 . ' | Contact</title>
      <style>
        * {
          font: 300 16px/1.5 helvetica, arial;
        }
        body {
          background: #fefefe;
          color: #444;
        }
        h1,
        h2 {
          margin: 0;
          font-size: 24px;
        }
        div {
          margin: 25px 0;
        }
        div > p {
          margin: 0;
          font-size: 16px;
        }
      </style>
    </head>
    <body>
      <h1>' . H1 . '</h1>
      <h2>' . H2 . '</h2>
      <div>
        <p><b>Message :</b><br>
        ' . $content . '</p>
      </div>
    </body>
  </html>
';
