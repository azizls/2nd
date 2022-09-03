<?php  
 
class utilisteurs{
    // table fields  
    private $id_utilisateur=null; 
    private $tickets=null; 
    private $id_event=null;
   
    
    // message string  
      
    // constructor set default value  
    function __construct($id_utilisateur,$tickets,$id_event)  
    {  
       
            $this->id_utilisateur=$id_utilisateur;
			$this->tickets=$tickets;
			$this->id_event=$id_event;
			
    }  

    function getid_utilisateur(){
        return $this->id_utilisateur;
    }
    function getntickets(){
        return $this->tickets;
    }
    function getid_event(){
        return $this->id_event;
    }
    
   
   
    
    
    
    function setid_utilisateur(string $id_utilisateur){
        $this->id_utilisateur=$id_utilisateur;
    }
    function settickets(string $tickets){
        $this->tickets=$tickets;
    }
    
    
    
  
    
    
}
?>