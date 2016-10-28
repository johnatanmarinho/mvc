<?php

/**
 * News class that extends database
 */
class NewsModel extends Base{



}

class News{
  private $title
  private $date
  private $author
  private $content
  private $images = array('initial' => NULL ,
                          'middle' => NULL ,
                          'slider' => NULL);

  public function __contruct($title, $date = date('m.d.y'), ){

  }
}

?>
