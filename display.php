 <?php
  function display_items($files) {     
  // use heredoc to display div
  $here_doc = "";
         foreach($files as $image){
            //filter the supported files
            $supported_img = array('jpg', 'jpeg', 'png', 'gif');
            //return the information about a file path
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_img)) {
               //  echo basename($image)."<br/>"; 
                
                $here_doc = $here_doc . <<<CONTENT
                        <div class="gallery">
                        <a target="_blank" href="$image">
                        <img src= $image alt= $image width='300' height='200'>
                        </a>
                      
                        </div>
                        </div>
CONTENT;
            }
            /* txt area 
             *  <!-- <div class="desc">Restaurant: <br>
                                                       Location: <br>
                                                       Review:
                        -->
             */
           else {
                  continue;
            }
        }
 echo $here_doc;        
  }
 ?>