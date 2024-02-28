<?php
    include '../includes/header.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
</head>
<body>
<div class="row">
    <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
    <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action=""  method="POST">
    <fieldset>


    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-12 control-label" for="name"></label>  
        <div class="col-md-12">
        <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
            
        </div>
    </div>

     <!-- Text input-->
     <div class="form-group">
        <label class="col-md-12 control-label" for="tag"></label>  
        <div class="col-md-12">
        <input id="tag" name="tag" placeholder="Enter Quiz Category" class="form-control input-md" type="text">
            
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-12 control-label" for="total"></label>  
        <div class="col-md-12">
        <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
        
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-12 control-label" for="right"></label>  
        <div class="col-md-12">
        <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
            
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-12 control-label" for="wrong"></label>  
        <div class="col-md-12">
        <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
            
        </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-12 control-label" for="desc"></label>  
        <div class="col-md-12">
        <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-12 control-label" for="quizpic"></label>  
        <div class="col-md-12">
        
        <input type="file" name="image" id="image" placeholder="please insert a picture" class="file-input" accept=".png, .jpg, .jpeg, image/png, image/jpeg"><br>

    <div class="form-group">
        <label class="col-md-12 control-label" for=""></label>
        <div class="col-md-12"> 
            <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
        </div>
    </div>

    </fieldset>
    </form></div>'
</body>
</html>
<?php
    include '../includes/footer.php';
?>

 