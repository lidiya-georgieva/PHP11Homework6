<?php 
 
 class MyView /*implements View*/
 {
    private $title;//change with setPageTitle
	private $jsPath;//folder with .js
	private $jsFiles = array();
	private $cssPath;
	private $cssFiles = array();
	private $data = array();//ще пазя т.нар. templateVariables 
	                        //във вида $this->data['име–променлива']
							//$this->data['message'] = "Hello!"
	private $tplFile;
	
	/**
     * Renders and displays the HTML.
     * For example - should work like $smarty->display("some.tpl")
     * @var <string> $pagaName - the name of the template to display
     */
    public function display($pageName)
    { 
	  $this->tplFile=$pageName;
	  $string=file_get_contents($pageName);
	  $string = str_replace('{$message}',$this->data['$varName'],$string);
	  $string = str_replace('{$title}',$this->title,$string);
	  $string = str_replace('{$styles}',$this->cssPath,$string);
	  $string = str_replace('{$js}',$this->jsPath,$string);
	  
	  echo $string;
	}
	
    /**
     * Assigns a variable to a template placeholder
     * @var <string> $varName - the name of the placeholder
     * @var $varValue - the value for the placeholder
     */
	 public function assignTemplateVariable($varName, $varValue)
	 {
	    $this->data['$varName'] = $varValue;
        		
	 }
	
    public function setPageTitle($title)
	{
	   $this->title = $title;
	}
	
    public function setJavascriptFolder($jsFolder)
	{
	   $this->jsPath = $jsFolder;
	}
	
    public function addJavascriptFiles($js /* array */)
	{ 
	   $i=0;
	   foreach($js as $var)
	   {
	     $this->jsFiles[$i] = $var;
		 $i++;
	   }
	}
	
    public function setCSSFolder($cssFolder)
	{
	    $this->cssPath = $cssFolder;
	}

   
    public function addCSSFiles($css /* array */)
	{
	     $i=0;
	   foreach($css as $var)
	   {
	     $this->cssFiles[$i] = $var;
		 $i++;
	   }
	}
}	
	$v = new MyView(); 
    $v->setPageTitle("Use case for the homework");
    $v->setJavascriptFolder("js");
    $v->setCSSFolder("styles");

    $v->addJavascriptFiles(array("jquery.js", "custom.js"));
    $v->addCSSFiles(array("jquery.css", "custom.css"));

    $v->assignTemplateVariable("message", "Hello!");
    $v->display("index1.tpl");
 
 ?>