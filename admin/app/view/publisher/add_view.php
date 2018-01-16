<div class="row">
<div class=" col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<div class="white-box">
	<div class="row">
		<h3 class="text-center">This is add Publisher</h3>
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
		<form class="form-horizontal form-material" action="?c=publisher&m=addPublisher" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label class="col-md-12">Name Publisher</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Name Publisher" class="form-control form-control-line" name="namepublisher" id="namepublisher"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Phone" class="form-control form-control-line" name="phonepublisher" id="phonepublisher"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Address" class="form-control form-control-line" name="addresspublisher" id="addresspublisher"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Note</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" name="notepublisher" id="notepublisher"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Logo</label>
                                <div class="col-md-12">
                                    <input type="file" placeholder="Image" class="form-control form-control-line" name="logopublisher" id="logopublisher"> </div>
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