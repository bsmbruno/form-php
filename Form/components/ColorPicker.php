<?php
namespace Form\components;
use Form\ElementForm;

class ColorPicker extends ElementForm
{   
     public function getElement(){ 
        $attrs = "";
        $atributos = get_object_vars($this);
        foreach ($atributos as $nmatributo => $valor) {
            //Remove todos atributos de configuração e deixa apenas atributos que se referem ao elemento
            if( !in_array($nmatributo,self::getAttrsExcessao() )    &&  !in_array($nmatributo,$this->getAttrsExcessaoElement()) )
                $attrs .= " $nmatributo='{$valor}' ";
        }
        
         if(isset($this->container)){ 
            return sprintf($this->container,'<label>'.$this->getLabel().'</label>
                    <div class="input-group   colorpicker-element">
                      <input type="text" class="form-control '.$this->class.'" '.$attrs.'>
                      <div class="input-group-addon">
                        <i style="background-color: rgb(168, 52, 142);"></i>
                      </div>
                    </div>');
        }else{
            return '<div class="form-group">
                    <label>'.$this->getLabel().'</label>
                    <div class="input-group   colorpicker-element">
                      <input type="text" class="form-control '.$this->class.'" '.$attrs.'>
                      <div class="input-group-addon">
                        <i style="background-color: rgb(168, 52, 142);"></i>
                      </div>
                    </div>
                  </div>
                  <script>
                  $(function(){
                    $(".colorpicker-element").colorpicker();
                  })
                  </script>
'; 
        }   
    }  
} 

 