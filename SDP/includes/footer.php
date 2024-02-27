<footer>
    <style>
        footer{
            background-color: lightblue; /* Dark green */
            text-align: right;
            clear: both;
            max-width: 100%;
            max-height: 100%;
            height: 4%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        }
        table#footer{
            width: 100%;
            height: 7%;
            max-width: 100%;
            max-height: 100%;
            min-height: max-content;
            font-family: arial;
        }
        td#footer{
            width: 50%;
            color: #FFFFFF;
        }
        td#footer > a{
            color: #FFFFFF;
            margin-left: 12vw;
            margin-right: 12vw;
            text-align: right;
            font-size: 20vw;
        }
        a.footer:hover{
            background-color: rgba(255,255,255,0.5);
        }
    </style>
    <table id="footer">
        <tr id="footer">
            <td class="copyright" id="footer">
                <a style="font-size: 1.5vw;" href="../index.php" class="footer">Homepage</a>
                <a style="font-size: 1.5vw;" href="" class="footer">About Us</a> 
                <a style="font-size: 1.5vw;" href="" class="footer">Contact Us</a>
            </td>
        </tr>
    </table>
</footer>
<?php 
    mysqli_close($conn);
?>