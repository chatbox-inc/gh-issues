# Github Issue API 

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

Issue の状態に応じて、画像を返却してくれます。
  
スプレッドシートなどで以下のように `image` 関数を利用して Issue の状態を表示できます。

```
=image("https://cb-ghissues.herokuapp.com/chatbox-inc/gh-issues/issues/1"&"?time="&now())
```
