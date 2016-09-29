<!-- Add new product -->

<div id="addNewProduct" class="modal fade">
    <div class="card modal-content">
        <div class="header modal-header">
            <h4 class="title">Add new Product</h4> 
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="content modal-content">
            <form method="POST" action="/addproduct" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name </label>
                                <input name="name" type="text" class="form-control border-input" placeholder="Theme Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" type="text" class="form-control border-input" placeholder="$">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input name="description" type="text" class="form-control border-input" placeholder="Lorem ipsum dolor sit amet...">
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <label>Category</label>
                            <div id="zgjidhCategory" class="dropdown-check-list anch-kerko" tabindex="100">
                              <span class="zgjidhCategoryanchor anch anch-kerko">Choose Categories</span>
                              <ul id="zgjidhCategoryItems" class="items ">
                                  <li><input type="checkbox" name="categories" value="Category 1" /><span>Category 1 </span></li>
                                  <li><input type="checkbox" name="categories" value="Category 2" /><span>Category 2 </span></li>
                                  <li><input type="checkbox" name="categories" value="Category 3" /><span>Category 3 </span></li>
                                  <li><input type="checkbox" name="categories" value="Category 4" /><span>Category 4 </span></li>
                                  <li><input type="checkbox" name="categories" value="Category 5" /><span>Category 5 </span></li>
                                  <li><input type="checkbox" name="categories" value="Category 6" /><span>Category 6 </span></li>
                                  <li><input type="checkbox" name="categories" value="Category 7" /><span>Category 7 </span></li>
                                  <li><input type="checkbox" name="categories" value="Category 8" /><span>Category 8 </span></li>
                                  <li><input type="checkbox" name="categories" value="Category 9" /><span>Category 9 </span></li>
                              </ul>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <label>Features</label>
                            <div id="zgjidhFeature" class="dropdown-check-list anch-kerko" tabindex="100">
                              <span class="zgjidhFeatureanchor anch anch-kerko">Choose Feature</span>
                              <ul id="zgjidhFeatureItems" class="items ">
                                  <li><input type="checkbox" name="features" /><span>Feature 1 </span></li>
                                  <li><input type="checkbox" name="features" /><span>Feature 2 </span></li>
                                  <li><input type="checkbox" name="features" /><span>Feature 3 </span></li>
                                  <li><input type="checkbox" name="features" /><span>Feature 4 </span></li>
                                  <li><input type="checkbox" name="features" /><span>Feature 5 </span></li>
                                  <li><input type="checkbox" name="features" /><span>Feature 6 </span></li>
                                  <li><input type="checkbox" name="features" /><span>Feature 7 </span></li>
                                  <li><input type="checkbox" name="features" /><span>Feature 8 </span></li>
                                  <li><input type="checkbox" name="features" /><span>Feature 9 </span></li>
                              </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label>Theme Preview</label>
                                <input name="preview" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label>Theme Archive</label>
                                <input name="archive" type="file" accept=".zip">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Product</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

<!-- //// Add new product -->






<script type="text/javascript">
    function openDropDown(id1,id2,className){
        var checkzgjidhPronen = document.getElementById(id1);
        var zgjidhPronenItems = document.getElementById(id2);
            checkzgjidhPronen.getElementsByClassName(className)[0].onclick = function (evt) {
                if (zgjidhPronenItems.classList.contains('visible')){
                    zgjidhPronenItems.classList.remove('visible');
                    zgjidhPronenItems.style.display = "none";
                }
                
                else{
                    zgjidhPronenItems.classList.add('visible');
                    zgjidhPronenItems.style.display = "block";
                }
                
                
            }

            zgjidhPronenItems.onblur = function(evt) {
                zgjidhPronenItems.classList.remove('visible');
            } 
    }
    openDropDown('zgjidhFeature','zgjidhFeatureItems','zgjidhFeatureanchor');
    openDropDown('zgjidhCategory','zgjidhCategoryItems','zgjidhCategoryanchor');

</script>