<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vendzzar admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
            align-items: center;
            
        }
        .h2font{
            font-size: 40px;
            text-align: center;
            padding: 10px;
        }
        input[type=text]{
            border-radius: 10px;
            text-align: center;
            width: 20%;
            color: #454545;

        }
        input[type=number]{
            border-radius: 10px;
            text-align: center;
            width: 20%;
            color: #454545;

        }
        .textarea{
            border-radius: 10px;
            text-align: center;
            width: 40%;
            color: #454545;
            resize: none;
            height: 7em;
            

        }
        textarea::-webkit-scrollbar {
            width: 12px; /* Adjust the width as needed */
        }
        input[type=submit]{
            background-color: #FFE6C7;
            color: #454545;
            padding: 0.5%;
            border-radius: 10px;
            margin-top: 1%;
            width: 10%;
            
        }
        select{
            border-radius: 10px;
            text-align: center;
            width: 20%;
            color: #454545;
            border: 1px solid orange;

        }
        input[type=submit]:hover{
            background-color: #FF6000
        }
        .center{
            margin: auto;
            width:50%;
            text-align: center;
            
            border-bottom: 1px solid #FFE6C7;
            border-radius: 10px;
        }
        .table{
            padding: 10%;
            width: 80%
            
        }
        label{
            display: inline-block;
            width: 200px;
            text-align: left;
        }
        .div_design{
            padding-bottom: 15px;
        }
        #text_color{
            color: #454545;
            border-radius: 10px;
        }
        .txtlab{
            
        }
        .img-thumbnail{
            width:80%;
            height:80%;
            object-fit: cover;
            object-position: center;
            margin:10px;
            display:inline-block;
            position: inherit;
            }

            @media(max-width: 480px) {
            .img-thumbnail{
                height:50px;
                width: 50px;
            }
        }
        #photos{
            width: 20%;
            margin: auto;
        }
        
        #up_photo{
            
            text-align: center;
            width: 20%;
            padding: 0.5%;
            border-radius: 10px;
            background-color: rgb(9, 48, 104);
            cursor: cell;
        }
        #up_photo:hover{
            background-color: rgb(10, 67, 146); 
        }
        #hide{
            opacity: 0;
        }
        
        th{
            border-bottom: 1px solid #454545;
            color: #FFA559;
            
        }
        td{
            text-align: left;
        }
        #proimg{
            border-radius: 0%;
            width: 80px;
            height: 80px;
            transition: transform .2s;
        }
        #proimg:hover{
            transform: scale(3);
        }
        
        
    </style>
</head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header');
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h2 class="h2font">Products</h2>
               
                <table class="center table">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>For</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    </tr>

                    @foreach($product as $product)
                    <tr>
                        <td><b>{{$product->title}}</b></td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->for}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img id="proimg" src="/product/{{$product->image}}">
                        </td>
                        <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>
                        <td><a onclick="return confirm('Sure DELETE?')" class="btn btn-danger"href="{{url('delete_product',$product->id)}},{{$product->image}}">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
               
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>