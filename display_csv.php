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
      <script  type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script  type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <!-- <style type="text/css">
         button.back-ui {
            background-color: #5f7410;
            color: #fff;
            /* border: none; */
            padding: 7px;
            border: 1px solid #5f7410;
            border-radius: 2px;
         }
      </style> -->
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
                           <a href="#" class="menu-c" data-toggle="collapse" data-target="#demo1">
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
                           <a href="https://pim.sdiebiz.net/relight/templates.php" class="menu-c active">
                           <span class="menu-name">   <i class="fa fa-file-archive-o" aria-hidden="true"></i> Products CSV Import </span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </section>
            <section class="all-dashboard">
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
               <!-- ========================Dashboard Content========================= -->
               <div class="dashboard-wrapper display-attributes-sec">
                  <div class="block-element">
                     <div class="selct-site stage-replace  upload-seller display-site">

                        <h2> Akeneo Product CSV import </h2>
                        <div class="multi-steps-form">
                           <ul id="progressbar-step">
                              <a href="https://pim.sdiebiz.net/relight/templates.php" class="crte-links"><li class="active"><span>Choose/Create Template</span></li></a>
                              <li class="active"><span>Upload CSV / Select Column </span></li>
                              <li class="active"><span>Mapping Akeneo Attribute </span> </li>
                              <li class=""><span>Select final data </span></li>
                              <li class=""><span>Download CSV</span></li>
                           </ul>
                        </div>
                        <div class="csv-files-record">
                           <?php
                              $data=$_GET['show'];
                              $data_new= json_decode($data); 
                              $count=count($data_new);
                              $servername = "localhost";
                              $username = "root";
                              $password = "";
                              $database='rdevarona_relight_depot_search';
                              $conn = new mysqli($servername, $username, $password, $database);

                              if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                              } 
                                
                              $result= "SELECT * FROM template_details ORDER BY Id DESC LIMIT 1";

                              $res=mysqli_query($conn,$result);
                              $row=mysqli_fetch_assoc($res); 
                              $column=$row['Csv_columns'];
                              $col=unserialize($column);
                               global $mpn;
                              foreach ($col as $key =>$value) {
                                 if($value == 'MPN'){
                                  
                                    $mpn=$value;
                                 } 
                               } 
                              ?>
                             
                           <div class="column-table-sec display-attributes-table">
                              <div class="column-table ">
                                 <div class="attr-top-sec">
                                    <div class="attr-top-sec-btn back_search back-btn-sec"> 
                                       <!-- <a href="https://pim.sdiebiz.net/relight/import_csv.php" class="back-ui"> Back To Search </a> -->
                                       <button onclick="history.back()" class="back-ui back-btn">Back</button>
                                    </div>
                                    <div class="att-text">
                                      <!-- <h3> Attribute Mapping </h3> -->
                                    </div>
                                 </div>
                                 <table class="table table-responsive">
                                    <thead>
                                       <tr>
                                          <th>S.NO</th>
                                          <th>CSV Column Name</th>
                                          <th>Akeneo Attribute</th>
                                          <th>Prefix</th>
                                          <th></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                     <?php if($mpn){ ?>
                                       <tr>
                                        <td>1</td>
                                      <td class="label-name"><?php echo $mpn; ?></td>
                                      <td> 
                                          <select  value="" id="mpn_val" name="mpn_val" required>
                                                <option value="Select Attribute" data-id="<?php echo $mpn; ?>0">Select Attribute</option>
                                                <option value="product_name" data-id="<?php echo $mpn; ?>1">product_name</option>
                                                <option value="sku" data-id="<?php echo $mpn; ?>2">sku</option>
                                                <option value="mpn" data-id="<?php echo $mpn; ?>3">mpn</option>
                                                <option value="enabled" data-id="<?php echo $mpn; ?>4">enabled</option>
                                                <option value="upc_ean" data-id="<?php echo $mpn; ?>5">upc_ean</option>
                                                <option value="price-USD" data-id="<?php echo $mpn; ?>6">price-USD</option>
                                                <option value="sale_price-USD" data-id="<?php echo $mpn; ?>7">sale_price-USD</option>
                                                <option value="imap-USD" data-id="<?php echo $mpn; ?>8">imap-USD</option>
                                                <option value="family" data-id="<?php echo $mpn; ?>9">family</option>
                                                <option value="cost-USD" data-id="<?php echo $mpn; ?>10">cost-USD</option>
                                                <option value="msrp-USD" data-id="<?php echo $mpn; ?>11">msrp-USD</option>
                                                <option value="Retail-USD" data-id="<?php echo $mpn; ?>12">Retail-USD</option>
                                                <option value="sale_price-USD" data-id="<?php echo $mpn; ?>13">sale_price-USD</option>
                                                <option value="description" data-id="<?php echo $mpn; ?>14">description</option>
                                                <option value="brand_name" data-id="<?php echo $mpn; ?>15">brand_name</option>
                                                <option value="Maximum_Purchase_Qty" data-id="<?php echo $mpn; ?>16">Maximum_Purchase_Qty</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" value="" placeholder="Enter Prefix" id="prefix_val_<?php echo $mpn;?>"/>
                                          </td>
                                          <td class="checkbox-row">
                                             <label class="container"></label>
                                          </td>
                                       </tr>
                                    <?php }?>
                                       <?php for($k=0;$k<$count;$k++) {?>
                                       <tr>
                                          <td>
                                             <?php if($mpn){
                                                   echo $k+2; 
                                                } else {
                                                   echo $k+1;
                                                }
                                           ?>
                                           </td>
                                          <td class="label-name"><?php echo $data_new[$k];?></td>
                                          <td>
                                             <select  value="" name="attribute_<?php echo $k; ?>[]" class="option_<?php echo $k; ?>" data-id="<?php echo $k; ?>" required>
                                                <option value="Select Attribute" data-id="<?php echo $k; ?>0">Select Attribute</option>
                                                <option value="product_name" data-id="<?php echo $k; ?>1">product_name</option>
                                                <option value="sku" data-id="<?php echo $k; ?>2">sku</option>
                                                <option value="mpn" data-id="<?php echo $k; ?>3">mpn</option>
                                                <option value="enabled" data-id="<?php echo $k; ?>4">enabled</option>
                                                <option value="upc_ean" data-id="<?php echo $k; ?>5">upc_ean</option>
                                                <option value="price-USD" data-id="<?php echo $k; ?>6">price-USD</option>
                                                <option value="sale_price-USD" data-id="<?php echo $k; ?>7">sale_price-USD</option>
                                                <option value="imap-USD" data-id="<?php echo $k; ?>8">imap-USD</option>
                                                <option value="family" data-id="<?php echo $k; ?>9">family</option>
                                                <option value="cost-USD" data-id="<?php echo $k; ?>10">cost-USD</option>
                                                <option value="msrp-USD" data-id="<?php echo $k; ?>11">msrp-USD</option>
                                                <option value="Retail-USD" data-id="<?php echo $k; ?>12">Retail-USD</option>
                                                <option value="sale_price-USD" data-id="<?php echo $k; ?>13">sale_price-USD</option>
                                                <option value="description" data-id="<?php echo $k; ?>14">description</option>
                                                <option value="brand_name" data-id="<?php echo $k; ?>15">brand_name</option>
                                                <option value="Maximum_Purchase_Qty" data-id="<?php echo $k; ?>16">Maximum_Purchase_Qty</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" value="" placeholder="Enter Prefix" id="prefix_val_<?php echo $k;?>"/>
                                          </td>
                                          <td class="checkbox-row">
                                             <label class="container">
                                                <input type="checkbox" name="pid" data-id="<?php echo $k;?>" class="prod_option_<?php echo $k; ?> selection cat" value="<?php echo  $data_new[$k]; ?>" checked  style="display:none;" />
                                                <span class="checkmark"></span>
                                             </label>
                                          </td>
                                       </tr>
                                       <?php } ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <?php
                           ?>
                        </div>
                        <div class="message"></div>
                        <div class="records-btn">
                           <form method="GET" action="record_csv.php">
                              <input type="hidden" name="data" id="selected" value="[]" required/>
                              <input type="hidden" name="count" id="selected1" value="<?php echo $count; ?>" required/>
                              <input type="hidden" name="unique_val" id="unique_val" value="" />
                              <input type="hidden" name="attr" id="attr" value="[]" required/>
                              <input type="hidden" name="prefix" id="pre" value="" placeholder="Prefix" required/>
                              <input class="export-btn display-proceed" type="submit" value="Proceed" id="next" name="enter" required>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
      </section>
      <?php 
         $servername = "localhost";
         $username = "root";
         $password = "";
         $database='rdevarona_relight_depot_search';
         $conn = new mysqli($servername, $username, $password, $database);
         if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }
         $result="SELECT * FROM `template_csv_data1` ORDER BY id DESC LIMIT 1";
         $result_dis=mysqli_query($conn,$result);
         $row=mysqli_fetch_assoc($result_dis);
         $supplier=$row['Supplier'];

      ?>
     <input type="hidden" id="match" value="<?php echo $supplier; ?>"/>
     
      <script type=""> 
      $(document).ready(function(){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
         $('#selected').val(JSON.stringify(val));
          console.log(val);
      });
  
      // var select=[]; 
      // $('select').on('change',  function() {
      // const selectId = event.target.dataset.id;
      // $('select[name="attribute_'+selectId+'[]"] option:selected').each(function() {
      // select.push($(this).val());
      // $('#attr').val(JSON.stringify(select))
      // console.log(select);
      // });
      // });

   $("#prefix_val_0").on("input", function() { 
   var prfix=$(this).val();
   let result = prfix.toUpperCase();
   $('#pre').val(result);

});


//   $(document).ready(function(){
//    var select=[]; 
//   var final=[];
//   var sid=[];
//  var temp=[];
//       $('select').on('change',  function() {
//       const selectId = event.target.dataset.id;
//       $('select[name="attribute_'+selectId+'[]"] option:selected').each(function() {

//           Index= (jQuery.inArray( selectId, sid ));
//          sid.push(selectId);
         
//          if(Index>=0){
//             // console.log("attribute already exists");
//             temp.push($(this).val());
//             let lastElement = temp.pop();
//              //console.log(lastElement);
//            last=selectId;
//              console.log(last);
//             select[last]=lastElement
//                $('#attr').val(JSON.stringify(select));
//                console.log(select);
             
//             }
//          else{
//               // console.log("value does not exists");
//                  select.push($(this).val());
//                   $('#attr').val(JSON.stringify(select))
//                   console.log(select);
//                }
    
//       });
      
//       });


// });

$(document).ready(function() {
         var select=[]; 
         final=[];
         sid=[];
         diff=[];
         comp=[];
      $('select').on('change',  function() {
         const selectId = event.target.dataset.id;
         Index= (jQuery.inArray( selectId, sid ));
         $('select[name="attribute_'+selectId+'[]"] option:selected').each(function() {
         sid.push(selectId);
         if(Index>=0){
            //console.log("attribute already exists");
            rkey=Object.keys(diff).find(key => diff[key] === selectId);
            // console.log(rkey);
            rval=[];
            rval.push($(this).val());
            rval2=rval.toString();
               // console.log(rval2);
           select[rkey]=rval2;
           console.log(diff);
            // select.splice(selectId, 0,rval2);
            $('#attr').val(JSON.stringify(select));
         } else{
            diff.push(selectId);
            // console.log("attribute does not exists");
            ab=[];
            ab.push($(this).val());
            console.log(diff);
            ab2=ab.toString();
            select.push($(this).val());
            //console.log(select);
             // select.splice(selectId, 0,ab2);
            $('#attr').val(JSON.stringify(select));
         }
      });
      
   });
});
$(document).ready(function(){
  $('select[name="mpn_val"]').on('change', function(){  
   const uniq=$(this).val(); 
    console.log(uniq);  
    $('#unique_val').val(uniq);
});
});   
</script>
 
 <script>
$( document ).ready(function() {
    return false;
      var  selectArray=[];
      var  arrayResponse=[];
      var  dataArray=[];
      var temp='';
      $('select').change(function(){
      var selectedValue=$(this).data('id');
      checkValue= ($.inArray( selectedValue, selectArray ));
      selectArray.push(selectedValue);
      arrayLength=selectArray.length;
      for(var x = 0; x<=arrayLength; x++) {
         for (var j = x + 1; j < arrayLength; j++) {
            if (selectArray[x] > selectArray[j]) {
                  temp =selectArray[x];
                  selectArray[x] = selectArray[j];
                  selectArray[j] = temp;
            }
         }
        
      }
      var unique = selectArray.filter(function(itm, i, a) {
            return i == a.indexOf(itm);
      });
      console.log(unique);
   });
});
</script>

</body>
</html>