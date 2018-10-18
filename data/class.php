<?php
  class Code //Je crée une nouvelle classe Code
  {
    public $cheminsSpé = [ //pour essayer de faire la dernière étape avec l'uri
        "1" => "html",
        "2" => "css",
        "3" => "js",
        "4" => "php",
      ];
    public $head = "./layouts/head.html";         //j'appelle mon header et mon footer
    public $foot = "./layouts/foot.html";         
    
    public $uri; // $uri permet de récupérer l'uri directement et évite de réécrire les chemins
    public $chemin;

    public function __construct($uri) 
    {
      $this->uri = $uri;
      $this->chemin = "./code" . $uri . ".html"; //On définit les chemins
    }

    public function createCode($alpha)
    {
        $codeElement = array_diff(scandir('./code'),[     //je scanne ce qu'il y a dans le dossier "code" et je cache

        ".",            //ce qui n'est pas nécessaire comme fichier caché etc
        "..",  
            
        ]);
        
        $render = "<div>";          //Je crée une div pour stocker mes 4 divs qui contiennent les langages
        //rsort($codeElement); //inverse de l'ordre alphabétique
        //asort($codeElement); //tri dans l'ordre alphabétique
        if($alpha) {
            rsort($codeElement);
        }
        
        foreach ($codeElement as $key => $value) {        //Pour chaque langage, je stocke l'élement dans une div et je récupère le contenu de mes fichiers
           /* idée non concluante : 
           if($this->uri == "/number") {
        $content =  file_get_contents("./views/" . $this->cheminsSpé['$number'] . ".html");) 
            */
            $render .= "<div>" . file_get_contents("./code/" . $value) . "</div>"; 
        }
        $render .= "</div>";
        return $render; //j'utilise un return pour pouvoir appeller cette méthode dans une autre méthode
       
    }

    public function renderCode($alpha = true)
    {    
        $content = $this->createCode($alpha);      //j'affiche mon contenu concaténé avec mon header et mon footer
        echo file_get_contents($this->head)  . $content .
        file_get_contents($this->foot);
      } 
    

            
            
            
          
      }
      
    

  ?>
