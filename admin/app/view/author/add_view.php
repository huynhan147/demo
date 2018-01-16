<div class="row">
<div class=" col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<div class="white-box">
	<div class="row">
		<h3 class="text-center">This is add Authors</h3>
		<hr>
            <?php if (!empty($data['errAdd'])&&isset($data['errAdd'])): ?>
        <ul>
            <?php foreach($data['errAdd'] as $k=>$err): ?>
                <?php if ($err!==''): ?>
            <li><?php echo $err; ?></li>
             <?php endif ?>
        <?php endforeach ?>
        </ul>
        <?php endif ?>
		<form class="form-horizontal form-material" action="?c=author&m=addAuthor" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label class="col-md-12">Name Authors</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Name Author" class="form-control form-control-line" name="nameauthor" id="nameauthor"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Phone" class="form-control form-control-line" name="phoneauthor" id="phoneauthor"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Address" class="form-control form-control-line" name="addressauthor" id="addressauthor"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Note</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" name="noteauthor" id="noteauthor"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Avatar</label>
                                <div class="col-md-12">
                                    <input type="file" placeholder="Image" class="form-control form-control-line" name="avatarauthor" id="avatarauthor"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" name="btnsubmit" id="btnsubmit">Save</button>
                                </div>
                            </div>

                        </form>			
	</div>
</div>	
</div>
</div>
</div>