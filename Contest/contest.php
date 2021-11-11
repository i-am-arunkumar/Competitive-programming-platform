<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./contest.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title></title>
</head>

<body>
     <?php
        include("../commons/header.php");
     ?>

    <div class="table">
         <table class="table table-striped table-hover">
           <thead>
               <tr>
                 <th scope="col">#</th>
                 <th scope="col">Question Name</th>
                 <th scope="col">Solved?</th>
               </tr>
             </thead>
             <tbody>
                 <tr>
                   <th scope="row">1</th>
                   <td>Linear keyboard</td>
                   <td>Yes</td>
                 </tr>
                 <tr>
                   <th scope="row">2</th>
                   <td>Odd Grasshopper</td>
                   <td>No</td>
                 </tr>
                 <tr>
                   <th scope="row">3</th>
                   <td>Minimum Extraction</td>
                   <td>No</td>
                 </tr>
               </tbody>
         </table>
    </div>

</body>

</html>