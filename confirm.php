<form action="#contactForm" method="post">
	<input type="hidden" name="type" value="<?php echo $type; ?>">
  <input type="hidden" name="name" value="<?php echo $name; ?>">
  <input type="hidden" name="tel" value="<?php echo $tel; ?>">
  <input type="hidden" name="email" value="<?php echo $email; ?>">
  <input type="hidden" name="message" value="<?php echo $message; ?>">
  <input type="hidden" name="confirmed" value="true">

	<div>
		<label>お問い合わせの種類</label>
    <p><?php echo $type; ?></p>
  </div>

	<div>
    <label>お名前</label>
    <p><?php echo $name; ?></p>
  </div>

  <div>
    <label>メールアドレス</label>
    <p><?php echo $email; ?></p>
  </div>

	<div>
    <label>メールアドレス</label>
    <p><?php echo $email; ?></p>
  </div>

	<div>
    <label>メールアドレス(確認)</label>
    <p><?php echo $mailCheck; ?></p>
  </div>

  <div>
    <label>電話番号</label>
    <p><?php echo $tel; ?></p>
  </div>

  <div>
    <label>お問い合わせ内容</label>
    <p><?php echo $message; ?></p>
  </div>
  <input id="editMessage" type="button" value="内容を修正する" onclick="history.back(-1)"><br>
  <input id="contactButton" type="submit" name="submit" value="送信する">
</form>
