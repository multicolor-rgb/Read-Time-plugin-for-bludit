<?php
    class readTime extends Plugin {
   
   public function init()
    {
        $this->dbFields = array(
            'readtime'=>'minute to read'
        );
    }


public function pageBegin(){
global $WHERE_AM_I;

if ($WHERE_AM_I == 'page'){
echo '<p><img src="'.$this->domainPath().'img/clock.svg" style="width:25px;margin-right:5px;display:inline-block"><span id="showReadTime"></span> '.$this->getValue('readtime').'</p>
<hr>';
 
};


}

 



public function siteBodyEnd(){

global $WHERE_AM_I;
global $page;

/* base script code from https://dev.to/ */


if ($WHERE_AM_I == 'page') {

echo '<script>

 function readingTime() {
 
  const text = `'.strip_tags(str_replace('`','"',$page->content())).'`;
  const wpm = 225;
  const words = text.trim().split(/\s+/).length;
  const time = Math.ceil(words / wpm);
  document.getElementById("showReadTime").innerText = time;
}
readingTime();
</script>
';
}

}

public function form(){

$html = '
<h3>Read Time Settings</h3>
<input type="text" value="'.$this->getValue('readtime').'" name="readtime" class="form-control">

';



$html .= '

<a class="text-center border" style="color:#000;background:#fafafafa;display:block;width:100%;padding:20px;margin-top:20px;" target="_blank" href="https://paypal.me/multicol0r?country.x=PL&locale.x=pl_PL">
    <p > If you like use my plugin! Buy me ☕ </p>

<img src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" class="d-block mx-auto mt-2"></a>
';


return $html;

}



    

    }
?>