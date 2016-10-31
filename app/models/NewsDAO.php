<?php

class NewsModel extends Base{


  public function addNew(News $news){
      $conn = $this->conn;

      $stmt_str = 'INSTERT INTO news (title, author, content, date, image, slider_id)'.
                  ' VALUES( ?, ?, ?, ?, ?, ?)';

      if(!$stmt = $conn->prepare($stmt_str))
        die('error to prepare the statment ('. $conn->errno . ') '. $conn->error);

      $stmt->bind_param('s', $news->getTitle());
      $stmt->bind_param('s', $news->getAuthor());
      $stmt->bind_param('s', $news->getContent());
      $stmt->bind_param('s', $news->getDate());
      $stmt->bind_param('s', $news->getImage());
      $stmt->bind_param('i', $news->getSlider());

      $stmt->execute();
  }

}

?>
