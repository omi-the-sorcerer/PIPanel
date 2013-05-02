<?
function h($text = '')
{
  if(is_array($text)) $text = implode("\n", $text);
  return strtr(htmlspecialchars($text), array("\n" => '<br />', "\r" => ''));
}

function view($view, $data = '', $root = '')
{
  if(is_array($data))
    extract($data, EXTR_REFS | EXTR_SKIP);

  ob_start();
  require($root.$view.'.php');
  $content = ob_get_contents();
  ob_end_clean();

  return $content;
}

function message($message = '', $redirect = '')
{
  if($redirect != '')
    header('Refresh: 5; url=/'.$redirect);

  return view('message', array('message' => $message));
}

function error($error = '')
{
  return view(ERROR.'layout', array('error' => $error));
}

function go_to()
{

  $args = func_get_args();
  if(count($args) < 1) return FALSE;

  $link = '';
  foreach($args as $arg)
    $link .= '/'.rawurlencode($arg);

  if(isset($_GET['s'])) $link .= '?s='.($_GET['s'] + 0);

  header('Location: '.$link);
  exit();
}

function command()
{

  $args = func_get_args();
  if(($command = array_shift($args)) === NULL) return FALSE;

  $command_file = BASE."lib/pages/".$command.'.php';

  if(!file_exists($command_file))
  {
    return error(h("La pagina especificada no existe o esta mal escrita -> (/".$command.")"));
    exit;
  }

  $content = '';
  if((require_once($command_file)) === FALSE)
    $GLOBALS['SUCCESS'] = FALSE;

  $GLOBALS['TITLE'] = isset($title) ? $title : FALSE;
  return $content;
}

function blockedip()
{
  $url = "/etc/iptables";

  $file = file($url);

  $return = array();

  foreach ($file as $i => $l) 
  {
    $li = substr($l, 0, 8);
    if($li == "iptables")
    {
      $explode = explode(" ", $l);
      $return[] = $explode[4];
    }
  }

  return $return;
}

function logs($file, $grep = '', $tail = '')
{
  $command = "cat ".$file."";

  if($grep != '')
  {
    $command = $command." | grep ".$grep;
  }

  if($tail != '')
  {
    $command = $command." | tail -".$tail;
  }

  exec($command, $ss);
  
  $content = '';
  foreach($ss as $s)
  {
    $content .= $s."<br>";
  }

  return $content;
}

function unsets($SES) 
{
  unset($_SESSION[$SES]);
}


function temp()
{
  exec('sudo /usr/bin/vcgencmd measure_temp', $output, $return_var);
  if($return_var) return FALSE;
  foreach($output as $line)
    if(substr($line, 0, 5) == 'temp=')
      return substr($line, 5, -2);
}
?>