<style>
/*
Gary #efeeea
Navy #1c273e
White #ffffff
*/
body {
height: 100%;
color: #1c273e;
background: #efeeea;
font-family: 'M PLUS Rounded 1c', sans-serif;
}
/*ボタン デザイン*/
.btn {
color: #FFFFFF;
    padding: 14px 24px;
    border: 0 none;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}
.btn.outline {
    background: #1c273e;
    padding: 12px 22px;
}

/*リボンデザイン*/
.ribbon8 {
  display: inline-block;
  position: relative;
  padding: 15px 20px;
  font-size: 18px;/*フォントサイズ*/
  color:  #efeeea;/*フォントカラー*/
  background: #1c273e;/*背景色*/
}

.ribbon8:before {
  position: absolute;
  content: '';
  top: 100%;
  left: 0;
  border: none;
  border-bottom: solid 15px transparent;
  border-right: solid 20px rgb(149, 158, 155);/*折り返し部分*/
}

.ribbon8:after {
  position: absolute;
  content: '';
  top: 100%;
  right: 0;
  border: none;
  border-bottom: solid 15px transparent;
  border-left: solid 20px rgb(149, 158, 155);/*折り返し部分*/
}

/*メンバーお手紙box*/
.box11{
    padding: 0.5em 1em;
    margin: 2em 0;
    color: #1c273e;
    background: white;
    border-top: solid 5px #1c273e;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
}
.box11 p {
    margin: 0; 
    padding: 0;
}
/*囲*/
.box2 {
    opacity: 0.85;
    padding: 1em 1em;
    font-weight: bold;
color: #1c273e; 
    background: #FFF;
    border-radius: 10px;/*角の丸み*/
}
/*名前表記*/
.user-name {
}
</style>
