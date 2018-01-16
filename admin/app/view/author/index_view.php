<div class="row">
    <br>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="white-box">
        <div class="row">

        <h3 class = "text-center">This is Author</h3>
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">
            <a href="?c=author&m=add" title="" class="btn btn-primary">ADD AUTHOR <i class="fa fa-plus" aria-hidden="true"></i></a>
            
        </div>
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <input type="text" name="txtSearch" id="txtSearch" value="<?php echo htmlentities($data['keyword']); ?>" placeholder="Name AUTHOR" class="form-control">
        </div >
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12" >
            <button type="button" class="btn btn-primary btn-block" id="btnSearch">Search <i class="fa fa-search" aria-hidden="true"></i></button>
            
        </div>
    </div>
<div class="row">
    <div class="table-responsive">
                <?php if(!empty($data['author'])) :?>
        <table class="table table-hover table-border">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Note</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['author'] AS $k=>$b):?>
                <tr>
                <td><?php echo $k+1; ?></td>
                <td width="5%"><img src="<?php echo PATH_UPLOAD_IMG_PUBLISHER.$b['avatar']; ?>" alt="Avatar" height="120"></td>
                <td><?php echo $b['name']; ?></td>
                <td><?php echo $b['phone']; ?></td>
                <td><?php echo $b['address']; ?></td>
                <td><?php echo $b['note']; ?></td>
                <td width="2%">
                    <a href="#" title="Edit" class="btn btn-primary">Edit</a>
                </td>
                <td width="2%">
                    <a href="#" title="Delete" class="btn btn-warning">DELETE</a>
                </td>
                </tr>
                    <?php endforeach; ?>

            </tbody>
                                    
        </table>
                    
            <?php else : ?>
                <h4 class="text-center"> NOT RESULT!!!!!!</h4>
            <?php endif; ?>
     </div>     
    </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
      $("#btnSearch").click(function(){
        let keyword= $('#txtSearch').val().trim();
        window.location.href="?c=author&s="+keyword;
      });
    });
    $(function(){
        $("#txtSearch").keypress(function(event){
            if (event.keyCode ==13 || event.which ==13 ){
                let keyword= $('#txtSearch').val().trim();
                window.location.href="?c=author&s="+keyword;
            }
        });

    });




</script>                           
</div>