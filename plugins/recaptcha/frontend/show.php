<?php

$captcha=recaptcha_get_html(RECAPTCHA_PUBLIC);
$c = "";
$c .= '<tr id="captcha">
          <th>Captcha</th>
          <td>'.$captcha.'</td></tr>
              <script src="/plugins/recaptcha/frontend/recaptcha.js"> 
              </script>';
$PAGEDATA .= $c;