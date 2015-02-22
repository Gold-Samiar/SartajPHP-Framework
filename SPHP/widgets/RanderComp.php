<?php
/**
 * Description of RanderComp
 *
 * @author Sartaj Singh
 */
/**
 * RanderComp class
 *
 * This class rander Component in PHP Code.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class RanderComp {
/**
 * Get HTML Output from Control
 * @param Control $obj 
 */
public function rander($obj){}
/**
 * Create Component From Component Class File.
 * @param String $id Unique Identifier
 * @param String $path Optional file Path
 * @param String $class  Optional If Class Name Different From File Name
 * @param String $dfield Optional Data Field Name for Database Bindation
 * @param String $dtable Optional Data Table Name
 * @return Control 
 */
public function createComp($id,$path='',$class='',$dfield='',$dtable=''){}
public function createComp2($id,$path='',$class='',$dfield='',$dtable=''){}
/**
 * Call Component compcreate Event
 * @param Control $comp 
 */
public function compcreate($comp){
$element = new html_node();
$comp->oncompcreate($element);
}
}

class html_node {
    public $nodetype = HDOM_TYPE_TEXT;
    public $tag = 'text';
    public $attr = array();
    public $children = array();
    public $nodes = array();
    public $parent = null;
    public $_ = array();
    private $dom = null;


    function __toString() {
    }

    function isEndTag(){
    }

    // clean up memory due to php5 circular references memory leak...
    function clear() {
    }

    // dump node's tree
    function dump($show_attr=true) {
    }

    // returns the parent of node
    function parent() {
        return $this->parent;
    }

    // returns children of node
    function children($idx=-1) {
        if ($idx===-1) return $this->children;
        if (isset($this->children[$idx])) return $this->children[$idx];
        return null;
    }

    // returns the first child of node
    function first_child() {
        if (count($this->children)>0) return $this->children[0];
        return null;
    }

    // returns the last child of node
    function last_child() {
        if (($count=count($this->children))>0) return $this->children[$count-1];
        return null;
    }

    // returns the next sibling of node
    function next_sibling() {
        if ($this->parent===null) return null;
        $idx = 0;
        $count = count($this->parent->children);
        while ($idx<$count && $this!==$this->parent->children[$idx])++$idx;
        if (++$idx>=$count) return null;
        return $this->parent->children[$idx];
    }

    // returns the previous sibling of node
    function prev_sibling() {
        if ($this->parent===null) return null;
        $idx = 0;
        $count = count($this->parent->children);
        while ($idx<$count && $this!==$this->parent->children[$idx])++$idx;
        if (--$idx<0) return null;
        return $this->parent->children[$idx];
    }

    // get dom node's inner html
    function innertext() {
        return $ret;
    }

    // get dom node's outer text (with tag)
    function outertext() {
        return $ret;
    }

    // get dom node's plain text
    function text() {
        return $ret;
    }

    function xmltext() {
        $ret = $this->innertext();
        $ret = str_ireplace('<![CDATA[', '', $ret);
        $ret = str_replace(']]>', '', $ret);
        return $ret;
    }

    // build node's text with tag
    function makeup() {
    }

    // find elements by css selector
    function find($selector, $idx=null) {
        return (isset($found[$idx])) ? $found[$idx] : null;
    }

    // seek for given conditions
    protected function seek($selector, &$ret) {

    }

    protected function match($exp, $pattern, $value) {
        return false;
    }

    protected function parse_selector($selector_string) {
    }

    function __get($name) {
        if (isset($this->attr[$name])) return $this->attr[$name];
        switch($name) {
            case 'outertext': return $this->outertext();
            case 'innertext': return $this->innertext();
            case 'plaintext': return $this->text();
            case 'xmltext': return $this->xmltext();
            default: return array_key_exists($name, $this->attr);
        }
    }

    function __set($name, $value) {
        switch($name) {
            case 'outertext': $this->outertext = $value;
            case 'innertext': $this->innertext = $value;
            case 'plaintext':  $this->text = $value;
            case 'xmltext':  $this->xmltext = $value;
            default: $this->attr[$name] = $value;
    }
    }
    function __isset($name) {
        switch($name) {
            case 'outertext': return true;
            case 'innertext': return true;
            case 'plaintext': return true;
        }
        //no value attr: nowrap, checked selected...
        return (array_key_exists($name, $this->attr)) ? true : isset($this->attr[$name]);
    }

    function __unset($name) {
        if (isset($this->attr[$name])){
            unset($this->attr[$name]);}
    }

    // camel naming conventions
    function getAllAttributes() {return $this->attr;}
    function getAttribute($name) {return $this->__get($name);}
    function setAttribute($name, $value) {$this->__set($name, $value);}
    function hasAttribute($name) {return $this->__isset($name);}
    function removeAttribute($name) {$this->__set($name, null);}
    function getElementById($id) {return $this->find("#$id", 0);}
    function getElementsById($id, $idx=null) {return $this->find("#$id", $idx);}
    function getElementByTagName($name) {return $this->find($name, 0);}
    function getElementsByTagName($name, $idx=null) {return $this->find($name, $idx);}
    function parentNode() {return $this->parent();}
    function childNodes($idx=-1) {return $this->children($idx);}
    function firstChild() {return $this->first_child();}
    function lastChild() {return $this->last_child();}
    function nextSibling() {return $this->next_sibling();}
    function previousSibling() {return $this->prev_sibling();}

    }
?>