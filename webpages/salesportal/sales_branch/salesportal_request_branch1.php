            <div class="row">
                <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                <div class="columns" style="padding:20px">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label">Choose Supplier</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="supplierid" id="supplierid" required>
                                        <option value="" selected>Choose Supplier</option>
                                        <?php while ($row = mysqli_fetch_assoc($supplier_data)) { ?>
                                        <option value="<?php echo $row["supplierid"] ?>"><?php echo $row["branchname"]?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="column is-6">
                        <div class="field">
                            <label class="label">Date</label>
                            <div class="control">
                                <input name="datecheckout" id="datecheckout"  class="input" type="date" placeholder="Date" min="0" required>
                            </div>
                        </div>
                    </div>                          
                </div>
            </div>
            <div class="row">
                <form class="checkout">
                    <div class="row">
                        <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['branchid'] ?>">
                        <div class="columns">
                            <div class="column is-5">
                              <div class="field">
                                  <label class="label">Product</label>
                                  <div class="control">
                                      <div class="select is-fullwidth">
                                          <select name="stockunit" id="stockunit">
                                              <option value="" disabled selected>Choose Stock</option>
                                              <?php while ($row = mysqli_fetch_assoc($stock_data)) { ?>
                                              <option value="<?php echo $row["stockid"] ?>" > <p  style="text-transform: capitalize;" > (<?php echo $row["categoryname"]; ?>) <?php echo $row["productname"]; ?> <p> </option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label class="label">Current Stock Available</label>
                                    <div class="control">
                                        <input name="stockcheckout" id="stockcheckout" disabled="disabled" class="input" type="number" placeholder="In-stock" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label class="label">Quantity</label>
                                    <div class="control">
                                        <input name="quantitycheckout" id="quantitycheckout" disabled="disabled"  class="input" type="number" min="1" placeholder="Quantity" required>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-2">
                                <div class="field">
                                    <label class="label">Option</label>
                                    <div class="control">
                                        <a id="addcheckout" name="addcheckout" class="button is-info is-hovered">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="columns" style="background-color:white; margin-top:20px; border-radius:8px;">
                            <div class="column is-11">
                                <table id="checkouttable" class="checkouttable" cellspacing="0" width="100%" style="overflow-x:auto;" >
                                    <thead>
                                        <tr>
                                            <th>Stock ID</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                              </table>    
                            </div>
                        </div>
                    </div>
                </div>