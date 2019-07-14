<form action="#contactForm" method="post">
  <p>お問い合わせの種類※必須</p>

<select class="type" name="type">
    <option value="">パーティー</option>
    <option value="">イベント</option>
    <option value="">貸切</option>
    <option value="">プロモーション</option>
    <option value="">その他</option>
  </select>

  <p>お名前※必須</p>
  <input type="text" name="name" placeholder="お名前" value="<?php if (!empty($name)) {echo $name;} ?>">

  <p>お電話番号</p>
  <input type="tel" name="tel" placeholder="お電話番号" value="<?php if (!empty($tel)) {echo $tel;} ?>">

  <p>メールアドレス ※必須</p>
  <input type="email" name="email" placeholder="メールアドレス" value="<?php if (!empty($email)) {echo $email;} ?>">

  <p>メールアドレス(確認) ※必須</p>
  <input type="email" name="mailCheck" placeholder="メールアドレス">

  <p>お問い合わせ内容※必須</p>
  <input type="text" name="message" placeholder="お問い合わせ内容" value="<?php if (!empty($message)) {echo $message;} ?>">
  <br>

  <input id="submit" type="submit" placeholder="submit" value="内容を確認する">

</form>
