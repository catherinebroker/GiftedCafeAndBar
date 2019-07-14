<form action="#contactForm" method="post">
  <input type="hidden" name="name" value="<?php echo $name; ?>">
  <input type="hidden" name="tel" value="<?php echo $tel; ?>">
  <input type="hidden" name="email" value="<?php echo $email; ?>">
  <input type="hidden" name="message" value="<?php echo $message; ?>">
  <input type="hidden" name="confirmed" value="true">
  <div>
    <label>お名前</label>
    <p><?php echo $name; ?></p>
  </div>

  <div>
    <label>メールアドレス</label>
    <p><?php echo $email; ?></p>
  </div>

  <div>
    <label>電話番号</label>
    <p><?php echo $tel; ?></p>
  </div>

  <div>
    <label>お問い合わせ内容</label>
    <p><?php echo $message; ?></p>
  </div>
  <input type="button" value="内容を修正する" onclick="history.back(-1)">
  <button type="submit" name="submit">送信する</button>
</form>
