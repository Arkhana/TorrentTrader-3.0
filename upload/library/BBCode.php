<?php
  
   /**
   * @package BBCode Wrapper
   * @version v0.1
   * @author  Lee Howarth
   */
   
   class BBCode
   {
       private $bbcode;
       
       private function __construct()
       {
           $this -> bbcode = bbcode_create( $this -> getTags() );
       }
       
       static function getInstance()
       {
           static $instance;
           return $instance ? $instance : $instance = new self();
       }
       
       private function getTags()
       {
           return array(
           
              'i' => array( 'type' => BBCODE_TYPE_NOARG, 'open_tag' => '<i>', 'close_tag' => '</i>' ),
              
              'b' => array( 'type' => BBCODE_TYPE_NOARG, 'open_tag' => '<b>', 'close_tag' => '</b>' ),
   
              'u' => array( 'type' => BBCODE_TYPE_NOARG, 'open_tag' => '<u>', 'close_tag' => '</u>' )
           );
       }
       
       public function parse( $str )
       {
           return bbcode_parse( $this -> bbcode, $str );
       }
       
       public function __destruct()
       {
           bbcode_destroy( $this -> bbcode );
       }
   }
