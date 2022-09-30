<?php 
   session_start();
   include_once (__DIR__.'/authentication.php');

   $username=$_SESSION['username'];
   $password=$_SESSION['password'];
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database='rdevarona_relight_depot_search';
   $conn = new mysqli($servername, $username, $password, $database);
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="index,follow">
      <meta http-equiv="Content-Type"  content="text/html; charset=utf-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel = "stylesheet" type = "text/css" href = "https://pim.sdiebiz.net/relight/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
      <script></script>
   </head>
   <body >
      <div class="main-wrapper">
         <div class="sec-sidebar">
            <section class="sidebar-left">
               <div class="sidebar-custom  collapse" id="demo">
                  <div class="sidebar-logo main-screen">
                     <a href="" class="logo-c"> 
                     <img src="https://cdn11.bigcommerce.com/s-c76t6z3pfh/images/stencil/original/download_1632131339__59027.original.png"> 
                     </a>
                     <!--   <button class="menu-hamburger"><i class="fa fa-bars"></i></button> -->
                  </div>
                  <div class="sidebar-menu">
                     <ul>
                        <li class="menu-item menu-itemsopen">
                           <a href="#" class="active menu-c" data-toggle="collapse" data-target="#demo1">
                           <span class="menu-name"> <i class="fa fa-cubes" aria-hidden="true"></i> Update Display Name </span>
                           <span class="chevron-right"><i class="fa fa-chevron-right"></i></span>
                           </a>
                           <ul class="menu-item-1 collapse" id="demo1">
                              <li>
                                 <a href="https://pim.sdiebiz.net/relight/live_selection.php">
                                 <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Live Site
                                 </a>
                              </li>
                              <li>
                                 <a href="https://pim.sdiebiz.net/relight/staging_selection.php">
                                 <i class="fa fa-trash-o" aria-hidden="true"></i>  Staging Site
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="menu-item menu-itemsopen">
                           <a href="#" class="menu-c" data-toggle="collapse" data-target="#demo2">
                           <span class="menu-name">  <i class="fa fa-cog" aria-hidden="true"></i> Delete Products</span>
                           <span class="chevron-right right-2"><i class="fa fa-chevron-right"></i></span>
                           </a>
                           <ul class="menu-item-1 collapse" id="demo2">
                              <li>
                                 <a href="https://pim.sdiebiz.net/relight/live_delete.php">
                                 <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Live Site
                                 </a>
                              </li>
                              <li>
                                 <a href="https://pim.sdiebiz.net/relight/staging_delete.php">
                                 <i class="fa fa-trash-o" aria-hidden="true"></i>  Staging Site
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="menu-item menu-itemsopen">
                           <a href="https://pim.sdiebiz.net/relight/templates.php" class="menu-c">
                           <span class="menu-name">   <i class="fa fa-file-archive-o" aria-hidden="true"></i> Products CSV Import </span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </section>
            <section class="all-dashboard  dash-resp">
               <div class="dashboard-menu">
                  <div class="mobile-resp-header">
                     <div class="sidebar-logo mobil-screen">
                        <button class="menu-hamburger" data-toggle="collapse" data-target="#demo"><i class="fa fa-bars"></i>
                        </button>
                        <a href="" class="logo-c"> 
                        <img src="https://cdn11.bigcommerce.com/s-c76t6z3pfh/images/stencil/original/download_1632131339__59027.original.png"> 
                        </a>
                     </div>
                  </div>
                  <div class="log_out"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
                     Log Out</a>
                  </div>
               </div>
               <div class="dashboard-wrapper site-result product-page">
                  <div class="block-element">
                     <div class="selct-site">
                        <!-- <div class="site-text">
                           <h3>Staging Site</h3>
                           
                           </div> -->
                        <div class="product-inner-sec total-products-sec">
                           <?php 
                              $option_check=$_GET['existing']; 
                              $query="SELECT * FROM staging WHERE display_name='".$option_check."'";
                               $results = $conn->query($query);
                               $num = $results->num_rows;
                               
                              ?>
                           <input type="hidden" name="sess_val" id="sess_val" value="<?php echo $_SESSION['passing'];?>">
                           <?php if($num > 0){?>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="bck-srch three-secs">
                                    <div class="total-products">
                                       <h1 class="number-txt"> Total Number of Products: <span> <?php echo $num;  ?> </span></h1>
                                    </div>
                                    <div class="site-text">
                                       <h3>Staging Site</h3>
                                    </div>
                                    <div class="back-btn">
                                       <a href="#" class="search_ui" onclick="history.back()">Back To Search</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="block-table">
                              <table id='example' class='show-user-table display table-responsive c-scrollbar' style='width:100%'>
                                 <thead>
                                    <tr>
                                       <th align="left"> <input type="checkbox" id="chkAll" /> Select All </th>
                                       <th>Product ID</th>
                                       <th>Product SKU</th>
                                       <th>Product Name</th>
                                       <th>Option ID</th>
                                       <th>Name</th>
                                       <th>Display Name </th>
                                    </tr>
                                 </thead>
                                 <tbody class="tbody">
                                    <?php   for($i=0;$i<$num;$i++){   
                                       $row = $results->fetch_assoc();
                                        
                                       ?>
                                    <tr>
                                       <td>
                                          <input type="checkbox" name="selection" data-id="<?php echo $row['product_id'];?>" class="prod_option_<?php echo $row['product_id'];?> selection cat" value="<?php echo $row['option_id'];?>"/>
                                          <input type="checkbox" name="pid" data-id="<?php echo $row['product_id'];?>" class="prod_option_<?php echo $row['product_id'];?> prd_selection cat" value="<?php echo $row['product_id']; ?>"  style="display:none;"/>
                                          <input type="checkbox" name="sku" data-id="<?php echo $row['product_id'];?>" class="prod_option_<?php echo $row['product_id'];?> sku_selection cat" value="<?php echo $row['product_sku']; ?>"  style="display:none;"/>
                                       </td>
                                       <td><a target="blank" href="https://store-c76t6z3pfh.mybigcommerce.com/manage/products/edit/<?php echo $row['product_id'];?>"><?php echo $row['product_id']; ?></a></td>
                                       <td><?php echo $row['product_sku'];?> </td>
                                       <td class="product-name"><?php echo $row['product_name'];?> </td>
                                       <td><?php echo $row['option_id'];?> </td>
                                       <td><?php echo $row['option_name'];?></td>
                                       <td><?php echo $row['display_name'];?></td>
                                    </tr>
                                    <?php       
                                       }
                                       ?>
                                 </tbody>
                              </table>
                              <!-- <form method="GET" action="https://pim.sdiebiz.net/relight/staging_replace.php"> -->
                                 <form method="GET" action="http://localhost/relight/staging_replace.php">
                                 <input type="hidden" name="show" id="selected" value="[]"/>
                                 <input type="hidden" name="show1" id="selected1" value="[]"/>
                                 <input type="hidden" name="show2" id="selected2" value="[]" />
                                 <input type="hidden" value="<?php echo $row['display_name'];?>" id="exist" name="exist" />
                                 <input type="submit" value="Proceed " id="enter" name="enter" />
                              </form>
                              <?php 
                                 if(isset($_REQUEST['enter'])){
                                     $prod_id=explode(',',$_GET['pid']);
                                     $result=explode(',',$_GET['show']);
                                     print_r($result);
                                 }
                                 
                                 ?>
<script>
//  $(document).ready(function(){
//    var tmp=[];
//  $(".selection").change(function() {
//  var checked = $(this).val();
//  if ($(this).is(':checked')) { 
//  tmp.push(checked);
//  }else{
//  tmp.splice($.inArray(checked, tmp),1);
//  }
//  console.log(tmp);
//  $('#selected').val(tmp);
//  });
//  })

//  $(document).ready(function(){
//    var pid=[];
//  $(".prd_selection").change(function() {
//  var checked1 = $(this).val();
//  if ($(this).is(':checked')) {
//  pid.push(checked1);
//  }else{
//  pid.splice($.inArray(checked1, pid),1);
//  }
//  console.log(pid);
//  $('#selected1').val(pid);
//  });

//  })

   function get_filter() {
      const prodId = event.target.dataset.id;
      const className = `prod_option_${prodId}`;
      const currentCheckBoxState = event.target.checked
      const allElements = $(`.${className}`);
      allElements.prop('checked', currentCheckBoxState)
      const currentFilterValues = JSON.parse($('#selected').val());
      const currentProdValues = JSON.parse($('#selected1').val());
      const currentSkuValues = JSON.parse($('#selected2').val());
      
      const updatedFilterValues = currentCheckBoxState
      ? [...currentFilterValues, allElements[0].value]
      : currentFilterValues.filter(
            id => id != allElements[0].value
      )
      const updatedProdValues = currentCheckBoxState
         ? [...currentProdValues, allElements[1].value]
         : currentProdValues.filter(
               id => id != allElements[1].value
         )

      const updatedSkuValues = currentCheckBoxState
         ? [...currentSkuValues, allElements[2].value]
         : currentSkuValues.filter(
               id => id != allElements[2].value
         )  
      console.log(updatedSkuValues)
      $('#selected').val(JSON.stringify(updatedFilterValues))
      $('#selected1').val(JSON.stringify(updatedProdValues))
      $('#selected2').val(JSON.stringify(updatedSkuValues))

   }
   
   jQuery('.cat').change(get_filter);

                     
</script>
<script type="">
      jQuery(document).ready(function () { 
         var oTable = jQuery('#example').dataTable({
         stateSave: true
         });
      
         var allPages = oTable.fnGetNodes();
         
         jQuery('#chkAll').click(function () {
         
         if (jQuery(this).hasClass('selection')) {
         jQuery('input[type="checkbox"]', allPages).prop('checked', false);
         var n = $("input[name^='selection']").length;
            var n1 = $("input[name^='pid']").length; 
         for(i=0;i<n&&n1;i++)
         {
         card_value=  $("input[name^='selection["+i+"]']").val();
         console.log(card_value);
         jQuery('#selected').val(JSON.stringify(card_value));
         jQuery('#selected1').val(JSON.stringify(card_value));
         }
         } else {
         jQuery('input[type="checkbox"]', allPages).prop('checked', true);
         var selected = new Array();
         var selected1 = new Array();
         jQuery("input:checkbox[name=selection]:checked").each(function() {
         selected.push($(this).val());
         });
         jQuery("input:checkbox[name=pid]:checked").each(function() {
         selected1.push($(this).val());
            jQuery('#selected').val(JSON.stringify(selected));
         jQuery('#selected1').val(JSON.stringify(selected1));
         });
         
         }
         jQuery(this).toggleClass('selection');
         })
      });
   
</script>
                              <?php }else{
                                 echo "<h3 style='text-align:center;margin-top:40px;'>NO RESULT FOUND</h3>" ;
                                 }
                                 ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script  type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script  type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   </body>
</html>
