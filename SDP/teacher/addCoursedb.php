<?php
if(isset($_POST['submit'])){
    include ('../modules/config.php');
    
    $file = $_FILES['file'];
    $file2 = $_FILES['file2'];
    $file3 = $_FILES['file3'];
    $file4 = $_FILES['file4'];

    $file_name = $_FILES['file']['name'];
    $file_Tmpname= $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];

    $file2_name = $_FILES['file2']['name'];
    $file2_Tmpname= $_FILES['file2']['tmp_name'];
    $file2_size = $_FILES['file2']['size'];
    $file2_type = $_FILES['file2']['type'];
    $file2Error = $_FILES['file2']['error'];

    $file3_name = $_FILES['file3']['name'];
    $file3_Tmpname= $_FILES['file3']['tmp_name'];
    $file3_size = $_FILES['file3']['size'];
    $file3_type = $_FILES['file3']['type'];
    $file3Error = $_FILES['file3']['error'];

    $file4_name = $_FILES['file4']['name'];
    $file4_Tmpname= $_FILES['file4']['tmp_name'];
    $file4_size = $_FILES['file4']['size']; 
    $file4_type = $_FILES['file4']['type']; 
    $file4Error = $_FILES['file4']['error'];

    $courseCATE = $_POST['course_cate'];
    $courseNAME = $_POST['course_name'];

    $courseID = uniqid("Cr" . date('Ymd'));

    

    $premium = $_POST['premium'];
    

    $img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    $img2_ex = pathinfo($file2_name, PATHINFO_EXTENSION);
			$img2_ex_lc = strtolower($img2_ex);
    $allowed2 = array('jpg', 'jpeg', 'png', 'pdf');

    $img3_ex = pathinfo($file3_name, PATHINFO_EXTENSION);
			$img3_ex_lc = strtolower($img3_ex);
    $allowed3 = array('jpg', 'jpeg', 'png', 'pdf');

    $img4_ex = pathinfo($file4_name, PATHINFO_EXTENSION);
			$img4_ex_lc = strtolower($img4_ex);
    $allowed4 = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($img_ex_lc,$allowed)){
        if($fileError === 0){
            if($file_size < 5000000){
                if(in_array($img2_ex_lc,$allowed)){
                    if($file2Error === 0){
                        if($file2_size < 5000000){
                            if(in_array($img3_ex_lc,$allowed)){
                                if($file3Error === 0){
                                    if($file3_size < 5000000){
                                        if($file2_size < 5000000){
                                            if(in_array($img4_ex_lc,$allowed)){
                                                if($file4Error === 0){
                                                    if($file4_size < 5000000){
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $fileDestination = '../images/'.$new_img_name;
                            move_uploaded_file($file_Tmpname,$fileDestination);

                            $new_img2_name = uniqid("IMG-", true).'.'.$img2_ex_lc;
                            $fileDestination2 = '../images/'.$new_img2_name;
                            move_uploaded_file($file2_Tmpname,$fileDestination2);
                            
                            $new_img3_name = uniqid("IMG-", true).'.'.$img3_ex_lc;
                            $fileDestination3 = '../images/'.$new_img3_name;
                            move_uploaded_file($file3_Tmpname,$fileDestination3);

                            $new_img4_name = uniqid("IMG-", true).'.'.$img4_ex_lc;
                            $fileDestination4 = '../images/'.$new_img4_name;
                            move_uploaded_file($file4_Tmpname,$fileDestination4);
            
                            $sql = "INSERT INTO course (courseID,userID,Course_name,course_category,Course_Pic,Badge,Badge1,Badge2,premium)
                            VALUES ( '$courseID','$userID','$courseNAME','$courseCATE','$new_img_name','$new_img2_name','$new_img3_name','$new_img4_name','$premium')";
                            mysqli_query($conn, $sql);
                            header("Location: viewCourses.php");
                        }else{
                            header("Location: viewCourses.php");
                        }
                    }else{
                        header("Location: viewCourses.php");
                    }
                }else{
                    header("Location: viewCourses.php");
                }
                        }else{
                            header("Location: viewCourses.php");
                        }
                    }else{
                        header("Location: viewCourses.php");
                    }
                }else{
                    header("Location: viewCourses.php");
                }
                        }else{
                            header("Location: viewCourses.php");
                        }
                    }else{
                        header("Location: viewCourses.php");
                    }
                }else{
                    header("Location: viewCourses.php");
                }
            }
            }else{
                header("Location: viewCourses.php");
            }
        }else{
            header("Location: viewCourses.php");
        }
    }else{
        header("Location: viewCourses.php");
    }
}
