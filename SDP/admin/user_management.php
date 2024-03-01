<?php 
    require '../modules/config.php'; // Validate user role
    if ($role !='admin'){
        header('Location: ../index.php');
        die;
    }
    include '../includes/header.php'; // Get header

    // Get user list for user console
    $user_list = mysqli_query($conn, "SELECT * FROM user WHERE role != 'admin'; ");
    if ($user_list){
        $user_list_length = mysqli_num_rows($user_list);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
 
        input.user-content-search-input{
            width: 15vw;
            font-size: 1.5vw;
            height: 2.5vw;
            min-height: 2vw;
            margin-left: 730px;
            background-color: whitesmoke;
        }
        div.console-container .search-button{
            cursor: pointer;
            height: 2.5vw;
            min-width: 2vw;
            width: fit-content;
            font-size: 1.5vw;
        }
        div.console-container table{
            margin-left: 2vw;
        }
      
        table.console-content-table{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 2.7vh;          
            margin-top: 1.5%;  
            background-color: whitesmoke;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            margin-bottom: 50px;
            border-radius: 25px;
            margin-left: 100px;
            padding-bottom: 100px;
            padding: 40px;


        }
        button.ban-button{
            color: white;
            background-color: red;
            cursor: pointer;
            border-radius: 10%;
            min-width: max-content;
            width: 80%;
            padding: 10%;
        }
        button.unban-button{
            color: white;
            background-color: green;
            cursor: pointer;
            border-radius: 10%;
            min-width: max-content;
            width: 80%;
            padding: 10%;
        }
        button.ban-button:hover{
            color: black;
            background-color: lightgreen;
        }
        button.unban-button:hover{
            color: black;
            background-color: lightcoral;
        }
        tbody.product-table > tr{
            padding: 0vw;
        }
        #title{
            color: lightblue;
        }
        tr.console-table-headers{
            color: lightblue;
        }
        td.search-key > a{
            color: lightblue;
        }
        td#count{   
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 14px;
        }
        table#console-content-user-table td,table#console-content-user-table th{
            padding-right: 10vw;
        }
        h1{
            text-align: center;
            font-size: 60px;
            font-family: Arial, Helvetica, sans-serif;

        }
    </style>
</head>
<body>
    <h1>User management</h1>
    <div class="content" id="user-content">
            <div class="search-container">
                <input type="text" class="user-content-search-input" id="user-content-search-input" placeholder="Search user" onkeyup="searchFunction('user')" autofocus>
                <button class="search-button" >🔍</button>
            </div><br>
            <table class="console-content-table" id="console-content-user-table">
                <thead>
                    <tr class="console-table-headers">
                        <th></th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="user-table" id="user-table">
                    <?php
                        $count=1;
                        if ($user_list_length){
                            while ($user_info=mysqli_fetch_array($user_list)){
                                echo '<tr class="searchable-row">';
                                echo '<td>'.$count.'</td>';
                                echo '<td class="search-key">'.$user_info['username'].'</td>';
                                echo '<td class="search-key">'.$user_info['role'].'</td>';
                                echo "<td class='search-key'><a href='tel:$user_info[phone]'>".$user_info['phone']."</a>;<br>
                                        <a href='mailto:$user_info[email]'>".$user_info['email'].'</a></td>';
                                $id = $user_info['userID'] ;
                                if ($user_info['AccStatus'] != 'banned'){ ?>
                                    <td><button class='ban-button' onclick="chgStatus('user', '<?php echo $id; ?>', 'ban')">BAN</button></td></tr>
                                <?php }else{ ?>
                                    <td><button class='unban-button' onclick="chgStatus('user', '<?php echo $id; ?>', 'unban')">UNBAN</button></td></tr>
                                <?php }
                                $count++;
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../src/search.js"></script>
    <script>
        function tab(type){ //If user clicks on tab
            if (type=='user'){
                document.getElementById('user-content').style.display='block';
                document.getElementById('user-tab').style.backgroundColor='lightyellow';
                document.getElementById('product-content').style.display='none';
                document.getElementById('product-tab').style.backgroundColor='oldlace';
            }
            if (type=='product'){
                document.getElementById('product-content').style.display='block';
                document.getElementById('product-tab').style.backgroundColor='lightyellow';
                document.getElementById('user-content').style.display='none';
                document.getElementById('user-tab').style.backgroundColor='oldlace';
            }
        }

        function chgStatus(type, id, action){
            if (window.confirm("Are you sure?")) {
                window.location.href=`<?php echo '../modules/ban.php?'?>type=${type}&id=${id}&action=${action}`;
            }
        }

        var url = new URL(window.location.href); //Get the URL
        var params = new URLSearchParams(url.search); //Get the parameter 'type' from URL
        if(params.get('type')=='user'){
            tab('user');
        }else if(params.get('type')=='product'){
            tab('product');
        }
    </script>
</body>
</html>
<?php include '../includes/footer.php'; ?>
</body>
</html>