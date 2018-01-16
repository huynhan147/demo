<div class="row">
<div class=" col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<div class="white-box">
	<div class="row">
		<h3 class="text-center">This is add product</h3>
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
		<form class="form-horizontal form-material" action="?c=product&m=handleadd" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label class="col-md-12">Name Book</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Name Book" class="form-control form-control-line" name="namebook" id="namebook"> </div>
                            </div>
                            <div class="form-group">
                                <label for="slcAuthor" class="col-md-12">Author</label>
                                <div class="col-md-12">
                                    <select name="slcAuthor" id="slcAuthor" class="form-control form-control-line">
                                    	<option value="">--Chose Author--</option>
                                    	<?php foreach ( $data['author'] as $key=>$au): ?>
                                    		<option value="<?php echo $au['id'] ?>"> <?php echo $au['name']; ?></option>
                                    	<?php endforeach ?>
                             
                                    </select>
                            </div>
                        </div>
                               <div class="form-group">
                                <label for="slcPublisher" class="col-md-12">Publisher</label>
                                <div class="col-md-12">
                                    <select name="slcPublisher" id="slcPublisher" class="form-control form-control-line">
                                    	<option value="">--Chose Publisher--</option>
                                    	<?php foreach ( $data['publisher'] as $key=>$au): ?>
                                    		<option value="<?php echo $au['id'] ?>"> <?php echo $au['name']; ?></option>
                                    	<?php endforeach ?>
                                    	
                             
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="slcCategory" class="col-md-12">Category</label>
                                <div class="col-md-12">
                                    <select name="slcCategory" id="slcCategory" class="form-control form-control-line">
                                    	<option value="">--Chose Category--</option>
                                   <?php foreach ( $data['category'] as $key=>$au): ?>
                                    		<option value="<?php echo $au['id'] ?>"> <?php echo $au['name_cat']; ?></option>
                                    	<?php endforeach ?>
                                    	
                             
                                    </select>
                            </div>
                        </div>
       
                            <div class="form-group">
                                <label class="col-md-12">Description</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" name="slcSescription" id="slcSescription"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Price</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Price" class="form-control form-control-line" name="slcPrice" id="slcPrice"> </div>
                            </div>
                                <div class="form-group">
                                <label class="col-md-12">Quanity</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Price" class="form-control form-control-line" name="slcQuanity" id="slcQuanity"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Images</label>
                                <div class="col-md-12">
                                    <input type="file" placeholder="Chon Anh" class="form-control form-control-line" name="slcImage" id="slcImage"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Page Book</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Page Book" class="form-control form-control-line" name="slcPagebook" id="slcPagebook"> </div>
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