<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">List Orders product</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php foreach($data['lstOrder'] as $key=>$item): ?>
        <div class="col-md-12" style="border-bottom: 2px dotted green ; margin: 20px 0px;background-color: #CCFFFF;">
            <div class="col-md-2">
                <p>
                    <img width="100%" height="250px;" src="<?php echo PATH_UPLOAD_IMG.$item['images'] ?>" alt="">
                </p>
                <h3 class="text-center"><?php echo $item['name_book']; ?></h3>
            </div>
            <div class="col-md-10" style="background-color: white;">
                <div class="table-responsive">
                  <table class="table table-bordered" style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th>#</<th></th>>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Qty</th>
                            <th>Money</th>
                            <th>Create</th>
                            <th>Note</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item['lstCustomer'] as $k=>$cus): ?>
                        <tr>
                            <td><?php echo $k+1; ?></td>
                            <td><?php echo $cus['nameCustomer']; ?></td>
                            <td><?php echo $cus['phoneCustomer']; ?></td>
                            <td><?php echo $cus['emailCustomer']; ?></td>
                            <td><?php echo $cus['addressCustomer']; ?></td>
                            <td><?php echo $cus['qtyproduct']; ?></td>
                            <td><?php echo number_format($cus['money']); ?>vnd</td>
                            <td><?php echo $cus['create_time']; ?></td>
                            <td><?php echo $cus['noteCustomer']; ?></td>
                            
                            <td>
                                <button id="ok_<?php echo $cus['id']; ?>" onclick="updateOrdres(1,<?php echo $cus['id']; ?>);" type="button" class="btn btn-small btn-primary">Xác nhận</button>
                            </td>
                            <td>
                                <button id="cancel_<?php echo $cus['id']; ?>" onclick="updateOrdres(-1,<?php echo $cus['id']; ?>);" type="button" class="btn btn-small btn-danger"> Hủy</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <script type="text/javascript">
        function updateOrdres(status,idOrder){
            if (status==''||idOrder=='') {
                alert('ERROR');
                return false;
            }else{
                $.ajax({
                    url : "?c=orders&m=handle",
                    type : "POST",
                    data :{status : status,idOrder : idOrder},
                    beforeSend : function(){
                        if (status==1) {
                            $('#ok_'+idOrder).text('LOADING');
                        }else if (status==-1) {
                            $('#cancel_'+idOrder).text('LOADING');   
                        }
                    },
                    success : function(res){
                         if (status==1) {
                            $('#ok_'+idOrder).text('Xác nhận');
                        }else if (status==-1) {
                            $('#cancel_'+idOrder).text('Hủy');   
                        }
                        res =$.trim(res);
                        if (res=='ERR') {
                            alert('Vui long kiem tra lai du lieu');
                        }else if (res=='FALSE') {
                            alert('Co loi xay ra vui long thu lai');

                        }else {
                            alert('Successful');
                            window.location.reload(true);
                        }
                        return false;

                    }


                });
            }
        }
    </script>
</div>