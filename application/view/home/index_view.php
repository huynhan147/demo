   <div id="right">
                            <h2>New Books</h2>
                            <section class="grid-holder features-books">
                                <?php foreach ($data['books'] As $key=>$book) :?>
                              <figure class="span4 slide first chinh1" style="position: relative;border-radius:10px;box-shadow: 5px 5px ">
                                <a href="#"><img src="<?php echo IMG_PATH_UPLOAD.$book['images'] ?>" alt="" class="pro-img"/></a>
                                <p>
                                    <span class="title">
                                        <a href="#" style="font-weight: bold"><?php echo $book['name_book']; ?></a>
                                    </span>
                                </p>
                                <p>Thể loại:
                                    <a class="nxb" href=""><?php echo $book['name_cat']; ?></a>
                                </p>
                                <p>Tác giả:
                                    <a class="nxb" href="#"><?php echo $book['name_author']; ?></a>
                                </p>
                                <p>Nhà xuất bản:
                                    <a class="nxb" href="#"><?php echo $book['name_publisher']; ?></a>
                                </p>
                                <p>
                                    <i class="fa fa-eye" aria-hidden="true"></i> Lượt xem: <?php echo $book['view']; ?>
                                </p>
                                <div class="cart-price">
                                    <a class="cart-btn2" href="?c=cart&m=add&id=<?php echo $book['id']; ?>">Thêm vào giỏ hàng</a>
                                    <span class="price"><?php echo number_format($book['price']); ?>&nbsp;vnđ</span>
                                </div>
                              </figure>
                          <?php endforeach; ?>
                            </section>
                            <div style="clear: both;"></div>
                            <section class="grid-holder features-books">
                                     <div class="row text-center">
                                         <?php echo $data['panigation']; ?>
                                     </div> 
                            </section>
                        </div>