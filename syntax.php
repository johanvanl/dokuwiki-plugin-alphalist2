<?php
// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_alphalist2 extends DokuWiki_Syntax_Plugin {

    public function getType(){ return 'container'; }
    public function getAllowedTypes() { return array('container'); }   
    public function getSort(){ return 158; }
    public function connectTo($mode) { $this->Lexer->addEntryPattern('<alphalist>(?=.*?</alphalist>)',$mode,'plugin_alphalist2'); }
    public function postConnect() { $this->Lexer->addExitPattern('</alphalist>','plugin_alphalist2'); }


    /**
     * Handle the match
     */
    public function handle($match, $state, $pos, Doku_Handler $handler){
        switch ($state) {
            case DOKU_LEXER_ENTER :
                return $state;
            case DOKU_LEXER_UNMATCHED :
                return $state;
            case DOKU_LEXER_EXIT :
                return $state;
        }
        return array();
    }

    /**
     * Create output
     */
    public function render($mode, Doku_Renderer $renderer, $state) {
        // $data is what the function handle() return'ed.
        if($mode == 'xhtml'){
            /** @var Doku_Renderer_xhtml $renderer */
            switch ($state) {
                case DOKU_LEXER_ENTER :      
                    $renderer->doc .= '<div class="alphalist2">'; 
                    break;
                
                case DOKU_LEXER_UNMATCHED :  
                    $renderer->doc .= $renderer->_xmlEntities($match); 
                    break;
                case DOKU_LEXER_EXIT :       
                    $renderer->doc .= "</div>"; 
                    break;
            }
            return true;
        }
        return false;
    }
}
