<?php

/**
 * News class that extends database
 */
class News{
  private $id;
  private $title;
  private $date;
  private $author;
  private $content;
  private $image;

  public function __contruct($title, $date = date('m.d.y'),
                             $author = 'anonymous', $content, $images = ''){

    $this->title = $title;
    $this->date = $date;
    $this->author = $author;
    $this->content = $content;
    $this->images = $images;
  }
}

?>
