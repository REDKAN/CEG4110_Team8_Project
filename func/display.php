 <?php
  function display_items($files) {     
  // use heredoc to display div
  $here_doc = "";
         foreach($files as $image){
            //filter to the supported files
            $supported_img = array('jpg', 'jpeg', 'png', 'gif');
            //return the information about a file path
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_img)) {
                 echo basename($image)."<br/>"; 
                
                $here_doc = $here_doc . <<<CONTENT
                        <div class="gallery">
                        <a target="_blank" href="$image">
                        <img src= $image alt= $image width='300' height='200'>
                        </a>
                        <div class="desc">Restaurant: <br>
                                                       Location: <br>
                                                       Review:
                        </div>
                        </div>
CONTENT;
            }
           else {
                  continue;
            }
        }
//$here_doc = $here_doc . "</div>";
 echo $here_doc;        
  }
 ?>