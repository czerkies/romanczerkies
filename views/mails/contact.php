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
      </style>
    </head>
    <body style="width:100%;padding:25px;background:#fefefe;color:#444;">
      <h1 style="margin:0;font-size:24px;">' . H1 . '</h1>
      <h2 style="margin:0;font-size:24px;">' . H2 . '</h2>
      <div style="margin:25px 0;">
        <p style="margin:0;font-size:16px;"><b>Message :</b><br>
        ' . $content . '</p>
      </div>
    </body>
  </html>
';
