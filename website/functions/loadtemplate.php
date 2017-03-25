 <?php
 function loadTemplate($fileName,$templateVars) {
 ob_start();
 extract($templateVars);
 require $fileName;
 $content = ob_get_clean();
 return $content;
}
?>