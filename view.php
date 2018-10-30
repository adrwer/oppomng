<!DOCTYPE html>
<html>
<head>
    <title>Opportunity Management: Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="table-responsive">        
<table class="table table-bordered table-hover" border=1 >
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Phone</td>
            
        </tr>
        <?php 
            $conn=mysqli_connect("localhost", "root", "kijowife", "oppomng");
    
            $sql = "SELECT * FROM accounts";
    
            $data = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($data)>0) {
                while($row = mysqli_fetch_assoc($data)){
                    echo "<tr>  
                    <td>" . $row['Id'] . "</td> 
                    <td>" . $row['Name'] . "</td>  
                    <td>" . $row['Phone'] . "</td>
                    </tr>";
                }
            } else {
                echo "No results";
            }
                
        ?>
    </table>
    </div>
    <br>
    
    <div class="table-responsive">
    <table class="table table-bordered table-hover" border=1 >
        <tr>
            <td>ID</td>
            <td>Account</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Stage</td>
            <td>Amount</td>
            
        </tr>
        <?php 
            $conn=mysqli_connect("localhost", "root", "kijowife", "oppomng");
    
            $sql = "SELECT * FROM opportunities";
    
            $data = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($data)>0) {
                while($row = mysqli_fetch_assoc($data)){
                    echo "<tr>  
                    <td>" . $row['Id'] . "</td> 
                    <td>" . $row['Name'] . "</td>
                    <td>" . $row['Account'] . "</td>  
                    <td>" . $row['Stage'] . "</td>
                    <td>" . $row['Amount'] . "</td>
                    </tr>";
                }
            } else {
                echo "No results";
            }
                
        ?>
    </table>   
    </div>    
<a href="welcome.php">Back to homepage</a>
</body>
</html>